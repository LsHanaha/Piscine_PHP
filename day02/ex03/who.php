#!/usr/bin/php
<?PHP
date_default_timezone_set('Europe/Moscow');
$fd = fopen("/var/run/utmpx", 'r');
fseek($fd, 1256);
while (!feof($fd))
{
	$str = fread($fd, 628);
	if (strlen($str) < 628)
		break;
	$arr = unpack("a256user/a4id/a32line/ipid/itype/itime", $str);
	if ($arr[type] == 7)
	{
		print("$arr[user] $arr[line]");
		$str1 = date("  F  j H:i", $arr[time]);
		print("$str1\n");
	}
}

?>
