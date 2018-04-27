<head>

<style>
    table, th, td {
        border: 1px solid black;
    }
    td {
        vertical-align: bottom;
    }
</style>

</head>

<?php 
    include('includes/navbar.php');

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

    // retrieve data from query string
    $ticket_num = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    // select statement
    $sql = "SELECT * FROM tickets WHERE ticket_num=" . $ticket_num;

    // execute query
    $query = $conn->query($sql);

    $row = $query->fetch_assoc();
?>

<div class="jumbotron"> 
    <h1>Trip Details</h1>
</div>

<!-- <table>
    <tr>
        <td style="width: 150px;">
            <h4>Destination:</h4>
            <h4>Time Period:</h4>
            <h4>Cost:</h4>
        </td>
        <td>
            <p><?php echo $row['destination'] ?></p>
            <p><?php echo $row['time_period'] ?></p>
            <p><?php echo "$" . $row['cost'] ?></p>
        </td>
    </tr>
</table> -->
<div class="container">
    <?php 
        echo "<h1 class='my-4'>", $row['destination'] ,"</h1>";
        echo "<div class='row'>";
        echo "<div class='col-md-8'>";
        echo "<img class='img-fluid' src=" , $row['images'],  " alt='Image Here'></div>";
        echo "<div class='col-md-4'>";
        echo "<h3 class='my-3'> Trip Details </h3> ";
        echo "<p>Trip Description Here: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
        echo "<h4>$", $row['cost'], "</h4>";
        echo "<a class='btn btn-primary' href=addtocart.php?id=$ticket_num>Add to Cart </a></div></div>";
    ?>
</div>

<?php include('includes/footer.php')?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>