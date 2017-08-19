









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


if (!$stmt->bind_result( $id, $bank, $bank_add, $bank_phone )){
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
        <h1>Banks</h1>
        <ul>
            <li ><a href="home.php">Ledger</a></li>
            <li><a href="account.php">Accounts</a></li>
            <li><a href="expenses.php">Expenses</a></li>
            <li><a href="incomes.php">Incomes</a></li>
            <li id ="selected"><a href="banks.php">Banks</a></li>
        </ul>
    </div>


   <br/> 
    <div>
    <table>
      <tbody>
      <th>  </th> 
      <th>Bank </th>
      <th>Adress</th>
      <th>Phone </th>


         <?php

        while ($stmt->fetch()){
            printf("<tr><td> %s </td><td> %s</td><td> %s </td><td> %s </td></tr> ", $id, $bank, $bank_add, $bank_phone );
        
        
        }



?>





      </tbody>

    </table>
    </div>


    <div>
      <form method="post"  action="insert_bank.php">
        <fieldset>
          <legend> Add Bank</legend>

            Bank Name:
             <input type="text" name="bank_name" maxlength="30" required="required"/>
           <br/> 

            Bank Address:
             <input type="text" name="bank_add" maxlength="30" required="required"/>
           <br/>
            

            Bank Phone:
             <input type="text" name="bank_phone" maxlength="30" required="required"/>
           <br/>    
        



        </fieldset>
        <input type="submit" name="Add" value="Add Bank" />
      </form>    


    </div>



  </body>




</html>


<?php

        $stmt->close();

?>



