<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>RMfoto</title>
<link rel="shortcut icon" href="favicon.ico">
<link href="visfuld.css" rel="stylesheet" type="text/css">
</head>


<body>
<table border="0" cellpadding="0" cellspacing="0" style=" height: 100%; " >
  <tr>
    <td width="100" class="venstre_kandt">&nbsp;</td>
    <td width="100" valign="top" class="venstre_bg"><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="mellemrum_top">&nbsp;</td>
      </tr>
      <tr>
        <td class="mellemrum_under_top">&nbsp;</td>
      </tr>
      <tr>
        <td class="venstre_kandt"><img src="billeder/fir.gif" alt="grafik" width="15" height="15"> Sitemap<br>
	<br>
	<a href="index.php"><img src="billeder/fir.gif" alt="grafik" width="15" height="15" border="0" > Til forsiden</a>
		</td>
      </tr>
    </table></td>
    <td class="mellem_vk_billed">&nbsp;</td>
    <td valign="top" class="sitemap:">
    <p>&nbsp;</p>
    <p class="overskrift"><strong>Sitemap</strong></p>
    <p>&nbsp;</p>
    <p><a href="index.htm">Forside</a></p>
    <p>Byer<br>
      <?PHP
//opret forbindelse til database
include("includes/config.php");
	$by = mysql_query("SELECT by_id, by_navn FROM byer ");
	while($r = mysql_fetch_array($by)) {
	?>
      <a href="vis_billeder.php?byid=<?PHP echo $r["by_id"]; ?>">- <?PHP echo $r["by_navn"]; ?></a>
      <br>    
    <?PHP
	}
	?>
    </p>
    
    
    <p>Billeder<br>
    <?PHP
	$billeder = mysql_query("SELECT id, billede_txt FROM billeder ");
	while($r = mysql_fetch_array($billeder)) {
	?>
      <a href="vis_stor.php?id=<?PHP echo $r["id"]; ?> ">- <?PHP echo $r["billede_txt"]; ?></a>
      <br>    
    <?PHP
	}
	?>
    <br>
    <a href="sog.php">S&oslash;g</a></p>
    </td>
  </tr>
</table>
</body>
</html>
