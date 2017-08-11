



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

$mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
if($mysqli->connect_errno){
    echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
} else { echo "connection made";}        




if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
    !$mysqli->query("CREATE TABLE test(id INT, balance INT)") ||
    !$mysqli->query("INSERT INTO test(id, balance) VALUES (1, 100)")){
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}













echo $mysqli->host_info . "\n";
        if(!($stmt = $mysqli->prepare( "SELECT first_name, last_name FROM actor"))){
            echo "Prepare Failed";
        }





        $stmt->close();

?>















