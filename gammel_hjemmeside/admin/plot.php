<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?PHP
include("includes/config.php");
include("includes/kortploter.php");

$query = 'SELECT * FROM byer';
$results = mysql_query($query);

$tel = 0;
while($line = mysql_fetch_array($results)) {
	if($tel==0){
		resize("/var/www/www.rmfoto.dk/www/billeder/gronland.jpg","/var/www/www.rmfoto.dk/www/billeder/map2.jpg",$line["x_pos"],$line["y_pos"]-4,$line["by_navn"],$line["hv"]);
	}else{
		resize("/var/www/www.rmfoto.dk/www/billeder/map2.jpg","/var/www/www.rmfoto.dk/www/billeder/map2.jpg",$line["x_pos"],$line["y_pos"]-4,$line["by_navn"],$line["hv"]);
	}
	$tel++;
}



?>

<img src="http://www.rmfoto.dk/billeder/map2.jpg" alt="kort" />
</body>
</html>