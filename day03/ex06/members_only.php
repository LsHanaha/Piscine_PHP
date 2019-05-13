<?PHP
if ($_SERVER["PHP_AUTH_USER"] == "zaz" && $_SERVER["PHP_AUTH_PW"] == "jaimelespetitsponeys")
{
?>
<html><body>
Hello Zaz<br />
<?PHP
	$addr = "../img/42.png";
	$code = base64_encode(file_get_contents($addr));
	print("<img src='data:image;base64,$code'>");
?>

</body></html>
<?PHP
}
else
{
	header("WWW-Authenticate: Basic realm=''Member area''");
	header("HTTP/1.0 401 Unauthorized");
	echo "<html><body>That area is accessible for members only</body></html>\n";
}
?>
