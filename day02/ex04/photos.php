#!/usr/bin/php
<?PHP
if ($argc < 2)
	return (0);

function ft_get_photo_by_curl($link, $folder)
{
	$ch = curl_init($link);
	preg_match("/(?:.*?\/)(.*?)/U", $link, $filename);
	if (file_exists($folder."/".$filename[1]))
	{
		print("File ".$folder."/".$filename[1]." already exists\n");
		return (0);
	}
	$fp = fopen($folder."/".$filename[1], 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	
	fclose($fp);
}

function get_src_address($prefix, $addr, $folder)
{
	preg_match("/(?:.*?src= ?)([\"\'])(.*?)([\"\'])/", $addr, $arr);
	if (preg_match("/(https?:\/\/)/", $arr[2]))
	{
		ft_get_photo_by_curl($arr[2], $folder);
	}
	else
	{
		$link = $prefix.$folder.$arr[2];
		ft_get_photo_by_curl($link, $folder);
	}
}

preg_match("/(.*?\/\/)(.*)(?:\b)/", $argv[1], $folder);
$prefix = $folder[1];
$folder = $folder[2];

$ch = curl_init($argv[1]);

curl_setopt($ch, CURLOPT_URL, $argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$str = curl_exec($ch);
if ($str === false)
	return (print(curl_error($ch)."\n"));

if (file_exists($folder) && !is_dir($folder))
	exit("File with this name exists\n");
if (!file_exists($folder))
	mkdir("./".$folder, 0777, true);


preg_match_all("/(?:.*?)(< ?img .*?>)(?:.*?)/", $str, $arr);

if (count($arr) < 1)
	exit ();
unset($arr[0]);
foreach($arr as $elem)
{
	foreach ($elem as $new_elem)
		get_src_address($prefix, $new_elem, $folder);
}

?>
