<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve and sanitize all fields from the form
$ticket_num = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'ticket_num', FILTER_SANITIZE_NUMBER_INT)));
$destination = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_STRING)));
$time_period = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'time_period', FILTER_SANITIZE_STRING)));
$cost = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_NUMBER_FLOAT)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));


//Define MySQL update statement
$sql = "UPDATE tickets SET
    
        ticket_num='$ticket_num',
        destination='$destination',
        time_period='$time_period',
        cost='$cost',
        description='$description',
        image='$image'

    WHERE ticket_num=$ticket_num";

//execut the query
$query = @$conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    exit;
}
?>


<h2 class="jumbotron">Your update will help provide us with precision travel capability.</h2>
<p><a href="ticketlist.php">Return to available tickets.</a></p>

<?php
// close the connection.
$conn->close();

include ('includes/footer.php');
