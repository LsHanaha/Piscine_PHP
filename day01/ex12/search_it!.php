#!/usr/bin/php
<?PHP

if ($argc < 3)
	return (0);
$main_key = trim($argv[1]);
if(ctype_alnum($main_key))
	print ("");

unset($argv[0], $argv[1]);

$argv = array_reverse($argv);

foreach ($argv as $elem)
{
	$temp = explode(":", $elem);
	if ($main_key == $temp[0])
	{
		print("$temp[1]\n");
		exit();
	}
}

?>
