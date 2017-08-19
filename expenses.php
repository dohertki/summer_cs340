
<?php
echo "hello world";

$test_array = [ 
    "foo" => "bar",
    ];

print ($test_array["foo"]);


?>


<?php
echo "hello world";

$test_array = [ 
    "foo" => "bar",
    ];

print ($test_array["foo"]);

$today = date("Y-m-d");

print "Today is: $today.";

?>


  


<?php
$account_name = "usbank";
$company = NULL;

ini_set('diplay_errors', 'on');
/*$mysqli->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);*/

error_reporting(e_all);


/*source: http://php.net/manual/en/mysqli.quickstart.prepared-statements.php*/


$mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
if($mysqli->connect_errno){
    echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
} else { echo "connection made";}        


if (!($stmt = $mysqli->prepare("
    SELECT  d.id, d.name_d, d.desc_d, d.date_d, d.amount FROM debits d;

    "))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}



if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_result( $id, $company, $desc_d, $date_d, $amount_d)){
    echo "Binding output parameters failed: (". $stmt->errno  . ") " . $stmt->error;}



?>
<!DOCTYPE html>

<html>
  <head>
    <title> Ledger</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>  
  </head>
  <body>



<!-- Tab menu based on source: http://www.htmldog.com/techniques/tabs/ -->


    <div id="header">
        <h1>Expenses</h1>
        <ul>
            <li ><a href="home.php">Ledger</a></li>
            <li ><a href="account.php">Accounts</a></li>
            <li id="selected"><a href="expenses.php">Expenses</a></li>
            <li><a href="incomes.php">Incomes</a></li>
            <li ><a href="banks.php">Banks</a></li>
        </ul>
    </div>

    <div>
    <table>
      <tbody>

      <th>id </th>
      <th>Date </th>
      <th>Payee</th>
      <th> Description</th>
      <th> Amount</th>


         <?php

        while ($stmt->fetch()){
            printf("<tr><td> %s </td><td> %s </td><td> %s</td><td> %s </td><td> %s </td></tr> ", $id, $date_d, $company, $desc_d, $amount_d );
        
        
        }



?>







      </tbody>

    </table>
    </div>





  </body>




</html>


<?php

        $stmt->close();

?>



