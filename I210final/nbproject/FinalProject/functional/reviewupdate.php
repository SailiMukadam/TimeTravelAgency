<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve and sanitize all fields from the form
$review_num = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'review_num', FILTER_SANITIZE_NUMBER_INT)));
$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$date_posted = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'date_posted', FILTER_SANITIZE_STRING)));
$message = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)));


//Define MySQL update statement
$sql = "UPDATE reviews SET
    
        review_num='$review_num',
        title='$title',
        date_posted='$date_posted',
        message='$message'

    WHERE review_num=$review_num";

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


<h2 class="jumbotron">Your update will help users to find their place in history.</h2>
<p><a href="reviewlist.php">Return to available reviews.</a></p>

<?php
// close the connection.
$conn->close();

include ('includes/footer.php');
