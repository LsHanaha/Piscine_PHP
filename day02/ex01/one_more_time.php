#!/usr/bin/php
<?PHP
if ($argc < 2)
	return (0);

$str = trim($argv[1]);
preg_match("/([A-Za-z][a-z]+\S) (\d{2}|\d{1}) (\b[A-Za-z][a-zéû]+\S) (\d{4}) (\d{2}):(\d{2}):(\d{2})/", $str, $arr);
unset($arr[0]);

if (count($arr) != 7 || $arr[2] > 31 || $arr[5] > 23 || $arr[6] > 59 || $arr[7] > 59)
{
	print("Wrong Format\n");
	exit ();
}


$day = 0;
if (preg_match_all("/[Ll]undi/", $arr[1]))
	$day = 1;
else if (preg_match_all("/[Mm]ardi/", $arr[1]))
	$day = 2;
else if (preg_match_all("/[Mm]ercredi/", $arr[1]))
	$day = 3;
else if (preg_match_all("/[Jj]jeudi/", $arr[1]))
	$day = 4;
else if (preg_match_all("/[Vv]endredi/", $arr[1]))
	$day = 5;
else if (preg_match_all("/[Ss]amedi/", $arr[1]))
	$day = 6;
else if (preg_match_all("/[Dd]imanche/", $arr[1]))
	$day = 7;
else
{
	print("Wrong Format\n");
	exit ();
}
$month = 0;
if (preg_match_all("/[Jj]anvier/", $arr[3]))
	$month = 1;
else if (preg_match_all("/[Ff]évrier/", $arr[3]))
	$month = 2;
else if (preg_match_all("/[Mm]ars/", $arr[3]))
	$month = 3;
else if (preg_match_all("/[Aa]vril/", $arr[3]))
	$month = 4;
else if (preg_match_all("/[Mm]ai/", $arr[3]))
	$month = 5;
else if (preg_match_all("/[Jj]uin/", $arr[3]))
	$month = 6;
else if (preg_match_all("/[Jj]uillet/", $arr[3]))
	$month = 7;
else if (preg_match_all("/[Aa]oût/", $arr[3]))
	$month = 8;
else if (preg_match_all("/[Ss]eptembre/", $arr[3]))
	$month = 9;
else if (preg_match_all("/[Oo]ctobre/", $arr[3]))
	$month = 10;
else if (preg_match_all("/[Nn]ovembre/", $arr[3]))
	$month = 11;
else if (preg_match_all("/[Dd]écembre/", $arr[3]))
	$month = 12;
else
{
	print("Wrong Format\n");
	exit ();
}

if ($arr[4] < 1970)
{
	print("Wrong Format\n");
	exit ();
}

if (!checkdate($month, $arr[2], $arr[4]))
{
	print("Wrong Format\n");
	exit ();
}

date_default_timezone_set('Europe/Paris');
$day2 = date('N', mktime($arr[5], $arr[6], $arr[7], $month, $arr[2], $arr[4]));
if ($day2 != $day)
{
	print("Wrong Format\n");
	exit ();
}

echo date('U', mktime($arr[5], $arr[6], $arr[7], $month, $arr[2], $arr[4])), "\n";
?>
