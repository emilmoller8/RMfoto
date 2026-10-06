<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>RM admin</title>
</head>

<body>
<a href="index.htm">Tilbage</a> 
<a href="upload.php?byid=<?PHP echo $HTTP_GET_VARS['byid']; ?>">Tilf&oslash;j nyt billede </a>
<a href="mupload.php?byid=<?PHP echo $HTTP_GET_VARS['byid']; ?>">Tilf&oslash;j flere nye billeder </a>
<br>
<?PHP
//opret forbindelse til database
include("includes/config.php");
$nrdat2 = mysql_fetch_row(mysql_query("SELECT COUNT(*) as total FROM billeder where by_id='".$HTTP_GET_VARS['byid']."' "));
$antal_billeder = $nrdat2[0];
echo "Billeder: ".$antal_billeder."<br>";
//by
	$by = mysql_query("SELECT * FROM byer where by_id='".$HTTP_GET_VARS['byid']."' ");
	while($r = mysql_fetch_array($by)) {
	$bynavn  = $r["by_navn"];
	}
echo "By: ".$bynavn."<br>";
?>


<table border="0" cellpadding="3" cellspacing="0" style="border-collapse:collapse ">
<?PHP

$skift=0;


$bill = mysql_query("SELECT * FROM billeder where by_id='".$HTTP_GET_VARS['byid']."' ORDER BY `billeder`.`id` DESC ");
while($r = mysql_fetch_array($bill)) {
if ($r["billede_txt"]==""){
$txt="&nbsp;";
$tekst_mangler = true;
} else {
$txt=$r["billede_txt"];
$tekst_mangler = false;
}
if ($r["keyword"]==""){
$key="&nbsp;";
} else {
$key=$r["keyword"];
}
$op=$r["oprettede"];

if($tekst_mangler){
echo "<tr bgcolor=\"#FF0000\">";
}else{
if ($skift==0) {
echo "<tr bgcolor=\"#8DC0CD\">";
$skift++;
} else {
echo "<tr bgcolor=\"#add2db\">";
$skift=0;
}
}
echo "
	<td><a name=\"".$r["id"]."\">".$r["id"]."</td>
    <td><a href=\"rediger.php?id=".$r["id"]."\"><img src=\"".$www.$r["billede_sti_l"]."\" border=\"0\" ></a>
	</td>
    <td>Tekst: ".$txt."<br><br>Søgeord: ".$key."<br><br>Oprettet: ".$op."</td>
	<td><a href=\"rediger.php?id=".$r["id"]."\"><img src=\"billeder/b_edit.png\" alt=\"rediger\" name=\"rediger\" width=\"16\" height=\"16\" border=\"0\" ></a></td>
    <td><a href=\"billed_list.php?action=slet&byid=".$HTTP_GET_VARS['byid']."&id=".$r["id"]."\" onClick=\"if(confirm('Er du sikker at du vil slette billedet'))this.href='billed_list.php?action=slet&byid=".$HTTP_GET_VARS['byid']."&id=".$r["id"]."'; else this.href='#'\"> <img src=\"billeder/b_drop.png\" alt=\"slet\" name=\"slet\" width=\"16\" height=\"16\" border=\"0\" ></a></td>
  </tr>
";


} 

if ($HTTP_GET_VARS['action'] == "slet" ) {
$slet = mysql_query("SELECT billede_sti_s,billede_sti_l FROM billeder where id='".$HTTP_GET_VARS['id']."' ");
while($r = mysql_fetch_array($slet)) {
$sti = $r["billede_sti_s"];
$sti2 = $r["billede_sti_m"];
$sti3 = $r["billede_sti_l"];
}
unlink($abso .$sti);
unlink($abso .$sti2);
unlink($abso .$sti3);
$query = "delete from billeder where id='".$HTTP_GET_VARS['id']."' ";


//forespørgelse
mysql_query($query) or die (mysql_error());


// opdater siden
echo "<meta http-equiv=\"refresh\" content=\"0;url=billed_list.php?byid=".$HTTP_GET_VARS['byid']." \" />";
}
?>
</table>
<a href="index.htm">Tilbage</a> 
<a href="upload.php?byid=<?PHP echo $HTTP_GET_VARS['byid']; ?>">Tilf&oslash;j nyt billede </a>
<a href="mupload.php?byid=<?PHP echo $HTTP_GET_VARS['byid']; ?>">Tilf&oslash;j flere nye billeder </a>
</body>
</html>
