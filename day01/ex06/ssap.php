#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$my_tab = explode(" ", $str);
	$my_tab = array_filter($my_tab);
	sort($my_tab);
	return($my_tab);
}

if ($argc < 2)
	exit();
unset($argv[0]);

$arr = array();

foreach ($argv as $elem)
{
	$temp = ft_split($elem);
	foreach($temp as $sub_elem)
		array_push($arr, $sub_elem);
}

sort($arr);

foreach ($arr as $elem)
{
	print("$elem\n");
}

?>
