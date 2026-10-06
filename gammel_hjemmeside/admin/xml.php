<?php

include("includes/config.php");


$query = 'SELECT * FROM byer';
$results = mysql_query($query);

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n";
echo "<kort>\n";

while($line = mysql_fetch_array($results)) {
$nrdat2 = mysql_fetch_row(mysql_query("SELECT COUNT(*) as total FROM billeder where by_id=".$line["by_id"]." "));
$antal_billeder = $nrdat2[0];
?>

<by navn="<?PHP echo $line["by_navn"]; ?>" id="<?PHP echo $line["by_id"]; ?>" x_mc="<?PHP echo $line["x_pos"]; ?>" y_mc="<?PHP echo $line["y_pos"]; ?>" hv="<?PHP echo $line["hv"]; ?>" />

<?PHP
}

echo "</kort>\n";


?>
