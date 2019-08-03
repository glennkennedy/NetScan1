<?php

include('xml2pdf/Xml2Pdf.php');
$obj = new Xml2Pdf('jack.xml');
$pdf = $obj->render();
$pdf->Output();
