<?php
require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve user id
if (!filter_has_var(INPUT_GET, 'id')) {
echo "Error: User ID cannot be found. Please search for users who exist in time-space continuum.";
require_once ('includes/footer.php');
exit();
}

$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM users WHERE user_id=" . $user_id;

//execute the query
$query = $conn->query($sql);

//retrieve the results
$row = $query->fetch_assoc();


//Handle selection errors
if (!$query) {
$errno = $conn->errno;
$errmsg = $conn->error;
echo "Selection failed with: ($errno) $errmsg<br/>\n";
$conn->close();
//include the footer
require_once ('includes/footer.php');
exit;
}

//display results in a table
?>

<h2 class="jumbotron">Update Your Account</h2>
<form name="useredit" action="userupdate.php" method="post">
    <table class="userdetails">
        <tr>
            <th>User ID</th>
            <td><input name="user_id" value="<?php echo $row['user_id'] ?>" size="30" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Firstame</th>
            <td><input name="firstname" value="<?php echo $row['firstname'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Lastname</th>
            <td><input name="lastname" value="<?php echo $row['lastname'] ?>" size="30" required /></td>
        </tr> 
        <tr>
            <th>Email</th>
            <td><input type="email" name="email" value="<?php echo $row['email'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><input name="username" value="<?php echo $row['username'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input name="password" value="<?php echo $row['password'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Photo</th>
            <td>
                
                <input name="image" type="url" size='30'>

            </td>
    </table>
    <br>
    <input type="submit" value="Update">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href='userdetails.php?id=<?php echo $row['user_id'] ?>'" value="Cancel">
</form>       


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');