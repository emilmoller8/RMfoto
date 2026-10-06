<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Upload</title>
</head>

<body>
<form action="udfor.php?byid=<?PHP echo $HTTP_GET_VARS['byid']; ?>" method="post" enctype="multipart/form-data">
<p>  Billede:<br>
    <input name="billede_s" type="file" id="billede_s">
    <br>
    <input name="vand" type="radio" value="0" checked>Ingen
    <input name="vand" type="radio" value="1" >
    <img src="../billeder/vand.png" alt="vand" >
    <input type="radio" name="vand" id="2" value="2">
    <img src="../billeder/vand2.png" alt="vand" >

<hr>
<p>Billede tekst:<br>
	DK:<br>
      <textarea name="bil_txt" cols="50" rows="5" id="bil_txt"></textarea>
	<br>EN:<br>
	<textarea name="bil_txt_en" cols="50" rows="5" id="bil_txt_en"></textarea>
	<br>DE:<br>
	<textarea name="bil_txt_de" cols="50" rows="5" id="bil_txt_de"></textarea>
	<br>GR:<br>
	<textarea name="bil_txt_gr" cols="50" rows="5" id="bil_txt_gr"></textarea>
  </p>
<hr>
  S&oslash;ge ord: adskilles med et komma. <br>
  <textarea name="key" cols="50" rows="5" id="key"></textarea>        
  <br>
  <table width="318" border="0" style="border-collapse: collapse" cellpadding="0" cellspacing="0">
	<tr>
		<td width="117" align="center"><p><a href="billed_list.php?byid=<?PHP echo $HTTP_GET_VARS['byid']; ?>">Tilbage</a></p></td>
		<td width="201" align="center"><input type="submit" value="Upload"></td>
	</tr>
</table>

</form>

</body>

</html>