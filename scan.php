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
if(isset($_POST['url']))
{
  $userName = $_SESSION['username'];
  //creating a simple uuid for the file names
  $sessionID = session_id();
  $time = time();
  $sessionTime = $sessionID.$time;
  $nmap = new Nmap("files/".$sessionTime.".xml");




  $nmap->scan(['google.com'], [ 21, 22,30,69,80 ]);

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
sleep(2);
echo exec("sudo sh files/script.sh $sessionTime");







}//if is set


else {
  echo "null";
}
#246 added code
