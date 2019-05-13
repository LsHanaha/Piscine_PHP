<?PHP

if (!$_GET)
	return ;
foreach($_GET as $new=>$val)
	echo "$new: $val\n";

?>
