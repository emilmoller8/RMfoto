<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>RMfoto Fotograf Rolf M&uuml;ller</title>
<link rel="shortcut icon" href="<?PHP echo $www;?>favicon.ico">
<script type="text/javascript" src="<?PHP echo $www;?>flash/swfobject.js"></script>
<link href="<?PHP echo $www;?>stylesheet.css" rel="stylesheet" type="text/css">
</head>


<body class="BG_index">
<table style="width: 100%; height: 100%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td width="79" height="40" class="logo">&nbsp;</td>
    <td colspan="2" height="40" class="logo">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td ><img src="billeder/top_logo/logo1.png" alt="rmfoto Fotograf Rolf M&uuml;ller stationsvej 81" width="444" height="35"><a href="mailto:rm@rmfoto.dk"><img src="billeder/top_logo/logo2.png" alt="mail" width="120" height="35" border="0"></a><img src="billeder/top_logo/logo3.png" alt="+45 47178584" width="174" height="35"> </td>
          <td valign="bottom" align="right">
		  <form name="form1" method="get" action="sog.php">
        <table border="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><input name="sog" type="text" id="sog"></td>
            <td><INPUT TYPE="image" SRC="<?PHP echo $www;?>billeder/sog.gif"  style="border: 0; " ALT="Submit Form"></td>
          </tr>
        </table>
          </form></td>
        </tr>
    </table>      </td>
  </tr>
    <tr>
	<td>&nbsp;</td>
	<td width="450" >&nbsp;</td>
	<td width="949" >&nbsp;</td>
  </tr>
  <tr>
    <td width="79">&nbsp;</td>
    <td><p><img src="<?PHP echo $www;?>billeder/forside.jpg" alt="forside billede" width="450" height="419"></p>
      <br>
    </td>
    <td>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="400" align="left">
          <img src="billeder/map2.jpg" alt="map_gr&oslash;nland" width="400" height="535" border="0" usemap="#greenmap">
          <map name="greenmap">
          <?php

		include("includes/config.php");
		
		
		$query = 'SELECT * FROM byer';
		$results = mysql_query($query);

		while($line = mysql_fetch_array($results)) {
		
		if($line["hv"]=='h'){
			echo "<area shape=\"rect\" coords=\"".$line["x_pos"].",".($line["y_pos"]-4).",".($line["x_pos"]+60).",".($line["y_pos"]+8)."\" alt=\"".$line["by_navn"]."\" href=\"vis_billeder.php?byid=".$line["by_id"]."\" >";
		}else if($line["hv"]=='v'){
			echo "<area shape=\"rect\" coords=\"".($line["x_pos"]+5).",".($line["y_pos"]-4).",".($line["x_pos"]-60).",".($line["y_pos"]+8)."\" alt=\"".$line["by_navn"]."\" href=\"vis_billeder.php?byid=".$line["by_id"]."\" >";
		}
		
		
		}
		
		?>
          </map>
          </td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left">
                <table width="215" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center">
                      <h1><a href="<?PHP echo $www;?>kalender2018">Gr&oslash;nlandskalenderen 2018</a></h1>               
                        <a href="<?PHP echo $www;?>kalender2018"><img src="<?PHP echo $www;?>kalender2018/kalenderforside.jpg" alt="Kalender 2017" border="0"></a><br>
                      Klik for at se kalenderen
                      </td>
                  </tr>
                </table>              </td>
            </tr>
          </table></td>
      </tr>
    </table>
    
</td>
  </tr>
  <tr>
    <td colspan="3" valign="bottom" >
	<table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td class="bund" ><img src="<?PHP echo $www;?>billeder/dkisf.JPG" alt="footer" width="373" height="37"></td>
      </tr>
	  <tr>
	  <td><a href="<?PHP echo $www;?>sitemap.php">Sitemap</a></td>
	  </tr>
    </table>	</td>
  </tr>
</table>
</body>
</html>
