<?PHP
include("includes/config.php");

//hent fra database
$billede_stort = mysql_query("SELECT * FROM billeder where id='".$HTTP_GET_VARS['id']."' ");
while($r = mysql_fetch_array($billede_stort)) {
$billede_sti = $r["billede_sti_s"];
$billede_txt = $r["billede_txt"];
$by_id = $r["by_id"];
$key = $r["keyword"];
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<meta name="keywords" content="<?PHP echo "$key"; ?>">
<meta name="title" content="RM foto">
<meta name="language" content="dan">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>RM foto</title>
<link rel="shortcut icon" href="favicon.ico">
<link href="visfuld.css" rel="stylesheet" type="text/css">

</head>

<body>
<table  border="0" cellpadding="0" cellspacing="0" style=" height: 100%;" >
  <tr>
    <td width="20%" valign="top" bgcolor="#add2db"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="50" height="50" class="venstre_mellemrum">&nbsp;</td>
        <td height="50" class="venstre_kandt">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" class="venstre_mellemrum">&nbsp;</td>
        <td height="30" class="venstre_kandt">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="venstre_mellemrum">&nbsp;</td>
        <td height="40" valign="bottom" class="venstre_kandt"><img src="billeder/fir.gif" alt="firkant" width="15" height="15"> 
        <a href="vis_billeder.php?byid=<?PHP echo  $by_id; ?>">
			<?PHP
			$by = mysql_query("SELECT * FROM byer where by_id='".$by_id."' ");
			while($r = mysql_fetch_array($by)) {
			echo $r["by_navn"];
			}
			?>
		</a> </td>
      </tr>
      <tr>
        <td class="venstre_mellemrum">&nbsp;</td>
        <td valign="top" class="venstre_kandt">
<hr size="1" >
     </td>
      </tr>
      <tr>
        <td class="venstre_mellemrum">&nbsp;</td>
        <td class="venstre_kandt"><a href="
		<?PHP
		if($HTTP_GET_VARS['sog']==""){
		 echo "index.php\"><img alt=\"forside\" src=\"billeder/fir.gif\"border=\"0\" width=\"15\" height=\"15\"> Til Forsiden</a>";
		} else {
		echo "sog.php?sog=".$HTTP_GET_VARS['sog']." \"><img src=\"billeder/fir.gif\"border=\"0\" alt=\"sog\" width=\"15\" height=\"15\"> Tilbage</a>"; 
		}
		?></td>
      </tr>
      <tr>
        <td class="venstre_mellemrum">&nbsp;</td>
        <td class="venstre_kandt">&nbsp;</td>
      </tr>
    </table></td>
    <td width="20" valign="top"><table width="20" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><hr size="1"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>
	<table border="0" style="border-collapse: collapse" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="<?PHP echo $billede_sti ; ?>" alt="<?PHP echo $billede_txt; ?>" ></td>
      </tr>
    </table>
	</td>
        <td width="6" valign="top" class="skygge_l" >          
		<table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" valign="top" class="skygge_l" ><img src="billeder/skygge_h/hh.png" alt="skygge" width="6" height="12"></td>
          </tr>
          <tr>
            <td height="40" class="skygge_l" >&nbsp;</td>
          </tr>
          <tr>
            <td valign="top" class="skygge_l" ><hr size="1"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="6" class="skygge_v" ><img src="billeder/skygge_h/vh.png" alt="skygge"  width="9"  height="6"></td>
        <td height="6"><img src="billeder/skygge_h/nh.png" alt="skygge" width="6" height="6"></td>
      </tr>
    </table>
      <br>
    <br></td>
    <td valign="top"><table width="150" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><hr size="1"></td>
      </tr>
      <tr>
        <td align="right"><div align="left">
          <table border="0">
            <tr>
              <td>&nbsp;</td>
              <td><?PHP echo $billede_txt ; ?></td>
            </tr>
          </table>
          </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>    </td>
  </tr>
</table>
</body>
</html>
