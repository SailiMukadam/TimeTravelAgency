<?php
/*
require_once ('includes/db_connect.php');

//retrieve user id from a querystring
if (!filter_has_var(INPUT_POST, 'id')) {
    echo "Error: Undetected user id.";
    require_once ('includes/footer.php');
    exit();
}

$user_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the MySQL delete statement
$sql = "DELETE FROM users WHERE user_id=$user_id";

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "Your account has been deleted.";

// close the connection.
$conn->close();
 * 
 */

require_once('includes/db_connect.php');
include('includes/navbar.php');
 
//retrieve user id from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "<h1 style='padding-top:50px'>Error: user id was not found.</h1>";
    require_once ('includes/footer.php');
    exit();
}
 
$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 
//define the MySQL delete statement
 $sql = "DELETE FROM users WHERE user_id=$user_id";
 
//execute the query
 $query = @$conn->query($sql);
 
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "Your account has been deleted.";
// close the connection.
$conn->close();
 
include ('includes/footer.php');
?>
