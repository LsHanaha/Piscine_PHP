#!/usr/bin/php
<?PHP

if ($argc < 2)
	exit();
$argv[1] = trim($argv[1]);
$len = strlen($argv[1]);
$str = "";
$i = 0;
$j = 0;
$k = 0;
while ($i < $len)
{
	if ($k == 1 && $argv[1][$i] == ' ')
	{
		$i++;
		continue;
	}
	else if ($argv[1][$i] == ' ' && $k == 0)
	{
		$str[$j] = $argv[1][$i];
		$j++;
		$k = 1;
	}
	else
	{
		$str[$j] = $argv[1][$i];
		$j++;
		$k = 0;
	}
	$i++;
}
foreach($str as $elem)
	print($elem);
print("\n");
?>
