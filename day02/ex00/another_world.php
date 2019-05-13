#!/usr/bin/php
<?PHP
	if ($argc < 2)
		return (0);
	$str = $argv[1];
	$str = trim($str);
	$str = preg_replace("/[\s\t\n]+/", ' ', $str);
	print("$str\n");

?>
