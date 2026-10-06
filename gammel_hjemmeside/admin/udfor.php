<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>upload</title>
</head>
<?PHP
//opret forbindelse til database
include("includes/config.php");
include("includes/resize.php");

// hent info
$bil_txt = $_REQUEST["bil_txt"];
$bil_txt_en = $_REQUEST["bil_txt_en"];
$bil_txt_de = $_REQUEST["bil_txt_de"];
$bil_txt_gr = $_REQUEST["bil_txt_gr"];
$key = "Grønland,".$_REQUEST["key"];


//billede upload
$ext = strtolower( pathinfo( $_FILES["billede_s"]["tmp_name"], PATHINFO_EXTENSION ) );
$today = date("mdyHis");
$navn = $_FILES["billede_s"]["name"];
$navn=str_replace(" ", '_', $navn);
$navn=str_replace("æ", 'ae', $navn);
$navn=str_replace("ø", 'oe', $navn);
$navn=str_replace("å", 'aa', $navn);
$time = time();
$billede_sti_st = $abso.$uploaddir .$HTTP_GET_VARS['byid'].'/'. $time . "_" . $navn;
$billede_sti_me = $abso.$uploaddir .$HTTP_GET_VARS['byid'].'/medium_'. $time . "_" . $navn;
$resize_billede = $abso.$uploaddir .$HTTP_GET_VARS['byid'].'/trump_'. $time . "_" . $navn;
$database_sti_s = $uploaddir .$HTTP_GET_VARS['byid'].'/'. $time . "_" . $navn;
$database_sti_l = $uploaddir .$HTTP_GET_VARS['byid'].'/'.'trump_'. $time . "_" . $navn;
$database_sti_m = $uploaddir .$HTTP_GET_VARS['byid'].'/'.'medium_'. $time . "_" . $navn;
echo $billede_sti_st.'<br>'.$resize_billede.'<br>'.$billede_sti_me;
if (isset($_FILES['billede_s']['name']) && $_FILES['billede_s']['name'] !="") {

if(is_uploaded_file($_FILES["billede_s"]["tmp_name"])) {
move_uploaded_file($_FILES["billede_s"]["tmp_name"], $billede_sti_st);
}
resize($billede_sti_st,$resize_billede,120,120,true,'');
resize($billede_sti_st,$billede_sti_me,1000,700,false,'');
resize($billede_sti_st,$billede_sti_st,2000,2000,false,'');
}


// find billede ID nummer
$idnr = mysql_fetch_row(mysql_query("SELECT MAX(id) AS id FROM billeder "));
$id_d = $idnr[0] + 1;


//opret forsporsel
$query = "INSERT INTO billeder (id, by_id, billede_txt,billede_txt_en,billede_txt_de,billede_txt_gr, billede_sti_l, billede_sti_m, billede_sti_s, keyword) VALUES ('$id_d','".$HTTP_GET_VARS['byid']."', '$bil_txt', '$bil_txt_en', '$bil_txt_de', '$bil_txt_gr', '$database_sti_l', '$database_sti_m', '$database_sti_s', '$key') ";

//forespørgelse
mysql_query($query) or die (mysql_error());

  

echo "<meta http-equiv=\"refresh\" content=\"0;url=billed_list.php?byid=".$HTTP_GET_VARS['byid']." \" />";
?>

<body>

uploaded
</body>

</html>