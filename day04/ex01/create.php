<?php
	if ($_POST["passwd"] && $_POST["login"] && $_POST["submit"] == "OK")
	{
		$login = $_POST["login"];
		$passwd = $_POST["passwd"];
		if (strlen(trim($passwd)) == 0)
		{
			echo "ERROR";
			return;
		}
		$file = "../private/passwd";
		if (!file_exists("../private"))
			mkdir("../private");
		$flag = 0;
		if (file_exists($file))
		{
			$array_value = unserialize(file_get_contents($file));
			if ($array_value)
				foreach($array_value as $elem)
				{
					if (!strcmp($elem['login'], $login))
					{
						$flag = 1;
						break;
					}
				}
		}
		if ($flag)
			echo "ERROR";
		else
		{
			$array_value[] = array("login" => $_POST["login"], "passwd" => hash("whirlpool", $passwd));
			file_put_contents($file, serialize($array_value));
			echo "OK";
		}
	}
	else
		echo "ERROR";
?>

