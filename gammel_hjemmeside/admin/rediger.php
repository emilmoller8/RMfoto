<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Rediger</title>
</head>

<body>
<?PHP include("includes/config.php"); 
$bill = mysql_query("SELECT * FROM billeder where id='".$HTTP_GET_VARS['id']."'");
while($r = mysql_fetch_array($bill)) {
$id = $r["id"];
$byid = $r["by_id"];
$txt = $r["billede_txt"];
$txt_en = $r["billede_txt_en"];
$txt_de = $r["billede_txt_de"];
$txt_gr = $r["billede_txt_gr"];

$bstil = $r["billede_sti_l"];
$bstis = $r["billede_sti_s"];
$key = $r["keyword"];
}

?>
<form action="update.php?id=<?PHP echo $id; ?>" method="post" enctype="multipart/form-data">
<p> ID:<?PHP echo $id; ?>

<hr>
<p>
  <label>
  <select name="by_id" size="1" id="by_id">
  	<?PHP
    $by = mysql_query("SELECT * FROM byer ORDER BY `byer`.`by_navn` ASC ");
	while($r = mysql_fetch_array($by)) {
	$bynavn  = $r["by_navn"];
	if($byid == $r["by_id"]){
	echo "<option value=\"".$r["by_id"]."\" selected>".$bynavn."</option>";
	}else{
	echo "<option value=\"".$r["by_id"]."\" >".$bynavn."</option>";
	}
	}
	?>
  </select>
  </label>
</p>
<hr>
<br>
<script type="text/javascript" language="javascript">
 var id = "fastsatID";
 var popup = 0;
 function openLink(url,feat){ 
   if(popup) {
	  popup.close()
   }
   popup = window.open(url,id,feat);
   popup.focus();
 }
 </script>
   <a href="javascript:void(0)"
   onclick="javascript:openLink(
   'popup.php?id=<?PHP echo $HTTP_GET_VARS['id']; ?>',
   'scrollbars=yes,toolbar=no,resizable=yes'
)"><img src="<?PHP echo $www; echo "$bstil"; ?>" border="0">
   </a>
<br>
  Billede (lille):<br>
    <input name="billede_l" type="file" id="billede_l">
    <br>
    Eller link til server.<br>
    <input name="link_l" type="text" id="link_l" value="<?PHP echo $bstil; ?>">
<hr>
  Billede (stort):<br>
    <input name="billede_s" type="file" id="billede_s">
    <br>
    Eller link til server.<br>
    <input name="link_s" type="text" id="link_s" value="<?PHP echo $bstis; ?>">
    <hr>
    <p>Billede tekst:<br>
      Dk:<br>
	<textarea name="bil_txt" cols="50" rows="5" id="bil_txt"><?PHP echo $txt; ?></textarea>
	<br>EN:<br>
	<textarea name="bil_txt_en" cols="50" rows="5" id="bil_txt_en"><?PHP echo $txt_en; ?></textarea>
	<br>DE:<br>
	<textarea name="bil_txt_de" cols="50" rows="5" id="bil_txt_de"><?PHP echo $txt_de; ?></textarea>
	<br>GR:<br>
	<textarea name="bil_txt_gr" cols="50" rows="5" id="bil_txt_gr"><?PHP echo $txt_gr; ?></textarea>


  </p>
      </p>
    <hr>
  <br>
  s&oslash;ge ord: adskilles med et komma. <br>
  <textarea name="key" cols="50" rows="5" id="key"><?PHP echo $key; ?></textarea>        
  <br>
  <table width="318" border="0" style="border-collapse: collapse" cellpadding="0" cellspacing="0">
	<tr>
		<td width="117" align="center"><p><a href="billed_list.php?byid=<?PHP echo $byid; ?>">Tilbage</a></p></td>
		<td width="201" align="center"><input type="submit" value="rediger"></td>
	</tr>
</table>

</form>
</body>

</html>