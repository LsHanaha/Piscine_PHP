<?PHP

if (!$_GET)
	return ;

if ($_GET['name'] && $_GET['action'])
{
	$name = $_GET['name'];
	if ($_GET['action'] == "set")
	{
		$value = trim($_GET['value']);
		setcookie($name, $value);
	}
	else if ($_GET['action'] == "get")
	{
		print($_COOKIE[$_GET['name']]."\n");
	}
	else if ($_GET['action'] == "del")
		setcookie($name, NULL, -1);
}
?>
