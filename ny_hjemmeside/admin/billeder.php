<?php
// Billederne fra én by: upload, rediger og slet (som billed_list.php, upload.php og mupload.php i den gamle admin).
require __DIR__ . '/includes/admin.php';
kraev_login();

$by_id = (int) ($_GET['byid'] ?? 0);
$by = find_by(hent_data(), $by_id);
if ($by === null) {
    videre('index.php');
}
$her = 'billeder.php?byid=' . $by_id;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    tjek_csrf();
    $handling = $_POST['handling'] ?? '';

    if ($handling === 'slet') {
        $id = (int) $_POST['id'];
        $slettet = opdater_data(function (array &$data) use ($id): ?array {
            foreach ($data['billeder'] as $i => $b) {
                if ($b['id'] === $id) {
                    array_splice($data['billeder'], $i, 1);
                    return $b;
                }
            }
            return null;
        });
        if ($slettet) {
            slet_billedfiler($slettet);
        }
        videre($her, "Billede $id er slettet.");
    }

    if ($handling === 'upload') {
        try {
            $filer = uploadede_filer('billeder');
            if (!$filer) {
                throw new RuntimeException('Vælg mindst ét billede.');
            }
            $vand = (int) ($_POST['vand'] ?? 0);
            $tekst = trim((string) ($_POST['tekst'] ?? ''));
            $noegleord = trim((string) ($_POST['noegleord'] ?? ''), " ,");
            $nye = [];
            foreach ($filer as $fil) {
                $nye[] = gem_uploadet_billede($fil['tmp'], $fil['navn'], $by_id, $vand);
            }
            opdater_data(function (array &$data) use ($nye, $by_id, $tekst, $noegleord): void {
                foreach ($nye as $stier) {
                    $data['billeder'][] = [
                        'id' => naeste_id($data['billeder']),
                        'by_id' => $by_id,
                        'tekst' => $tekst,
                        'lille' => $stier['lille'],
                        'medium' => $stier['medium'],
                        'stor' => $stier['stor'],
                        // Som i den gamle admin får alle billeder søgeordet Grønland
                        'noegleord' => 'Grønland,' . $noegleord,
                        'oprettet' => date('Y-m-d H:i:s'),
                    ];
                }
            });
            videre($her, count($nye) === 1 ? 'Billedet er uploadet.' : count($nye) . ' billeder er uploadet.');
        } catch (RuntimeException $e) {
            $_SESSION['besked'] = $e->getMessage();
            videre($her);
        }
    }
}

$billeder = array_filter(hent_data()['billeder'], fn($b) => $b['by_id'] === $by_id);
usort($billeder, fn($a, $b) => $b['id'] <=> $a['id']);

admin_top($by['navn']);
?>
<h1><?= h($by['navn']) ?></h1>
<p><a href="index.php">Tilbage</a> · Billeder: <?= count($billeder) ?> · <a href="../vis_billeder.php?byid=<?= $by_id ?>" target="_blank">Se siden</a></p>

<form method="post" enctype="multipart/form-data" class="upload">
  <?= csrf_felt() ?>
  <input type="hidden" name="handling" value="upload">
  <h2>Tilføj nye billeder</h2>
  <label>Billeder (du kan vælge flere på én gang)<br>
    <input type="file" name="billeder[]" accept="image/jpeg,image/png,image/gif,image/webp" multiple required>
  </label>
  <div class="vand">Vandmærke:
    <label><input type="radio" name="vand" value="0" checked> Ingen</label>
    <label><input type="radio" name="vand" value="1"> <img src="../billeder/vand.png" alt="vandmærke 1"></label>
    <label><input type="radio" name="vand" value="2"> <img src="../billeder/vand2.png" alt="vandmærke 2"></label>
  </div>
  <label>Billedtekst<br><textarea name="tekst" rows="3"></textarea></label>
  <label>Søgeord (adskilles med komma)<br><textarea name="noegleord" rows="2"></textarea></label>
  <button type="submit">Upload</button>
</form>

<table class="billedliste">
<?php foreach ($billeder as $b): ?>
  <tr<?= $b['tekst'] === '' ? ' class="mangler_tekst"' : '' ?> id="b<?= $b['id'] ?>">
    <td><?= $b['id'] ?></td>
    <td><a href="rediger.php?id=<?= $b['id'] ?>"><img src="../<?= h($b['lille']) ?>" alt="" width="120" height="120" loading="lazy"></a></td>
    <td class="info">Tekst: <?= h($b['tekst']) ?: '&nbsp;' ?><br><br>Søgeord: <?= h($b['noegleord']) ?><br><br>Oprettet: <?= h($b['oprettet']) ?></td>
    <td><a href="rediger.php?id=<?= $b['id'] ?>"><img src="billeder/b_edit.png" alt="Rediger" title="Rediger" width="16" height="16"></a></td>
    <td>
      <form method="post" onsubmit="return confirm('Er du sikker på, at du vil slette billedet?')">
        <?= csrf_felt() ?>
        <input type="hidden" name="handling" value="slet">
        <input type="hidden" name="id" value="<?= $b['id'] ?>">
        <button type="submit" title="Slet"><img src="billeder/b_drop.png" alt="Slet" width="16" height="16"></button>
      </form>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<p><a href="index.php">Tilbage</a></p>
<?php admin_bund();
