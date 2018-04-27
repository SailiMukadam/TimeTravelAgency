
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome CDN -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

    <!-- custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Time Travel Agency</title>
  
</head>

<?php 

    include('includes/navbar.php');
    include('includes/database.php');

?>
<div class="jumbotron"> 
    <h1> See Popular Destinations Below </h1>
</div>
<div class="container">

        <!-- PHP to generate row for each in "tickets" table -->
        <?php 
            if(!$query) {
                $errno = $conn->connect_errno;
                $errmsg = $conn->connect_error;
                die ("Connection to database failed: ($errno) $errmsg.");
            } else {
                while(($row = $query->fetch_assoc()) !== NULL) {
            
                    echo "<div class='row'>";
                    echo "<div class='col-md-7'>";
                    echo "<a href='#'>";
                    echo "<img class='img-fluid rounded mb-3 mb-md-0' src=" , $row['images'],  "alt='Image Here'>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='col-md-5'>";
                    echo "<h3>", $row['destination'], "</h3>";
                    echo "<p>To be replace with descriptions : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
                    echo "<a class='btn btn-primary' href=itemdetails.php?id=" , $row['ticket_num'], "> Trip Details </a></div></div>";
                    echo "<hr>"; 

                }
            }
        ?>
    
</div>

<?php include('includes/footer.php'); ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
