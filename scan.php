<?php
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
  if($commonPorts == 1){
    $inputPort1 = "21";
    $inputPort2 = "22";
    $inputPort3 = "80";
    $inputPort4 = "23";
    $inputPort5 = "55";


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
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }


$sql  = "SELECT generatedReports FROM members WHERE username = '$userName'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  //simple counter
  $i = 1;

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      //get the string from generatedReports column
        $temp =  $row["generatedReports"];
        //turing my string into an array and removeing the ','
        $array=explode(",",$temp);
        foreach ($array as $output) {
          echo "<br><a href=files/$output.xml>Reprot".$i++."</a>";

        }



        // code...
    }
} else {
    echo "0 results";
}
//cms detection query
$urlCMS = "https://whatcms.org/APIEndpoint/Detect?key=2606ca06f82ce02ef7df90c80f7e7ba4fc2718189726c75cdf13b61eac5157dcd9e732&url=$url";

$data = file_get_contents($urlCMS); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed
$cmsType =  $characters->result->name;
$cmsConfidence =  $characters->result->confidence;
$cmsVersion = $characters->result->version;

//$urlLanguge = "https://whatcms.org/APIEndpoint/Technology?key=2606ca06f82ce02ef7df90c80f7e7ba4fc2718189726c75cdf13b61eac5157dcd9e732&url=evergreenireland.net";

//$dataLang = file_get_contents($urlLanguge);
  // $categories1 = json_decode($dataLang);
  // echo $categories1->results[1]->name;



sleep(1);
//passing 4 vars
$space = " ";
echo exec("sudo sh files/script.sh $sessionTime $space $cmsType $space $cmsConfidence $space $cmsVersion");
//echo exec("sudo sh files/script.sh $sessionTime");






}//if is set


else {
  echo "please go back and chose 5 ports to scan or use the common ports features";
}
#246 added code
