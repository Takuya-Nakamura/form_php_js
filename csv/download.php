<?php

// mb_email
// mb_language("Japanese");
// mb_internal_encoding("UTF-8");
$filepath = './list.csv';
$filename = 'list.csv';
$filedata  = file_get_contents($filepath);
$filedata = mb_convert_encoding($filedata, "SJIS", "UTF-8");

header('Content-Type: application/force-download');
header('Content-Length: '.filesize($filename));
header('Content-Disposition: attachment; filename="'.$filename.'"');
echo($filedata);
