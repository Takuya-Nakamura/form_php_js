<?php
$filepath = './list.csv';
$filename = 'list.csv';
$filedata  = file_get_contents($filepath);
$filedata = mb_convert_encoding($filedata, "SJIS", "UTF-8");

header('Content-Type: application/force-download');
header('Content-Disposition: attachment; filename="'.$filename.'"');
echo($filedata);
