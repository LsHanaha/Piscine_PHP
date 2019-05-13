#!/usr/bin/php
<?PHP

include("ft_is_sort.php");

$tab = array(1, 2, 3, 4, 5, 6, 6, 6);

if (ft_is_sort($tab))
    echo "The array is sorted\n";
else
    echo "The array is not sorted\n";
?>
