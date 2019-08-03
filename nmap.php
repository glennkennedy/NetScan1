<?php
#require __DIR__ . '/vendor/autoload.php';
include('vendor/willdurand/nmap/src/Nmap/Nmap.php');
#use Nmap\Nmap;
#use Nmap\getOpenPorts;
#use Nmap\Net_Nmap;
$nmap = new Nmap();
$nmap->scan(['93.107.170.95'], [ 21, 22, 80,30 ]);
