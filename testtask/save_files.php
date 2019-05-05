<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$url = 'https://rossvyaz.ru/data/ABC-3xx.csv';
$file = fopen($url, 'r');
var_dump($file);
echo '<br>';
var_dump(fgetcsv($file, 0, ';'));
echo '<br>';
var_dump(fgetcsv($file, 0, ';')[5].chr(0xEF).chr(0xBB).chr(0xBF));
echo '<br>';
var_dump(mb_detect_encoding(fgetcsv($file, 0, ';')[5]));
/*
header('Content-Type: text/csv; charset=UTF-8');
$url = 'https://rossvyaz.ru/data/ABC-3xx.csv';
$path = __DIR__.'/ABC-3xx.csv';
file_put_contents($path, file_get_contents($url));


/*
$ch = curl_init('https://rossvyaz.ru/data/ABC-3xx.csv');
$fp = fopen(__DIR__.'/ABC-3xx.csv', 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: text/csv',
    'charset=utf-8'
]);
curl_exec($ch);
curl_close($ch);
fclose($fp);
*/