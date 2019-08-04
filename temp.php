<?php
//echo "working";
//$sessionTime = "1oa6t0sb9e0uahiln7ismrvlre1564879857";
//$cmsType = "21";
//echo exec("sudo sh files/script.sh $sessionTime $cmsType");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$urlLanguge = "https://whatcms.org/APIEndpoint/Technology?key=2606ca06f82ce02ef7df90c80f7e7ba4fc2718189726c75cdf13b61eac5157dcd9e732&url=evergreenireland.net";

$dataLang = file_get_contents($urlLanguge);
   $categories1 = json_decode($dataLang);
   echo $categories1->results[1]->name;



?>
