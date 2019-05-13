<?php
	if ($_POST["oldpw"] && $_POST["newpw"] && $_POST["login"] && $_POST["submit"] == "OK")
	{
		$login = $_POST["login"];
		$old_passwd = $_POST["oldpw"];
		$new_passwd = $_POST["newpw"];
		if (strlen(trim($old_passwd)) == 0 || strlen(trim($new_passwd)) == 0)
		{
			echo "ERROR";
			return;
		}
		$file = "../private/passwd";
		$flag = 0;
		if (file_exists($file))
		{
			$array_value = unserialize(file_get_contents($file));
			if ($array_value)
				foreach($array_value as $key=>$elem)
				{
					if (!strcmp($elem['login'], $login))
					{
						if (!strcmp($elem['passwd'], hash("whirlpool", $old_passwd)))
						{
							$array_value[$key]['passwd'] = hash("whirlpool", $new_passwd);
							$flag = 1;
							break;
						}
					}
				}
			if (!$flag)
				echo "ERROR";
			else
			{
				file_put_contents($file, serialize($array_value));
				echo "OK";
			}
		}
		else
			echo "ERROR";
	}
	else
		echo "ERROR";
?>


