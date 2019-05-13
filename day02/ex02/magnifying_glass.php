#!/usr/bin/php
<?php

function setCharUpper($arr)
{
	return (strtoupper($arr[0]));
}

function setUpper($arr)
{
	$arr[0] = preg_replace_callback("/>.*?(<|<\/)/s", "setCharUpper", $arr[0]);
	$arr[0] = preg_replace_callback("/(?<=title=\")[^\"]*/", "setCharUpper", $arr[0]);
	return $arr[0];
}

if ($argc != 2)
	exit();
$html = file_get_contents($argv[1]);
$html = preg_replace_callback("/<a[^>]*>.*?<\/a>/s", "setUpper", $html);
echo $html;
?>
