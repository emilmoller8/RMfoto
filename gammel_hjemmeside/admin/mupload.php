<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Upload</title>
</head>

<body>
<form action="mudfor.php?byid=<?PHP echo $HTTP_GET_VARS['byid']; ?>" method="post" enctype="multipart/form-data">
<p>Multi upload  
<p>Billede:<br>
	<input type="file" name="billede_s[]" id="billede_s" multiple />

    <br>
    <input name="vand" type="radio" value="0" checked>Ingen
    <input name="vand" type="radio" value="1" >
    <img src="../billeder/vand.png" alt="vand" >
    <input type="radio" name="vand" id="2" value="2">
    <img src="../billeder/vand2.png" alt="vand" >

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