<?php require __DIR__ . '/includes/data.php'; ?>
<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>RMfoto - Sitemap</title>
<link rel="icon" href="favicon.ico">
<link href="css/visfuld.css" rel="stylesheet">
</head>

<body>
<table class="ramme" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" class="venstre_kandt">&nbsp;</td>
    <td width="100" valign="top" class="venstre_bg">
      <div class="mellemrum_top"></div>
      <div class="mellemrum_under_top"></div>
      <img src="billeder/fir.gif" alt="" width="15" height="15"> Sitemap<br>
      <br>
      <a href="index.php"><img src="billeder/fir.gif" alt="" width="15" height="15"> Til forsiden</a>
    </td>
    <td class="mellem_vk_billed">&nbsp;</td>
    <td valign="top" class="sitemap">
      <p>&nbsp;</p>
      <p class="overskrift"><strong>Sitemap</strong></p>
      <p>&nbsp;</p>
      <p><a href="index.php">Forside</a></p>
      <p>Byer<br>
<?php foreach ($byer as $by): ?>
        <a href="vis_billeder.php?byid=<?= $by['id'] ?>">- <?= h($by['navn']) ?></a><br>
<?php endforeach; ?>
      </p>
      <p>Billeder<br>
<?php foreach ($billeder as $b): ?>
        <a href="vis_stor.php?id=<?= $b['id'] ?>">- <?= h($b['tekst']) ?></a><br>
<?php endforeach; ?>
        <br>
        <a href="sog.php">Søg</a>
      </p>
    </td>
  </tr>
</table>
</body>
</html>
