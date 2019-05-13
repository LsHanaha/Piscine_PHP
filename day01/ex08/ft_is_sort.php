<?PHP

function ft_is_sort($sorted)
{
	$size = count($sorted);
	if ($size == 1)
		return (TRUE);
	$array = $sorted;
	sort($sorted);

	for ($i = 0; $i < $size; $i++)
	{ 
		if (strcmp($array[$i], $sorted[$i]))
			return (0);
	}
	return (1);
}

?>
