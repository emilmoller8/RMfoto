<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>upload</title>
</head>
<?PHP

// hent info
$byidnumer = $_REQUEST["by_id"];
$link_l = $_REQUEST["link_l"];
$link_s = $_REQUEST["link_s"];
$bil_txt = $_REQUEST["bil_txt"];
$bil_txt_en = $_REQUEST["bil_txt_en"];
$bil_txt_de = $_REQUEST["bil_txt_de"];
$bil_txt_gr = $_REQUEST["bil_txt_gr"];
$key = $_REQUEST["key"];
$id = $HTTP_GET_VARS['id'];


// vi starter med det lille billede
//link variabel
$billede_sti_l  = "billeder/uploadede_billeder/smaa/". $_FILES["billede_l"]["name"];

$konfiguration["upload_bibliotek"] = $_SERVER['DOCUMENT_ROOT'];
//server eller upload
if($_FILES["billede_l"]["name"] == ""){
$billedead_l = $link_l;
} else {
$billedead_l = $billede_sti_l;
}

/*video Hvor flytter vi fra og til */
$fra = $_FILES["billede_l"]["tmp_name"];
$til = $konfiguration["upload_bibliotek"] ."rm/billeder/uploadede_billeder/smaa/". $_FILES["billede_l"]["name"];

/* Saa koerer vi */
if(function_exists("move_uploaded_file")) {
  move_uploaded_file($fra, $til);
} else {
  copy($fra, $til);
}

// og slutter med det store
//link variabel
$billede_sti_s  = "billeder/uploadede_billeder/stor/". $_FILES["billede_s"]["name"];

//server eller upload
if($_FILES["billede_s"]["name"] == ""){
$billedead_s = $link_s;
} else {
$billedead_s = $billede_sti_s;
}

/*bilede Hvor flytter vi fra og til */
$fra2 = $_FILES["billede_s"]["tmp_name"];
$til2 = $konfiguration["upload_bibliotek"] ."rm/billeder/uploadede_billeder/stor/". $_FILES["billede_s"]["name"];

/*bilede Saa koerer vi */
if(function_exists("move_uploaded_file")) {
  move_uploaded_file($fra2, $til2);
} else {
  copy($fra2, $til2);
}

//Skab forbindelse til databasen
include("includes/config.php");

//henter by id	
$billeddata = mysql_query("SELECT * FROM billeder where id='".$id."' ");
while($r = mysql_fetch_array($billeddata)) {
$byid  = $r["by_id"];
}

//opret forsporsel
$query = "update billeder set billede_txt='$bil_txt',billede_txt_en='$bil_txt_en',billede_txt_de='$bil_txt_de',billede_txt_gr='$bil_txt_gr', billede_sti_l='$billedead_l', billede_sti_s='$billedead_s', keyword='$key', by_id='$byidnumer' where id = '$id'";

//forespørgelse
mysql_query($query) or die (mysql_error());

echo "<meta http-equiv=\"refresh\" content=\"0;url=billed_list.php?byid=".$byid." \" />";
?>

<body>
<?PHP echo $byidnumer; ?>
updateret
</body>

</html>