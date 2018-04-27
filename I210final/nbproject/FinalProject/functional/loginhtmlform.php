<?php

require_once('includes/db_connect.php');
?>
<h2 class="jumbotron">Login or Register</h2>

<?php
$message = "Please enter your username and password to login.";
//check the login status
$login_status = '';
if (isset ($_SESSION['login_status']))
$login_status = $_SESSION['login_status'];

//the user's last login attempt succeeded.
if ($login_status == 1) {
    echo "<h2>Thank you for returning " . $_SESSION['login'] . "Let us help you to answer your time travel needs.</h2>";
    echo "<a href='logout'.php>Logout</a><br/>";
    include ('includes/footer.php');
    exit();
}

//the user has just registered 
if ($login_status == 3) {
    echo "<h2>Thank you for returning " . $_SESSION['login'] . "Let us help you to answer your time travel needs.</h2>";
    echo "<a href='logout.php'>Logout</a><br/>";
    include ('includes/footer.php');
    exit();
}

//the user's last login attempt failed
if($login_status == 2) {
    $message = "Temporal anomaly detected—your credentials do not exist on this page yet.";
}

?>
    <div class='container'>
        <div class='row'>
            <div class = 'col-md-6'>    
                <form method='post' action='loginphp.php'>
                    <table>
                        <tr>
                            <td colspan="2"><?php echo $message; ?></br><br></td>
                        </tr>
                        <tr>    
                            <td>Username: </td>
                            <td><input type='text' name='username' required></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type='password' name='password' required></td>
                        </tr>
                        <tr>
                            <td><input type='submit' value='Login'>
                                <input type="button" name="Cancel" value="Cancel" onclick="window.location.href = 'index.php'" /></td>                        
                        </tr>
                    </table>
                </form>
            </div>

            <!-- user registration -->

            <div class = 'col-md-6'>
                <form action="registration.php" method="post">
                    <table>
                        <tr>
                            <td colspan="2">Be responsible. Your credentials are needed to prevent anomalies.<br><br></td>
                        </tr>
                        <tr>
                            <td>Firstname: </td>
                            <td><input name="firstname" type="text" required></td>
                        </tr>
                        <tr>
                            <td>Lastname: </td>
                            <td><input name="lastname" type="text" required></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><input name="email" type="email" required></td>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td><input name="username" type="text" required></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input name="password" type="password" required></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Register" />
                                <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />                    
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
include ('includes/footer.php');
