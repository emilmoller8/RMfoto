<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Opret ny kalender</title>
</head>

<body>

Forsiden skal pt rettes manuelt, årstal skal også rettes 

<form action="udfor.php" method="post" enctype="multipart/form-data">

<table width="318" border="0" style="border-collapse: collapse" cellpadding="0" cellspacing="0">
	<tr>
		<td>Mappenavn:</td>
		<td><input name="calenderfolder" type="text" id="calenderfolder"  value="<?php echo "kalender".(date("Y")+1); ?>"></td>
	</tr>
	<tr>
		<td>&Aring;r:</td>
		<td><input name="Cyear" type="text" id="Cyear"  value="<?php echo (date("Y")+1); ?>"></td>
	</tr>
</table>



<p>Forside:<br>
    <input name="forside" type="file" id="forside">
    <br>

<p>Januar:<br>
    <input name="januar" type="file" id="januar">
    <br>    

<p>Februar:<br>
<input name="februar" type="file" id="februar">
<br> 

<p>Marts:<br>
<input name="marts" type="file" id="marts">
<br> 

<p>April:<br>
<input name="april" type="file" id="april">
<br> 

<p>Maj:<br>
<input name="maj" type="file" id="maj">
<br> 

<p>Juni:<br>
<input name="juni" type="file" id="juni">
<br> 

<p>Juli:<br>
<input name="juli" type="file" id="juli">
<br> 

<p>August:<br>
<input name="august" type="file" id="august">
<br> 

<p>September:<br>
<input name="september" type="file" id="september">
<br> 

<p>Oktober:<br>
<input name="oktober" type="file" id="oktober">
<br> 

<p>November:<br>
<input name="november" type="file" id="november">
<br> 

<p>December:<br>
<input name="december" type="file" id="december">
<br> 
<br> 


<input type="submit" value="Upload">

</form>

</body>

</html>