




<?php



$today = date("Y-m-d");

print "Today is: $today.";


$bn = $_POST['bank_name'];
$add = $_POST['bank_add'];
$ph = $_POST['bank_phone'];



$sql = "INSERT INTO banks(bank_name, address, phone) VALUES(?,?,?)";

ini_set('diplay_errors', 'on');
error_reporting(e_all);

/*source: http://php.net/manual/en/mysqli.quickstart.prepared-statements.php*/
/*

$mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
if($mysqli->connect_errno){
    echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
} else { echo "connection made";}        


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $bn, $add, $ph);
$stmt->execute();

$stmt->close();
$mysqli->close();

*/

?>










  


<?php

ini_set('diplay_errors', 'on');

error_reporting(e_all);


/*source: http://php.net/manual/en/mysqli.quickstart.prepared-statements.php*/


$mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
if($mysqli->connect_errno){
    echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
} else { echo "connection made";}        


if (!($stmt = $mysqli->prepare("
    SELECT  id, bank_name, address, phone FROM banks;

    "))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}



if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_result( $id_t, $bank_t, $address_t, $phone_t)){
    echo "Binding output parameters failed: (". $stmt->errno  . ") " . $stmt->error;
}


?>
<!DOCTYPE html>

<html>
  <head>
    <title> CS340 Project</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>  
  </head>
  <body>


<!-- Tab menu based on source: http://www.htmldog.com/techniques/tabs/ -->

    <div id="header">
        <h1>Banks</h1>
        <ul>
            <li ><a href="home.php">Ledger</a></li>
            <li id="selected"><a href="account.php">Accounts</a></li>
            <li><a href="expenses.php">Expenses</a></li>
            <li><a href="incomes.php">Incomes</a></li>
            <li><a href="banks.php">Banks</a></li>
        </ul>
    </div>


    
    <div>
    <table>
      <tbody>
      <th>  </th> 
      <th>Bank </th>
      <th>Address</th>
      <th> Phone</th>


         <?php

        while ($stmt->fetch()){
            printf("<tr><td> %s </td><td> %s</td><td> %s </td><td> %s </td><td> %s </td></tr> ", $id_t, $bank_t, $address_t, $phone_t );
        
        
        }



?>





      </tbody>

    </table>
    </div>




     <a href="banks.php"> Back</a>


  </body>




</html>


<?php

        $stmt->close();

?>



