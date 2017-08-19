

<?php
echo "hello world";


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
    SELECT  c.id, c.name_c, c.desc_c, c.date_c, c.amount FROM credits c;"))){
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}




if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_result( $id, $company, $desc_c, $date_c, $amount_c)){
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
        <h1>Incomes</h1>
        <ul>
            <li ><a href="home.php">Ledger</a></li>
            <li ><a href="account.php">Accounts</a></li>
            <li ><a href="expenses.php">Expenses</a></li>
            <li id="selected"><a href="incomes.php">Incomes</a></li>
            <li ><a href="banks.php">Banks</a></li>
        </ul>
    </div>



    <div id="Ledger" class="tabs">
        <h3>Incomes</h3>

    
    <div>
    <table>
      <tbody>

      <th>ID </th>
      <th>Date</th>
      <th>Payer</th>
      <th> Description</th>
      <th> Amount</th>


         <?php
        //printf("\nid: 5s (%s)\n", $row['id']);

        while ($stmt->fetch()){
            printf("<tr><td> %s </td><td> %s </td><td> %s</td><td> %s </td><td> %s </td></tr> ", $id, $date_c, $company, $desc_c, $amount_c );
        
        
        }


    //printf("\nid: 5s (%s)\n", $row['balance']);

?>







      </tbody>

    </table>
    </div>





  </body>




</html>


<?php

        $stmt->close();

?>



