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
        <td class="venstre_kandt"><img src="billeder/fir.gif" width="15" height="15" alt="grafik" >
		  <a href="index.php">Til forsiden</a>		  <?PHP
	//opret forbindelse til database
include("includes/config.php");
	
	
	//hvornår skal den skifte
	$opsat = mysql_fetch_row(mysql_query("SELECT variabel FROM opsatning where navn='skift' "));
	$skift = $opsat[0];

	?>
		</td>
      </tr>
    </table></td>
    <td class="mellem_vk_billed">&nbsp;</td>
    <td valign="top"><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="mellemrum_top">&nbsp;</td>
      </tr>
      <tr>
        <td>

<?PHP

$nrdat = mysql_fetch_row(mysql_query("SELECT COUNT(id) as total FROM billeder "));
$antal_billeder = $nrdat[0];

$teller = 0;
$sog = $HTTP_GET_VARS['sog'];

$nrdat2 = mysql_fetch_row(mysql_query("SELECT COUNT(id) as total FROM billeder where `keyword` like '%$sog%' "));
$antal_billeder_sog = $nrdat2[0];

if ($antal_billeder_sog == 0 or $sog==""){
echo "Dit søgeord <strong>".$sog."</strong> mindede ikke om nogen af billederne.<br><br>";
	?>
    <form name="form1" method="get" action="sog.php">
    <table border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="sog" type="text" id="sog"></td>
    <td><INPUT TYPE="image" SRC="billeder/sog.gif"  style="border: 0; " ALT="Submit Form"></td>
  </tr>
</table>
</form>
    <?
	
}else{
echo "Der blev fundet ".$antal_billeder_sog." billeder";
?>

<table border="0" cellpadding="0" cellspacing="0" >
<?PHP

$bill = mysql_query("SELECT * FROM billeder where `keyword` like '%$sog%' ");
while($r = mysql_fetch_array($bill)) {

if (id!="") {
$teller++;
if($teller == 1) {
echo "<tr>";
}

echo "
<td>
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td><table border=\"0\"  style=\"border-collapse: collapse\" cellpadding=\"0\" cellspacing=\"0\">
        <tr>
          <td><a href=\"vis_stor.php?id=".$r["id"]."&amp;sog=".$sog."\"><img src=\" " .$r["billede_sti_l"]."\" border=\"1\" style=\"border-color:#658594\" alt=\"" .$r["billede_txt"]."\" ></a></td>
        </tr>
    </table></td>
    <td width=\"6\" valign=\"top\" class=\"skygge_l\" ><img src=\"billeder/skygge_h/hh.png\" alt=\"skygge\" width=\"6\" height=\"12\"></td>
  </tr>
  <tr>
    <td height=\"6\" class=\"skygge_v\" ><img src=\"billeder/skygge_h/vh.png\" alt=\"skygge\" width=\"9\" height=\"6\"></td>
    <td width=\"6\" height=\"6\"><img src=\"billeder/skygge_h/nh.png\" alt=\"skygge\" ></td>
  </tr>
</table>
<br>
</td>
<td width=\"15\">&nbsp;</td>
";
if($teller == $skift) {
echo "</tr>";
$teller = 0;
}

if($ta == $antal_billeder){
while($teller < $skift and $teller != 0 ) {
echo "<td>&nbsp;</td>
	<td width=\"15\">&nbsp;</td>
";

$teller++;
	}



}
}

} 

?>
</table>
<?PHP
}

?>


		</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
