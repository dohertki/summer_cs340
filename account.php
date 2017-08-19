
<?php

$today = date("Y-m-d");

print "Today is: $today.";

?>






  


<?php

ini_set('diplay_errors', 'on');

error_reporting(e_all);

include 'functions.php';

$bank_tab = " SELECT  id, bank_name FROM banks";
$bank_array = array();

$capture_bank_col = "bank_name";

dropValues($bank_tab, $bank_array, $capture_bank_col );


/*source: http://php.net/manual/en/mysqli.quickstart.prepared-statements.php*/


$mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
if($mysqli->connect_errno){
    echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
} else { echo "connection made";}        


if (!($stmt = $mysqli->prepare("
    

    SELECT  a.id, b.bank_name,a.bank_id, a.user_id, a.acct_name, a.acct_type,   
    a.acct_balance FROM account a
    INNER JOIN banks b ON a.bank_id = b.id;  


    "))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else { echo"  Prepare ";}



if (!$stmt->execute()) {
    echo "Execute failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->bind_result( $id, $bank_name, $bank, $owner, $acct_name, $type, $balance )){
    echo "Binding output parameters failed: (". $stmt->errno  . ") " . $stmt->error;}



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
        <h1>Accounts</h1>
        <ul>
            <li ><a href="home.php">Ledger</a></li>
            <li id="selected"><a href="account.php">Accounts</a></li>
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
            printf("<tr><td> %s </td><td> %s</td><td> %s </td><td> %s </td><td> %s </td></tr> ", $id, $bank_name, $acct_name, $type, $balance );
        
        
        }



?>





      </tbody>

    </table>
    </div>


    <div>
      <form method="post"  action="insert_account.php">
        <fieldset>
          <legend> add account</legend>



            Bank Name:
            <select name="banks">

            <?php

            foreach($bank_array as $k => $id){
            ?>

            <option value="<?php echo $k ; ?> "><?php echo $id; ?></option>

            <?php

            }
            ?>
            </select>
           <br/>
              

            Type:             
            <select name="acct_type">
              <option value="1">Checking</option>
              <option value="2">Savings</option>
              <option value="3">Investment</option>

            </select>
           <br/>



            Account Name:
             <input type="text" name="acct_name" maxlength="30" required="required"/>
           <br/> 

            Balance:
             <input type="number" name="acct_balance" maxlength="30" required="required"/>
            
           <br/>
        



        </fieldset>
        <input type="submit" name="Add" value="Add Account" />
      </form>    


    </div>




  </body>




</html>


<?php

        $stmt->close();

?>



