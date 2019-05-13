#!/usr/bin/php
<?PHP

function ft_split_unsort($str)
{
	trim($str);
	$arr = array();
	$i = 0;
	$my_tab = explode(" ", $str);
	foreach ($my_tab as $elem)
	{
		if (strlen($elem) < 1)
			$arr[] = $i;
		$i++;
	}
	while ($i--)
		unset($my_tab[$arr[$i]]);
	return($my_tab);
}

if ($argc < 2)
	return (NULL);

$arr = ft_split_unsort($argv[1]);
$arr = array_values($arr); 
$temp = $arr[0];
unset($arr[0]);
foreach($arr as $elem)
	print("$elem ");
print("$temp\n");

?>
