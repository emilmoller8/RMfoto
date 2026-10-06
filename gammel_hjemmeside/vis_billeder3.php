<?PHP
//opret forbindelse til database
include($www."includes/config.php");
	$by = mysql_query("SELECT * FROM byer where by_id='".$HTTP_GET_VARS['byid']."' ");
	while($r = mysql_fetch_array($by)) {
	$bynavn  = $r["by_navn"];
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>RMfoto - <?PHP echo $bynavn; ?></title>
<link rel="shortcut icon" href="<?PHP echo $www;?>favicon.ico" >
<link href="css/lightbox.css" rel="stylesheet" type="text/css" >
<link href="<?PHP echo $www;?>visfuld.css" rel="stylesheet" type="text/css" >
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/lightbox.js" type="text/javascript"></script>
<script src="js/sideskift.js" type="text/javascript" ></script>
</head>


<style>
img {
    max-width: 100%;
    height: auto;
}
</style>

<body>
<table border="0" cellpadding="0" cellspacing="0" style=" height: 100%; " >
  <tr>
    <td width="60" class="venstre_kandt">&nbsp;</td>
    <td width="140" valign="top" class="venstre_bg"><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="mellemrum_top">&nbsp;</td>
      </tr>
      <tr>
        <td class="mellemrum_under_top">&nbsp;</td>
      </tr>
      <tr>
        <td class="venstre_kandt"><img src="<?PHP echo $www;?>billeder/fir.gif" alt="grafik" width="15" height="15">
		<?PHP
		echo $bynavn;
	
	//hvornår skal den skifte
	$opsat = mysql_fetch_row(mysql_query("SELECT variabel FROM opsatning where navn='skift' "));
	$skift = $opsat[0];


	?>
	<br>
	<br>
	<a href="<?PHP echo $www;?>index.php"><img src="<?PHP echo $www;?>billeder/fir.gif" alt="grafik" width="15" height="15" border="0" > Til forsiden</a>
		</td>
      </tr>
    </table></td>
    <td width="20" class="mellem_vk_billed">&nbsp;</td>
    <td width="4" valign="top">
	<table style=" height: 100%; width:800px" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="mellemrum_top">&nbsp;</td>
      </tr>
      <tr>
        <td>

       

<?PHP
$sideskift = 20;

$nrdat = mysql_fetch_row(mysql_query("SELECT COUNT(id) as total FROM billeder where by_id='".$HTTP_GET_VARS['byid']."' "));
$antal_billeder = $nrdat[0];
$teller = 0;
$teller2 = 0;
$sidenummer = 0;
$sidenummer_old = 0;



$bill = mysql_query("SELECT * FROM billeder where by_id='".$HTTP_GET_VARS['byid']."' ORDER BY `billeder`.`id` DESC " );
while($r = mysql_fetch_array($bill)) {
if($teller2%$sideskift == 0){
$sidenummer++;	
}
$teller++;
$teller2++;

if($sidenummer > $sidenummer_old){
	
	$page = $sidenummer-1;
	if($sidenummer>1){
		echo"
		</table>
		<div align=\"center\">";
		
			//side nummer
	if($page>1){
				echo
			"<a id=\"prev".$page."\" href=\"javascript:previousPage();\" >&lt;&lt;Forrige</a> 
			 ";
	} 
		for($i=0; $i<$antal_billeder/$sideskift;$i++){
		$side = $i+1;
			if($page!=$side){
				echo "<a id=\"goto".$page.$side."\" href=\"javascript:goToPage(".$side.");\" >".$side."</a>";
			}else{
				echo "<strong>".$side."</strong> ";
			}
		}
		
	if($page*$sideskift < $antal_billeder){

			echo "
			 <a id=\"next".$page."\" href=\"javascript:nextPage();\" >N&aelig;ste&gt;&gt;</a>
			 ";	
	}
	//end of side nummmer
	
	echo"</div>";
	echo"</div>";
	}
		echo "   
	<div id=\"page".$sidenummer."\" >
	<table border=\"0\"  cellpadding=\"0\" cellspacing=\"0\">
	";
	
	$sidenummer_old++;
}


if($teller == 1) {
echo "<tr>";
}

echo "

<td>
<div class=\"polaroid\">
  <a href=\"".$r["billede_sti_s"]."\" rel=\"lightbox[".$bynavn."]\"><img src=\" " .$r["billede_sti_l"]."\" border=\"1\" style=\"border-color:#658594; width:100%\" alt=\"" .$r["billede_txt"]."\"></a>
</div>
</td>
";
if($teller == $skift) {
echo "</tr>";
$teller = 0;
}
if(u == $antal_billeder){

while($teller < $skift and $teller != 0) {
echo "<td>&nbsp;</td>
	<td width=\"15\">&nbsp;</td>
";

$teller++;
}

	
}

} 



?>
</table>
<div  align="center">
<?PHP
			//side nummer
			$page++;
	if($page>1){
				echo
			"<a id=\"previous\" href=\"javascript:previousPage();\" >&lt;&lt;Forrige</a> 
			 ";
	 
		for($i=0; $i<$antal_billeder/$sideskift;$i++){
		$side = $i+1;
			if($page!=$side){
				echo "<a id=\"goto".$page.$side."\" href=\"javascript:goToPage(".$side.");\" >".$side."</a>";
			}else{
				echo "<strong>".$side."</strong> ";
			}
		}
		
	}
		
	//end of side nummmer
?>
</div>
</div>
    

        </td>
    <td width="4" valign="top" align="right"><img src="billeder/map<?PHP echo $bynavn;?>.jpg" width="100" height="100" alt="kort"></td>      
	  </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
