<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>upload</title>
</head>


<body>
<?PHP
//opret forbindelse til database
//include("includes/config.php");
include("includes/resize.php");

$www = "http://www.rmfoto.dk/";
$abso = '/var/www/www.rmfoto.dk/www/';
$uploaddir = '';
$imagesdir = 'kalender_billeder';
$fejl = 0;
$fejlAArsag = "";
$source = $abso."admin/Kalender_upload/Kalender_templates/";
$blade=array("forside","januar","februar","marts","april","maj","juni","juli","august","september","oktober","november","december");

// Function to Copy folders and files       
function recurse_copy($src,$dst) { 
	$dir = opendir($src); 
	@mkdir($dst); 
	while(false !== ( $file = readdir($dir)) ) { 
		if (( $file != '.' ) && ( $file != '..' )) { 
			if ( is_dir($src . '/' . $file) ) { 
				recurse_copy($src . '/' . $file,$dst . '/' . $file); 
			} 
			else { 
				copy($src . '/' . $file,$dst . '/' . $file); 
				echo $file;
				echo "<br>";
			} 
		} 
	} 
	closedir($dir); 
}
 //Tjekker om der er angivet i navn for mappen
if (empty($_POST['calenderfolder'])) {
	$fejl = 1;
	$fejlAArsag = "Der er ikke angivet et mappenavn";
	echo "<br>";
	echo $fejlAArsag;
}else{
	$uploaddir = $_POST['calenderfolder'];
	$destination = $abso.$uploaddir;
}

//Tjekker om mappen findes i forvejen
if (file_exists($abso.$uploaddir)) {
	$fejl = 1;
	$fejlAArsag = $uploaddir." findes allerede";
	echo "<br>";
	echo $fejlAArsag;
}

//Tjekker om der er angivet et kalender årstal
if (empty($_POST['Cyear'])) {
	$fejl = 1;
	$fejlAArsag = "Årstal ikke angivet";
	echo "<br>";
	echo $fejlAArsag;
}

//Tjekker om alle billeder findes
for ($x = 0; $x <  count($blade); $x++) {
	if(empty($_FILES[$blade[$x]]['name'])) {
		$fejl = 1;
		$fejlAArsag = "Billede fejl";
		$billedefejl = $blade[$x]." findes ikke";
		echo $billedefejl;
		echo "<br>";
	}
}






if(!$fejl){


	//Opretter hoved mappe
	mkdir($abso.$uploaddir, 0755, true);
	
	//Kopier templates mapper og filter
	recurse_copy($source , $destination );
	echo $source;
	echo "<br>";
	echo $destination;
	echo "<br>";


	//indsætter billeder og tilpasser størrelser
	
	for ($x = 0; $x <  count($blade); $x++) {
		//billede upload
		$billede_sti_st = $abso.$uploaddir."/".$imagesdir."/".$blade[$x].".jpg";
		$resize_billede = $abso.$uploaddir."/".$imagesdir."/".$blade[$x]."_thumb.jpg";
		//echo $billede_sti_st.'<br>'.$resize_billede.'<br>';
		if (isset($_FILES[$blade[$x]]['name']) && $_FILES[$blade[$x]]['name'] !="") {
			if(is_uploaded_file($_FILES[$blade[$x]]["tmp_name"])) {
				move_uploaded_file($_FILES[$blade[$x]]["tmp_name"], $billede_sti_st);
			}
			resize($billede_sti_st,$resize_billede,300,361,false,'');
			resize($billede_sti_st,$billede_sti_st,1176,1417,false,'');
			if($x==0){
				$forside_dir = $abso.$uploaddir."/kalenderforside.jpg";
				resize($billede_sti_st,$forside_dir,214,258,false,'');
			}
		}
	}
	
	
	echo "Kalenderen er nu uploadet"; 
}else{
	echo "<br>";
	echo "Der er ikke uploadet nogen filer eller mapper";
}


//echo "<meta http-equiv=\"refresh\" content=\"0;url=billed_list.php?byid=".$HTTP_GET_VARS['byid']." \" />";
?>


</body>

</html>