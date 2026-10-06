<?php
// Ét billede i fuld størrelse. Bruges af sitemap og gamle links (fx fra Google).
require __DIR__ . '/includes/data.php';

$billede = $billeder[(int) ($_GET['id'] ?? 0)] ?? null;
if ($billede === null) {
    header('Location: index.php');
    exit;
}
$by = $byer[$billede['by_id']] ?? null;
?>
<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8">
<meta name="keywords" content="<?= h($billede['noegleord']) ?>">
<title>RM foto<?= $billede['tekst'] !== '' ? ' - ' . h($billede['tekst']) : '' ?></title>
<link rel="icon" href="favicon.ico">
<link href="css/visfuld.css" rel="stylesheet">
</head>

<body>
<table class="ramme" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20%" valign="top" class="venstre_bg">
      <div class="stor_venstre">
        <div class="stor_top"></div>
        <div class="stor_by"><img src="billeder/fir.gif" alt="" width="15" height="15">
<?php if ($by): ?>
          <a href="vis_billeder.php?byid=<?= $by['id'] ?>"><?= h($by['navn']) ?></a>
<?php endif; ?>
        </div>
        <hr>
        <a href="index.php"><img src="billeder/fir.gif" alt="" width="15" height="15"> Til forsiden</a>
      </div>
    </td>
    <td width="20" valign="top"></td>
    <td valign="top">
      <div class="stor_top"></div>
      <table class="skygge" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="<?= h($billede['stor']) ?>" alt="<?= h($billede['tekst']) ?>"></td>
          <td class="skygge_l"><img src="billeder/skygge_h/hh.png" alt="" width="6" height="12"></td>
        </tr>
        <tr>
          <td class="skygge_v"><img src="billeder/skygge_h/vh.png" alt="" width="9" height="6"></td>
          <td><img src="billeder/skygge_h/nh.png" alt="" width="6" height="6"></td>
        </tr>
      </table>
    </td>
    <td width="150" valign="top">
      <div class="stor_top"></div>
      <div class="stor_by"></div>
      <hr>
      <p class="stor_tekst"><?= h($billede['tekst']) ?></p>
    </td>
  </tr>
</table>
</body>
</html>
