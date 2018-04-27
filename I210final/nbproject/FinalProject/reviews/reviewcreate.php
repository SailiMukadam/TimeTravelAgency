<?php
require_once 'includes/navbar.php';
require_once 'includes/database.php';
?>

<h2 class="jumbotron">Create Your Review</h2>
<form name="reviewcreate" action="reviewadd.php" method="post">
    <table>
        <tr>
            <th>Title:</th>
            <td><input type=text name="title" size="30" required /></td>
        </tr>
        <tr>
            <th>Message:</th>
            <td><textarea rows="4" cols="50" name="message" required/></textarea></td>
        </tr> 
    </table>
    <br>
    <input type="submit" value="Submit Review">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href='reviewdetails.php'" value="Cancel">
</form>       


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');