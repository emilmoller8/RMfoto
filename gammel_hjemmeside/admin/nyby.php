<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>upload by</title>
</head>

<body>
<?PHP 
//Skab forbindelse til databasen
include("includes/config.php");
include("includes/kortploter.php");

$slet = split (',', $_POST['slet']);
$ny = split (',', $_POST['ny']);
$navn = split (',', $_POST['navn']);
$id = split (',', $_POST['id']);
$x_mc = split (',', $_POST['x_mc']);
$y_mc = split (',', $_POST['y_mc']);
$hv = split (',', $_POST['hv']);
//sletter byer, billeder og mapper
foreach ($slet as $i_slet){
if($i_slet!=""){
	//slet byen
	$s = mysql_query("delete from byer where by_id='$i_slet' ");
	$sb = mysql_query("delete from billeder where by_id='$i_slet' ");

	//mangler at slette billeder både i form af filer og mapper
	
	}
}
///slet slut
for($i=0; $i<sizeof($ny); $i++){
	if($ny[$i]=="true"){
	//opret forsporsel
	$query = "INSERT INTO `byer` ( `by_id` , `by_navn` , `x_pos` , `y_pos` , `hv` , `key` ) VALUES ('$id[$i]','$navn[$i]','$x_mc[$i]','$y_mc[$i]','$hv[$i]','') ";
	mysql_query($query) or die (mysql_error());
	if(!is_dir($abso.$uploaddir.$id[$i])){
	mkdir($abso.$uploaddir.$id[$i], 0777);
	}
	}else{
$query_up = "update byer set by_navn='$navn[$i]', x_pos='$x_mc[$i]', y_pos='$y_mc[$i]', hv='$hv[$i]' where by_id='$id[$i]' ";
mysql_query($query_up) or die (mysql_error());

	}
}

// fremstiller et jpg kort burde laves ved at kortploter.php laver et billed hver gang men det går nok
$query = 'SELECT * FROM byer';
$results = mysql_query($query);

$tel = 0;
while($line = mysql_fetch_array($results)) {
	if($tel==0){
		resize("/var/www/www.rmfoto.dk/www/billeder/gronland.jpg","/var/www/www.rmfoto.dk/www/billeder/map2.jpg",$line["x_pos"],$line["y_pos"]-4,$line["by_navn"],$line["hv"]);
	}else{
		resize("/var/www/www.rmfoto.dk/www/billeder/map2.jpg","/var/www/www.rmfoto.dk/www/billeder/map2.jpg",$line["x_pos"],$line["y_pos"]-4,$line["by_navn"],$line["hv"]);
	}
	resize("/var/www/www.rmfoto.dk/www/billeder/menu.jpg","/var/www/www.rmfoto.dk/www/billeder/map".$line["by_navn"].".jpg",$line["x_pos"],$line["y_pos"]-4,$line["by_navn"],$line["hv"]);
	$tel++;
}


echo "<meta http-equiv=\"refresh\" content=\"0;url=index.htm \" />";


?>

</body>
</html>
