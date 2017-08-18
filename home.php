



<?php
echo "hello world";
setlocale(LC_MONETARY, 'en_US');
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


if (!($stmt = $mysqli->prepare(

/*    select  d.name_d, d.desc_d, d.date_d, d.amount ,sum(d.amount) from account a */
  "  select  d.name_d, d.desc_d, date_format(d.date_d, '%d/%m/%Y'), d.amount from account a
    INNER JOIN transactions t ON t.acct_id = a.id  
    INNER JOIN debits d ON  d.id = t.exp_id ORDER BY d.date_d ASC;"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}




if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_result( $company, $desc_d, $date_d, $amount_d)){
    echo "Binding output parameters failed: (". $stmt->errno  . ") " . $stmt->error;}



/*
    SELECT d.id, d.name_d, d.desc_d, d.date_d, d.amount FROM account a

 */
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
        <h1>Ledger Page</h1>
        <ul>
            <li id="selected"><a href="test.php">Ledger</a></li>
            <li><a href="account.php#">Accounts</a></li>
            <li><a href="expenses.php">Expenses</a></li>
            <li><a href="incomes.php">Incomes</a></li>
            <li ><a href="banks.php">Banks</a></li>
        </ul>
    </div>



    <div id="Ledger" class="tabs">
        <h3>Ledger</h3>
    </div>    
     <button class="tabslink" id="defaultopen"> ledger</button>
     <button class="tabsbutton" id="defaultopen"> Accounts</button>
     <button class="tabsbutton" id="defaultopen"> ledger</button>
     <button class="tabsbutton" id="defaultopen"> ledger</button>
     <button class="tabsbutton" id="defaultopen"> ledger</button>

    
    <div>
    <table>
      <tbody>
      <th>Date </th>
      <th>Payer/Payee</th>
      <th> Description</th>
      <th> Debit</th>
      <th> Balance</th>


         <?php
        //printf("\nid: 5s (%s)\n", $row['id']);

        while ($stmt->fetch()){
            printf("<tr><td> %s </td><td> %s</td><td> %s </td><td> %s </td></tr> ", $date_d, $company, $desc_d, money_format('%n', $amount_d ));
        
        
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







