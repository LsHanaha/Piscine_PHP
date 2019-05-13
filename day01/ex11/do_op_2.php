#!/usr/bin/php
<?PHP

if ($argc != 2)
{
	print("Incorrect Parameters\n");
	return (0);
}

$str = trim($argv[1]);
$first = intval($str);

$substr = trim(substr($str, strlen($first)));
$op = $substr[0];
$second = trim(substr($substr, 1));

if (!is_numeric($fistr) && !is_numeric($second))
{
	print("Syntax Error\n");
	exit();
}

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
		print("Syntax Error\n");
		break;
}

?>
