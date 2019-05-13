<?PHP

function ft_split($str)
{
	$my_tab = explode(" ", $str);
	$my_tab = array_filter($my_tab);
	sort($my_tab);
	return($my_tab);
}

?>
