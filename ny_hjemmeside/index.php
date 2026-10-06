<?php require __DIR__ . '/includes/data.php'; ?>
<!DOCTYPE html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>RMfoto Fotograf Rolf Müller</title>
<link rel="icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="css/stylesheet.css" rel="stylesheet">
</head>

<body class="BG_index">
<table class="ramme" cellpadding="0" cellspacing="0">
  <tr>
    <td width="79" height="40" class="logo">&nbsp;</td>
    <td colspan="2" height="40" class="logo">
      <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td class="logo"><img class="rm-logo" src="billeder/top_logo/rm.png" alt="RM Foto" width="36" height="30"> Fotograf <strong>Rolf Müller</strong> <span class="prik">&#8718;</span> Stationsvej 81 <span class="prik">&#8718;</span> DK 3650 Ølstykke <span class="prik">&#8718;</span> rm@rmfoto.dk <span class="prik">&#8718;</span> Mobile: +45 21 78 43 21 <span class="prik">&#8718;</span> Mobile: +45 51 51 52 18</td>
          <td align="right">
            <form method="get" action="sog.php" class="sogefelt">
              <input name="sog" type="text" aria-label="Søg">
              <input type="image" src="billeder/sog.gif" alt="Søg">
            </form>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="450">&nbsp;</td>
    <td width="949">&nbsp;</td>
  </tr>
  <tr>
    <td width="79">&nbsp;</td>
    <td valign="top"><p><img src="billeder/forside.jpg" alt="forside billede" width="450" height="419"></p><br></td>
    <td valign="top">
      <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td width="400" align="left" valign="top">
            <img src="billeder/map2.jpg" alt="Kort over Grønland" width="400" height="535" usemap="#greenmap">
            <map name="greenmap">
<?php foreach ($byer as $by):
    // Bynavnet står til højre (h) eller venstre (v) for prikken på kortet
    $x1 = $by['side'] === 'h' ? $by['x'] : $by['x'] - 60;
    $x2 = $by['side'] === 'h' ? $by['x'] + 60 : $by['x'] + 5;
?>
              <area shape="rect" coords="<?= $x1 ?>,<?= $by['y'] - 4 ?>,<?= $x2 ?>,<?= $by['y'] + 8 ?>" alt="<?= h($by['navn']) ?>" href="vis_billeder.php?byid=<?= $by['id'] ?>">
<?php endforeach; ?>
            </map>
          </td>
          <td valign="top">
            <table width="215" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center">
                  <h1><a href="kalender2022/">Grønlandskalenderen 2022</a></h1>
                  <a href="kalender2022/"><img src="kalender2022/50plakat.jpg" alt="Kalender 2022" width="300" height="425"></a><br>
                  Klik for at se kalenderen
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="3" valign="bottom">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td class="bund"><img src="billeder/dkisf.JPG" alt="" width="373" height="37"></td>
        </tr>
        <tr>
          <td><a href="sitemap.php">Sitemap</a></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
