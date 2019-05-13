#!/usr/bin/php
<?PHP

if ($argc != 4)
{
	print("Incorrect Parameters\n");
	return (0);
}

$first = trim($argv[1]);
$second = trim($argv[3]);
$op = trim($argv[2]);

$res = 0;

switch ($op) {
	case '+':
		$res = $first + $second;
		print("$res\n");
		break;

	case '-':
		$res = $first - $second;
		print("$res\n");
		break;

	case '*':
		$res = $first * $second;
		print("$res\n");
		break;

	case '/':
		$res = $first / $second;
		print("$res\n");
		break;

	case '%':
		$res = $first % $second;
		print("$res\n");
		break;

	default:
		print("$res\n");
		break;
}

?>
