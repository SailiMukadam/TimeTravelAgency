<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve and sanitize all fields from the form
$user_id = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT)));
$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));


//Define MySQL update statement
$sql = "UPDATE users SET
    
        firstname='$firstname',
        lastname='$lastname',
        email='$email',
        username='$username',
        password='$password',
        image='$image'

    WHERE user_id=$user_id";

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


<h2 class="jumbotron">Your update will help us prevent temporal anomalies.</h2>
<p><a href="userlist.php">Return to current users.</a></p>

<?php
// close the connection.
$conn->close();

include ('includes/footer.php');
