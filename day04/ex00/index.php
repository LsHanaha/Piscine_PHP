
<?php
	if ($_GET["submit"] == "OK")
	{
		session_start(); 
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>

<html>
<body>
	<form method="get" action="index.php">
		<label for="user">Username:</label> 
		<input id="user" type="text" name="login" value="<?php if ($_SESSION["login"]){echo $_SESSION["login"];} ?>" />
		<br />
		<label for="pass">Password:</label> 
		<input id="pass" type="password" name="passwd" value="<?php if ($_SESSION["passwd"]){ echo $_SESSION["passwd"];} ?>" />
		<br />
		<input type="submit" name="submit" value="OK">
	</form>
</body>
</html>
