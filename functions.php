
<?php






/**********************************************************************
 *                                                                    *
 * Function: dropValues()                                             *
 * Purpose: Fill an array for drop down menu values                   *
 * Parameters: $col_name: the column with values                      *
 *             $values: the array to hold values                      *
 *             $query: an SQL query to table with column              *
 *                                                                    *
 *********************************************************************/
function dropValues($query, &$values,$col_name){
    ini_set('diplay_errors', 'on');

    error_reporting(e_all);

    /*Open a connection to MySQL server*/
    $mysqli = new mysqli("oniddb.cws.oregonstate.edu","dohertki-db","gvBKWgFuUOM2piV6","dohertki-db");
    if($mysqli->connect_errno){
        echo "connection error". $mysqli->connect_errno . " " . $mysqli->connect_error;
    }         


    if($result = $mysqli->query($query)){

/*

    Array value assignment based on source:https://stackoverflow.com/questions/14692866/create-an-associative-array-in-php-with-dynamic-key-and-dynamic-value


    }
 */    
    
    while ($row = $result->fetch_assoc()) {
        $values[$row["id"]] = $row[$col_name];

    }

    $result->free();

    }
    $mysqli->close();


}
?>

