<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "whoop";
require_once('Xml2Pdf.php');
$obj = new Xml2Pdf('content.xml');
$pdf = $obj->render();
$pdf->Output();

?>
