#!/usr/bin/php
<?PHP

while (TRUE)
{
	print("Enter a number: ");
	$line = trim(fgets(STDIN));

	if (feof(STDIN))
	{
		print("\n");
		break;
	}
	if (is_numeric($line))
	{
		if ($line % 2 == 0)
			print("The number $line is even\n");
		else
			print("The number $line is odd\n");
	}
	else
		print("'$line' is not a number\n");
}

?>
