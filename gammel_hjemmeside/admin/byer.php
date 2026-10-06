<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>

<?PHP
//opret forbindelse til database
include("includes/config.php");

$nrdat = mysql_fetch_row(mysql_query("SELECT COUNT(by_id) as total FROM byer "));
$antal_byer = $nrdat[0];

for($ta = 0; $ta < $antal_byer+1; $ta++){
$bill = mysql_query("SELECT * FROM byer where by_id='$ta'");
while($r = mysql_fetch_array($bill)) {

echo "
<a href=\"billed_list.php?byid=".$ta."\">".$r["by_navn"]."</a><br><br>
";


} 
}


?>

</body>
</html>
