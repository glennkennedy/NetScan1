<?php

//$xml = simplexml_load_file("1oa6t0sb9e0uahiln7ismrvlre1564788209.xml");
//$xml->host->addChild("stuff ", "working");

//$xml->saveXML('1oa6t0sb9e0uahiln7ismrvlre1564788209.xml');
echo "test";
$sessionTime = $argv[1];
$cmsType = $argv[2];
$cmsConfidence = $argv[3];
$cmsVersion = $argv[4];
echo $sessionTime;
echo $cmsType;
$xml = simplexml_load_file($sessionTime.".xml");
$xml->host->addChild("CMS", "$cmsType confidence: $cmsConfidence version: $cmsVersion");
$xml->saveXML($sessionTime.".xml");
//$content = "some text here and some more plase";
//$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/var/www/html/files/$sessionTime.txt","wb");
//fwrite($fp,$content);
//fclose($fp);
?>
