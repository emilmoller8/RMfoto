<?php
require __DIR__ . '/includes/data.php';

$sog = trim((string) ($_GET['sog'] ?? ''));
$fundne = sog_billeder($sog);
?>
<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>RMfoto - Søg</title>
<link rel="icon" href="favicon.ico">
<link href="js/photoswipe/photoswipe.css" rel="stylesheet">
<link href="css/visfuld.css" rel="stylesheet">
<script type="module" src="js/galleri.js"></script>
</head>

<body>
<table class="ramme" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" class="venstre_kandt">&nbsp;</td>
    <td width="100" valign="top" class="venstre_bg">
      <div class="mellemrum_top"></div>
      <div class="mellemrum_under_top"></div>
      <img src="billeder/fir.gif" width="15" height="15" alt=""> <a href="index.php">Til forsiden</a>
    </td>
    <td class="mellem_vk_billed">&nbsp;</td>
    <td valign="top">
      <div class="mellemrum_top"></div>
<?php if (!$fundne): ?>
      Dit søgeord <strong><?= h($sog) ?></strong> mindede ikke om nogen af billederne.<br><br>
      <form method="get" action="sog.php" class="sogefelt">
        <input name="sog" type="text" value="<?= h($sog) ?>" aria-label="Søg">
        <input type="image" src="billeder/sog.gif" alt="Søg">
      </form>
<?php else: ?>
      Der blev fundet <?= count($fundne) ?> billeder
      <div class="galleri">
        <?= billed_tabel($fundne) ?>
      </div>
<?php endif; ?>
    </td>
  </tr>
</table>
</body>
</html>
