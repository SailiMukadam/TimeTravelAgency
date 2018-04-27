<?php
require_once('includes/database.php');


$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$message = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)));

//insert statement
$sql = "INSERT INTO reviews (title, message) VALUES ('$title', '$message')";

//execute the query
$query = $conn->query($sql);

header("Location: reviewlist.php");