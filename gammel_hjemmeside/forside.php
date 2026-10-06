<?PHP
// sprog
$parametre = explode("/", $_SERVER['REQUEST_URI']);
$sprog = $parametre['1'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>RMfoto</title>
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
          <td ><img src="<?PHP echo $www;?>billeder/top_logo/logo1.jpg" alt="rmfoto Fotograf Rolf M&uuml;ller stationsvej 81" width="387" height="30"><a href="mailto:rm.foto@os.dk"><img src="<?PHP echo $www;?>billeder/top_logo/logo2.jpg" alt="mail" width="108" height="30" border="0"></a><img src="<?PHP echo $www;?>billeder/top_logo/logo3.jpg" alt="+45 47178584" width="147" height="30"> </td>
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
	<td width="558" >&nbsp;</td>
	<td width="949" >&nbsp;</td>
  </tr>
  <tr>
    <td width="450">&nbsp;</td>
    <td><p><img src="<?PHP echo $www;?>billeder/forside.jpg" alt="forside billede" width="450" height="419"></p>
      <br>
    </td>
    <td>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="400">
        <div id="flashcontent" align="left">
	  <p>For at se denne side skal du have Flash Player og JavaScript sl&aring;et til.<br>
	      <img src="http|//www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="flash"><br>
	      <br>
	      <br>

	  </p>
	  </div>
	<script type="text/javascript">
   var so = new SWFObject("<?PHP echo $www;?>flash/menu.swf", "map", "400", "535", "6", "#9ECAD5");
   so.write("flashcontent");
</script>
        </td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><a href="<?PHP echo $www;?>kalender">Kalender 2012<img src="<?PHP echo $www;?>kalender2012.jpg" alt="Kalender 2012" width="214" height="260"></a></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" valign="bottom" >
	<table width="100%" border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td class="bund" ><img src="<?PHP echo $www;?>billeder/dkisf.JPG" alt="footer" width="373" height="37"></td>
      </tr>
	  <tr>
	  <td><a href="<?PHP echo $www; echo $sprog; ?>/sitemap/">Sitemap</a>  </td>
	  </tr>
    </table>	</td>
  </tr>
</table>
</body>
</html>
