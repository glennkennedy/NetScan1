<?php
require "login/dbconf.php";

$xml=simplexml_load_file("files/$sessionTime.xml") or die("Error: Cannot create object");
//foreach ($xml as $key => $value) {
//  if ($key == "host") {
//    if ($value->ports != "") {
//      echo "<b>" . $value->address["addr"] . "</b> \"" . $value->hostnames->hostname["name"] . "\" [" . $value->address["addrtype"] . "]<br>\n";
//      $ports_displayed = 0;
//      foreach ($value->ports->port as $port) {
//        if ($port->state["state"] == "open" || ($port->state["state"] == "closed" && $opts_showclosed) || ($port->state["state"] == "filtered" && $opts_showfiltered)) {
//          echo $port["protocol"] . " " . $port["portid"] . " " . $port->state["state"] . " [" . $port->state["reason"] . "] " . $port->service["name"] . " (" . $port->service["product"] . ")<br>\n";
//          $ports_displayed++;
//        }
//      }
//      if ($ports_displayed == 0) {
//        echo "No interesting ports.<br>\n";
//      }
//      echo "-------<br>\n";
//    }
//  }
//  }




 ?>

<nav class="navbar navbar-light bg-light static-top">
  <div class="container">
    <a class="navbar-brand" href="#">Netscan</a>
    <a class="btn btn-primary" href="login/logout.php">Logout</a>
  </div>
</nav>
<div class="collapse navbar-collapse" id="navbarsExampleDefault">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
       <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">Link</a>
     </li>
     <li class="nav-item">
       <a class="nav-link disabled" href="#">Disabled</a>
     </li>
     <li class="nav-item dropdown">

     </li>
   </ul>
   <form class="form-inline my-2 my-lg-0">
     <input class="form-control mr-sm-2" type="text" placeholder="Search">
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
   </form>
 </div>
</nav>

<div class="container">

 <div class="row row-offcanvas row-offcanvas-right">

   <div class="col-12 col-md-9">
     <p class="float-right hidden-md-up">
     </p>
     <div class="jumbotron">
       <h1>Your scan has been completed</h1>
       <?php
       echo "<br>Started <u>" . $xml["startstr"] . "</u>, Finished <u>" . $xml->runstats->finished["timestr"] . "</u>\n";
       ?>


     </div>
     <div class="row">
       <div class="col-6 col-lg-4">
         <h2>Host information</h2>
         <?php
         foreach ($xml as $key => $value) {
           echo $value->address["addr"] . " " . $value->hostnames->hostname["name"] . " ". $value->address["addrtype"] . " ";
         }

         ?>
         <hr>
         <p>Above is the host information and the address type </p>

       </div><!--/span-->
       <div class="col-6 col-lg-4">
         <h2>Port information</h2>
         <?php
         $opts_showclosed = false;
         $opts_showfiltered = false;
         $portArray = array();
         foreach ($xml as $key => $value) {
       		if ($key == "host") {

       				foreach ($value->ports->port as $port) {

       						echo $port["protocol"] . " " . $port["portid"] . " " . $port->state["state"] . " " . $port->state["reason"] . " " . $port->service["name"] . "<br>" . $port->service["product"];
                  //$portArray = $port["portid"];


                  array_push($portArray,$port["portid"]);


       				}
            //  var_dump($portArray);




       		}
       	}


         ?>
         <hr>
         <p>Above you can see the the open and closed ports on your website </p>
         <?php
        // $newarray = implode(", ", $portArray);
         //foreach ($portArray as $value) {
           // code...
           //echo $value;
            //echo gettype($value);
         //}
         $condition = implode(', ', $portArray);

         $sql = "SELECT * from test Where port IN ($condition)";
       $result = mysqli_query($conn, $sql);
       $rowData = array();
       $dataResults = array();
       if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result)) {
             echo "About each port you have scanned:<br>";
             echo $row['info'];
           }

          //$dataResults = array_intersect($portArray, $rowData);
          //var_dump($dataResults);
           foreach ($rowData as $value) {
             //if(in)
             echo $value;
            // echo mysql_error();

          }
       } else {
           echo "0 results";
       }

          ?>
       </div><!--/span-->
       <div class="col-6 col-lg-4">
         <h2>CMS Detected</h2>
         <?php
         foreach ($xml as $key => $value) {
           echo $value->CMS;
         }

          ?>
          <p>Above you can see the what CMS the webiste is using </p>
       </div><!--/span-->

     </div><!--/row-->
   </div><!--/span-->

   <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
     <div class="list-group">
       <?php


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

                 echo "<br><a class='list-group-item' download='files/$output.xml' href=files/$output.xml>Report ".$i++."</a>";

               }



               // code...
           }
       } //else {
           //echo "0 results";
       //}

        ?>
     </div>
   </div><!--/span-->
 </div><!--/row-->
 <br>
 <form method="get" action="/sql.php" class="form-inline" style="">
     <br></br>
     <div class="col-xs-6">
         <h4>SQL Checker:</h4>
         <br>
         <br>
         <input name="ip" class="span5" type="text" placeholder="Enter a search query." minlength="3" required>
         <button id="btnClear" class="btn btn-danger btn-md center-block" Style="width: 200px;" "margin-top:500px;" OnClick="btnClear_Click">Scan for SQL</button>
         <br></br>
         <br>



 </form>

 <hr>


 <footer>
   <p>&copy; Glenn</p>
 </footer>

</div><!--/.container-->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="offcanvas.js"></script>
