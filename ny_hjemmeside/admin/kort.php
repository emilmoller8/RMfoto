<?php
// Kort-editor (afløser for admin_kort.swf): indsæt, flyt, spejl, omdøb og slet byer.
// "Gem det hele" gemmer byerne i data.json og tegner kortbillederne igen.
require __DIR__ . '/includes/admin.php';
kraev_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    tjek_csrf();
    try {
        $input = json_decode(file_get_contents('php://input'), true, flags: JSON_THROW_ON_ERROR);
        $byer = opdater_data(function (array &$data) use ($input): array {
            $billeder_pr_by = array_count_values(array_column($data['billeder'], 'by_id'));
            $gamle = array_column($data['byer'], null, 'id');
            $slet = array_map('intval', $input['slet'] ?? []);
            foreach ($slet as $id) {
                if (!empty($billeder_pr_by[$id])) {
                    throw new RuntimeException($gamle[$id]['navn'] . ' har ' . $billeder_pr_by[$id] . ' billeder. Slet eller flyt dem først.');
                }
            }

            $nye_byer = [];
            $navne = [];
            foreach ($input['byer'] as $by) {
                $navn = trim((string) $by['navn']);
                if (!preg_match('/^[\p{L}][\p{L} .\'-]{0,40}$/u', $navn)) {
                    throw new RuntimeException("Bynavnet \"$navn\" er ikke gyldigt. Brug kun bogstaver, mellemrum og bindestreg.");
                }
                if (isset($navne[mb_strtolower($navn)])) {
                    throw new RuntimeException("Der er to byer, der hedder $navn.");
                }
                $navne[mb_strtolower($navn)] = true;
                $id = isset($by['id']) ? (int) $by['id'] : null;
                if ($id !== null && (!isset($gamle[$id]) || in_array($id, $slet, true))) {
                    throw new RuntimeException("Ukendt by-id $id. Genindlæs siden og prøv igen.");
                }
                $nye_byer[] = [
                    'id' => $id,
                    'navn' => $navn,
                    'x' => max(0, min(400, (int) $by['x'])),
                    'y' => max(4, min(531, (int) $by['y'])),
                    'side' => $by['side'] === 'v' ? 'v' : 'h',
                ];
            }

            $naeste = naeste_id($data['byer']);
            foreach ($nye_byer as &$by) {
                $by['id'] ??= $naeste++;
            }
            $data['byer'] = $nye_byer;
            return $nye_byer;
        });

        foreach ($byer as $by) {
            $mappe = ROD . '/' . UPLOAD_MAPPE . $by['id'];
            if (!is_dir($mappe)) {
                mkdir($mappe, 0755, true);
            }
        }
        tegn_kort($byer);
        echo json_encode(['ok' => true, 'byer' => $byer], JSON_UNESCAPED_UNICODE);
    } catch (Throwable $e) {
        http_response_code(400);
        echo json_encode(['ok' => false, 'fejl' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
    exit;
}

$data = hent_data();
$antal = array_count_values(array_column($data['billeder'], 'by_id'));
$byer = array_map(fn($by) => $by + ['billeder' => $antal[$by['id']] ?? 0], $data['byer']);

admin_top('Rediger byer', '<script src="kort.js" defer></script>');
?>
<h1>Rediger byer på kortet</h1>
<div class="editor">
  <div class="vaerktoejer" role="toolbar" aria-label="Værktøjer">
    <button type="button" data-vaerktoej="pil" aria-pressed="true">Vælg</button>
    <button type="button" data-vaerktoej="flyt" aria-pressed="false">Flyt</button>
    <button type="button" data-vaerktoej="stempel" aria-pressed="false">Indsæt ny by</button>
    <button type="button" data-vaerktoej="slet" aria-pressed="false">Slet by</button>
    <hr>
    <button type="button" id="spejl">Spejl navn (højre/venstre)</button>
    <hr>
    <button type="button" id="gem_alt"><strong>Gem det hele</strong></button>
    <p id="status" aria-live="polite"></p>
    <p><small>Vælg: klik på en by for at rette navn og placering.<br>
    Flyt: træk byen. Piletasterne flytter den valgte by 1 pixel.<br>
    Indsæt: klik på kortet, hvor byen skal være.<br>
    Slet: klik på byen (kun byer uden billeder).</small></p>
  </div>

  <div class="redigeringskort vaerktoej-pil" id="kort"></div>

  <div class="byboks" id="byboks" hidden>
    <label>Navn<br><input type="text" id="boks_navn" maxlength="40"></label>
    <div class="xy">
      <label>X<br><input type="number" id="boks_x" min="0" max="400" size="4"></label>
      <label>Y<br><input type="number" id="boks_y" min="4" max="531" size="4"></label>
    </div>
    <p id="boks_info"></p>
  </div>
</div>
<script id="byer_data" type="application/json"><?= json_encode($byer, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>
<script>window.CSRF = <?= json_encode(csrf_token()) ?>;</script>
<?php admin_bund();
