<?php

    include('navbar.php');

    // define parameters
    $host = "localhost";
    $login = "phpuser";
    $password = "phpuser";
    $database = "timetraveldb";

    // connect to mysql server
    $conn = @new mysqli($host, $login, $password, $database);

    if ($conn->connect_errno) {
        $errno = $conn->connect_errno;
        $errmsg = $conn->connect_error;
        die ("Connection to database failed: ($errno) $errmsg.");
    }