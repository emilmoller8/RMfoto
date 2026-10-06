

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Billede <?PHP echo $billed ?></title>
<style type="text/css">
<!--
body {
	background-color: #ffffff;
}
-->
</style></head>

<body>
<?PHP
include("includes/config.php"); 

$bill = mysql_query("SELECT * FROM billeder where id='".$HTTP_GET_VARS['id']."' ");
while($r = mysql_fetch_array($bill)) {
$billede_sti = $r["billede_sti_s"];
}
?>
<a href="javascript:self.close();"><img src="<?PHP echo $www; echo "$billede_sti"; ?>" border="0"></a>
</body>

</html>