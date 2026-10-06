<?php
// Rediger tekst, søgeord og by for ét billede – eller udskift billedfilen.
require __DIR__ . '/includes/admin.php';
kraev_login();

$id = (int) ($_GET['id'] ?? 0);
$data = hent_data();
$billede = find_billede($data, $id);
if ($billede === null) {
    videre('index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    tjek_csrf();
    try {
        $ny_by = (int) $_POST['by_id'];
        if (find_by($data, $ny_by) === null) {
            throw new RuntimeException('Ukendt by.');
        }
        $filer = uploadede_filer('ny_fil');
        $nye_stier = $filer ? gem_uploadet_billede($filer[0]['tmp'], $filer[0]['navn'], $ny_by, (int) ($_POST['vand'] ?? 0)) : null;

        $gammel = opdater_data(function (array &$data) use ($id, $ny_by, $nye_stier): array {
            foreach ($data['billeder'] as &$b) {
                if ($b['id'] === $id) {
                    $gammel = $b;
                    $b['by_id'] = $ny_by;
                    $b['tekst'] = trim((string) ($_POST['tekst'] ?? ''));
                    $b['noegleord'] = trim((string) ($_POST['noegleord'] ?? ''), " ,");
                    if ($nye_stier) {
                        $b = array_merge($b, $nye_stier);
                    }
                    return $gammel;
                }
            }
            throw new RuntimeException('Billedet findes ikke længere.');
        });
        if ($nye_stier) {
            slet_billedfiler($gammel);
        }
        videre('billeder.php?byid=' . $ny_by . '#b' . $id, "Billede $id er gemt.");
    } catch (RuntimeException $e) {
        $_SESSION['besked'] = $e->getMessage();
        videre('rediger.php?id=' . $id);
    }
}

$byer = $data['byer'];
usort($byer, fn($a, $b) => strcmp($a['navn'], $b['navn']));

admin_top('Rediger billede ' . $id);
?>
<h1>Rediger billede <?= $id ?></h1>
<p><a href="billeder.php?byid=<?= $billede['by_id'] ?>#b<?= $id ?>">Tilbage</a></p>

<form method="post" enctype="multipart/form-data">
  <?= csrf_felt() ?>
  <p><a href="../<?= h($billede['stor']) ?>" target="_blank" title="Vis stort"><img src="../<?= h($billede['lille']) ?>" alt="" width="120" height="120"></a></p>
  <label>By<br>
    <select name="by_id">
<?php foreach ($byer as $by): ?>
      <option value="<?= $by['id'] ?>"<?= $by['id'] === $billede['by_id'] ? ' selected' : '' ?>><?= h($by['navn']) ?></option>
<?php endforeach; ?>
    </select>
  </label>
  <label>Billedtekst<br><textarea name="tekst" rows="3"><?= h($billede['tekst']) ?></textarea></label>
  <label>Søgeord (adskilles med komma)<br><textarea name="noegleord" rows="2"><?= h($billede['noegleord']) ?></textarea></label>
  <fieldset class="upload">
    <legend>Udskift billedet (valgfrit)</legend>
    <label><input type="file" name="ny_fil[]" accept="image/jpeg,image/png,image/gif,image/webp"></label>
    <div class="vand">Vandmærke:
      <label><input type="radio" name="vand" value="0" checked> Ingen</label>
      <label><input type="radio" name="vand" value="1"> <img src="../billeder/vand.png" alt="vandmærke 1"></label>
      <label><input type="radio" name="vand" value="2"> <img src="../billeder/vand2.png" alt="vandmærke 2"></label>
    </div>
  </fieldset>
  <p><button type="submit">Gem</button></p>
</form>
<?php admin_bund();
