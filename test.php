



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
    SELECT  d.name_d FROM account a
    INNER JOIN transactions t ON t.acct_id = a.id  
    INNER JOIN debits d ON  d.id = t.exp_id;"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}




if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_result( $company)){
    echo "Binding output parameters failed: (". $stmt->errno  . ") " . $stmt->error;}



/*
if (!($stmt = $mysqli->prepare("
    SELECT d.id, d.name_d, d.desc_d, d.date_d, d.amount FROM account a
    INNER JOIN transactions t ON t.acct_id = a.id  
    INNER JOIN debits d ON  d.id = t.exp_id;"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->bind_result($did, $company, $desc_d, $date_d, $amount_d),                     ){
    echo "Binding output parameters failed: (". $stmt->errno  . ") " . $stmt->error;}


 */
?>





<html>
  <head>
  </head>
  <body>
    <h1> HODOR</h1>

    <table>
      <tbody>
      <th>Date </th>
      <th>Payer/Payee</th>
      <th> Description</th>
      <th> C/D</th>
      <th> Amount</th>
      <th> Balance</th>


         <?php
        //printf("\nid: 5s (%s)\n", $row['id']);

        while ($stmt->fetch()){
            printf("%s<br> ", $company);
        }

//printf("\nid: 5s (%s)\n", $row['balance']);

?>







      </tbody>

    </table>






  </body>




</html>


<?php

        $stmt->close();

?>







