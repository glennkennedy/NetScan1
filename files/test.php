<?php

//$xml = simplexml_load_file("1oa6t0sb9e0uahiln7ismrvlre1564788209.xml");
//$xml->host->addChild("stuff ", "working");

//$xml->saveXML('1oa6t0sb9e0uahiln7ismrvlre1564788209.xml');

$sessionTime = $argv[1];
echo $sessionTime;
$xml = simplexml_load_file($sessionTime.".xml");
$xml->host->addChild("stuff ", "and stuff");
$xml->saveXML($sessionTime."xml");
//$content = "some text here and some more plase";
//$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/var/www/html/files/$sessionTime.txt","wb");
//fwrite($fp,$content);
//fclose($fp);
?>
