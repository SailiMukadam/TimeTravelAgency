<?php
require_once('includes/database.php');

//retrieve and sanitize ticket inputs
$ticket_num = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'ticket_num', FILTER_SANITIZE_NUMBER_INT)));
$destination = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_STRING)));
$time_period = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'time_period', FILTER_SANITIZE_STRING)));
$cost = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_NUMBER_FLOAT)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));

//insert statement
$sql = "INSERT INTO tickets (destination, time_period, cost, description, image) VALUES ('$destination', '$time_period', '$cost', '$description', '$image')";

//execute the query
$query = $conn->query($sql);

header("Location: ticketlist.php");