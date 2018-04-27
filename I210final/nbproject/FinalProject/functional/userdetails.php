<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve user id from the database using POST
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Temporal anomaly—the user ID you searched for does not exist.";
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

<h2 class="jumbotron">User Details</h2>
<div>

    <table float-text='right'>
        <tr height="50px">
        <th>User ID:</th>
        <td><?php echo $row['user_id'] ?></td>
    </tr>
        <tr>
        <th>Firstname:</th>
        <td><?php echo $row['firstname'] ?> </td>
    </tr>    
    <tr height="50px">
        <th>Lastname:</th>
        <td><?php echo $row['lastname'] ?> </td>
    </tr>    
    <tr height="50px">
        <th>Email:</th>
        <td> <?php echo $row['email'] ?></td>
    </tr>
    <tr height="50px">
        <th>Username:</th>
        <td><?php echo $row['username'] ?> </td>
    </tr>
    <tr height="50px">
        <th>Password:</th>
        <td><?php echo $row['password'] ?> </td>
    </tr>
</table>
    <p float='right'>
               <img src = "<?php echo $row['image']?>" />
    </p>
   
<br/>
<p>
<form action="userdelete.php" onsubmit="return confirm('Confirm this action if you wish to be deleted from history.')">
    <input type="button" onclick="window.location.href = 'useredit.php?id=<?php echo $row['user_id'] ?>'" value="Edit">&nbsp;&nbsp;
    <input type="submit" value="Delete">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'userlist.php'" value="Cancel">
    <input type="hidden" name="id" value="<?php echo $row['user_id'] ?>">
</form>
</p>
</div>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');