<?php

require "header.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require "login/loginheader.php";
require "login/dbconf.php";
require __DIR__ . '/vendor/autoload.php';
#require ('Xml2Pdf.php');
use Nmap\Nmap;
use Nmap\getOpenPorts;
#use Nmap\Net_Nmap;

if(isset($_POST['url']) && isset($_POST['commonPorts'])|| isset($_POST['port1']) && isset($_POST['port2']) && isset($_POST['port3']) && isset($_POST['port4']) && isset($_POST['port5']))
{
  $userName = $_SESSION['username'];
  //creating a simple uuid for the file names
  $sessionID = session_id();
  $time = time();
  $sessionTime = $sessionID.$time;
  $nmap = new Nmap("files/".$sessionTime.".xml");
  $commonPorts = $_POST['commonPorts'];
  $url =$_POST['url'];
  //checkign if valid url  if not redirect
  $pattern = '/(?:https?:\/\/)?(?:[a-zA-Z0-9.-]+?\.(?:[a-zA-Z])|\d+\.\d+\.\d+\.\d+)/';
  if(!preg_match($pattern, $url))
{
  header('Location: ../home.php');
}

  if($commonPorts == 1){
    $inputPort1 = "80";
    $inputPort2 = "443";
    $inputPort3 = "21";
    $inputPort4 = "53";
    $inputPort5 = "110";


  }elseif( isset($_POST['port1']) && isset($_POST['port2']) && isset($_POST['port3']) && isset($_POST['port4']) && isset($_POST['port5'])){
    $inputPort1 = $_POST['port1'];
    $inputPort2 = $_POST['port2'];
    $inputPort3 = $_POST['port3'];
    $inputPort4 = $_POST['port4'];
    $inputPort5 = $_POST['port5'];
  }

  $nmap->scan([$url], [$inputPort1,$inputPort2,$inputPort3,$inputPort4,$inputPort5]);

  #$pdf->Output();
  #$obj = new Xml2Pdf("files/".$sessionTime.".xml");
  #$pdf = $obj->render();
  $conn = new mysqli($host, $username, $password, $db_name);

  $json= json_encode($sessionTime);
  #{"size": 42, "colour": "white"}
    $sql= "UPDATE members SET generatedReports = CONCAT('$sessionTime,',generatedReports) WHERE username = '$userName' ";
  if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

//cms detection query
$urlCMS = "https://whatcms.org/APIEndpoint/Detect?key=2606ca06f82ce02ef7df90c80f7e7ba4fc2718189726c75cdf13b61eac5157dcd9e732&url=$url";

$data = file_get_contents($urlCMS); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed
$cmsType =  $characters->result->name;
$cmsConfidence =  $characters->result->confidence;
$cmsVersion = $characters->result->version;

sleep(1);
//passing 4 vars
$space = " ";
 exec("sudo sh files/script.sh $sessionTime $space $cmsType $space $cmsConfidence $space $cmsVersion");
//echo exec("sudo sh files/script.sh $sessionTime");
//displying the results

require "getreport.php";






}//if is set


else {
  echo "please go back and chose 5 ports to scan or use the common ports features";
}
#246 added code
