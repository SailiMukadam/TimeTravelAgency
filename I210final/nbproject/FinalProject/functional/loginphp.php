<?php

require_once('includes/db_connect.php');

//starts the session

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//shows login
$_SESSION['login_status'] = 2;

//initialize variables for username and password
$username = $password = "";

//retrieve user name and password from the form in the registerform.php 
if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

//validate user name and password against a record in the users table in the database
//select statement
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

//execute the query 
$query = @$conn->query($sql);

//fetch results
if ($query->num_rows) {
    //It is a valid user. Need to store the user in session variables.
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
//    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];

    //update the login status
    $_SESSION['login_status'] = 1;
}
?>

<h2 class="jumbotron">Welcome to the future.</h2>
<a href="index.php">Please return to our main page to start your travel experience.</a>

<?php
//close the connection
$conn->close();
