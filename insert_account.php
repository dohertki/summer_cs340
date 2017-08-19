





<?php



$today = date("Y-m-d");

print "Today is: $today.";


$bn = $_POST['bank_name'];
$add = $_POST['bank_add'];
$ph = $_POST['bank_phone'];


$bid = $_POST['banks'];
$uid = 1;
$an = $_POST['acct_name'];
$at = $_POST['acct_type'];
$bl = $_POST['acct_balance'];
echo " bid". $bid. " uid" .$uid . " an" . $an . " at" . $at . " bl". $bl ;
$sql = "INSERT INTO account(bank_id, user_id, acct_name, acct_type, acct_balance) VALUES(?,?,?,?,?)";

ini_set('diplay_errors', 'on');
error_reporting(e_all);

/*source: http://php.net/manual/en/mysqli.quickstart.prepared-statements.php*/


$mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
if($mysqli->connect_errno){
    echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
} else { echo "connection made";}        


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iisii", $bid, $uid, $an, $at, $bl);
$stmt->execute();

$stmt->close();
$mysqli->close();



?>




<?php


  //  SELECT  a.id, a.bank_id, a.user_id, a.acct_name, a.acct_type, a.acct_balance FROM account a;


/*source: http://php.net/manual/en/mysqli.quickstart.prepared-statements.php*/


$mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
if($mysqli->connect_errno){
    echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
} else { echo "connection made";}        


if (!($stmt = $mysqli->prepare("


    SELECT  a.id, b.bank_name, a.bank_id, a.user_id, a.acct_name, a.acct_type,a.acct_balance 
    FROM account a
    INNER JOIN banks b ON a.bank_id = b.id
    ORDER by a.id
    ;  


    "))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}



if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_result( $id, $bank, $bankid, $owner, $acct_name, $type, $balance )){
    echo "Binding output parameters failed: (". $stmt->errno  . ") " . $stmt->error;}



/*
    SELECT d.id, d.name_d, d.desc_d, d.date_d, d.amount FROM account a

 */
?>
<!DOCTYPE html>

<html>
  <head>
    <title>CS340 Project </title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>  
  </head>
  <body>


<!-- Tab menu based on source: http://www.htmldog.com/techniques/tabs/ -->

    <div id="header">
        <h1>Account added</h1>
        <ul>
            <li ><a href="home.php">Ledger</a></li>
            <li ><a href="account.php">Accounts</a></li>
            <li><a href="expenses.php">Expenses</a></li>
            <li><a href="incomes.php">Incomes</a></li>
            <li ><a href="banks.php">Banks</a></li>
        </ul>
    </div>


    
    <div>
    <table>
      <tbody>
      <th>  </th> 
      <th>Bank </th>
      <th>Account Name</th>
      <th> Account Type</th>
      <th> Balance</th>


         <?php
        //printf("\nid: 5s (%s)\n", $row['id']);

        while ($stmt->fetch()){
            printf("<tr><td> %s </td><td> %s</td><td> %s </td><td> %s </td><td> %s </td></tr> ", $id, $bank, $acct_name, $type, $balance );
        
        
        }



?>


      </tbody>

    </table>
    </div>


     <a id="return" href="account.php"> Back</a>

  </body>




</html>


<?php

        $stmt->close();

?>



