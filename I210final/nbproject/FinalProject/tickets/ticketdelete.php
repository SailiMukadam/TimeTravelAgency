<?php

require_once('includes/db_connect.php');
include('includes/navbar.php');
 
//retrieve ticket from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "<h1 style='padding-top:50px'>Temporal anomaly detected—ticket does not exist in time-space continuum was not found.</h1>";
    require_once ('includes/footer.php');
    exit();
}
 
$ticket_num = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 
//define the MySQL delete statement
 $sql = "DELETE FROM tickets WHERE ticket_num=$ticket_num";
 
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
echo "Your destination has been erased from history.";
// close the connection.
$conn->close();
 
include ('includes/footer.php');
?>
