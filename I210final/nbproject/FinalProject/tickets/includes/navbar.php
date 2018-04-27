<!doctype html>
<?php 
  if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<html lang="en">
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
  <body>

        <!-- The social media icon bar -->
        <!-- <div class="icon-bar">
          <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a> 
          <a href="" class="twitter"><i class="fab fa-twitter"></i></a> 
          <a href="#" class="google"><i class="fab fa-google-plus-g"></i></a> 
          <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="youtube"><i class="fab fa-youtube"></i></a> 
        </div> -->

        <!-- Navbar to be used in INCLUDES -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                    <i class="fas fa-hourglass-half"></i>
                Time Travel Agency
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="loginhtmlform.php">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="userlist.php">Users</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="destinations.php">
                        Popular Destinations
                      </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="ticketlist.php">
                        Available Destinations
                    </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="reviewlist.php">Reviews</a>
                    </li>
                  </ul>
                  <form class="form-inline" action="searchresults.php" method="get" style="padding-top:17px">
                    <input class="form-control mr-sm-2" name="term" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                  <!-- <ul class="nav navbar-nav navbar-right" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <li class="nav-link dropdown-toggle"><i class="fas fa-user-circle"></i>  Profile</li>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <li><a href="loginhtmlform.php"><i class="fas fa-user-plus"></i>  Sign Up</a></li>
                      <li><a href="loginhtmlform.php"><i class="fas fa-sign-in-alt"></i>   Log in</a></li>
                      <li><a href="#"><i class="fas fa-shopping-cart"></i>  Shopping Cart</a></li>
                    </div>
                  </ul> -->
                </div>
              </nav>
