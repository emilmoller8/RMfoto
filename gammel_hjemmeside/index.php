<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>RMfoto Fotograf Rolf M&uuml;ller</title>
<link rel="shortcut icon" href="<?PHP echo $www;?>favicon.ico">
<script type="text/javascript" src="<?PHP echo $www;?>flash/swfobject.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="<?PHP echo $www;?>stylesheet.css" rel="stylesheet" type="text/css">
</head>


<body class="BG_index">
<table style="width: 100%; height: 100%; text-align: left; margin-left: auto; margin-right: auto;" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<td width="79" height="40" class="logo">&nbsp;</td>
    <td colspan="2" height="40" class="logo">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td  class="logo"><img valign="bottom" src="billeder/top_logo/rm.png" alt="RM Foto" width="36" height="30"> Fotograf <strong>Rolf M&uuml;ller</strong> <span style="color: #cb161c; ">&#8718;</span> Stationsvej 81 <span style="color: #cb161c; ">&#8718;</span> DK 3650 &Oslash;lstykke <span style="color: #cb161c; ">&#8718;</span> rm@rmfoto.dk <span style="color: #cb161c; ">&#8718;</span> Mobile: +45 21 78 43 21 <span style="color: #cb161c; ">&#8718;</span> Mobile: +45 51 51 52 18</td>
          <td  align="right">
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
                      <h1><a href="<?PHP echo $www;?>kalender2022">Gr&oslash;nlandskalenderen 2022</a></h1>               
                        <a href="<?PHP echo $www;?>kalender2022"><img src="<?PHP echo $www;?>kalender2022/50plakat.jpg" alt="Kalender 2022" width="300" height="425" border="0"></a><br>
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
