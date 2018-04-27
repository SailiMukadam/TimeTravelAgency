<?php
require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve review num
if (!filter_has_var(INPUT_GET, 'id')) {
echo "Please search for reviews that already exist.";
require_once ('includes/footer.php');
exit();
}

$review_num = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM reviews WHERE review_num=" . $review_num;

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

<h2 class="jumbotron">Update Your Review</h2>
<form name="reviewedit" action="reviewupdate.php" method="post">
    <table>
        <tr>
            <th>Review Number</th>
            <td><input type="number" name="review_num" value="<?php echo $row['review_num'] ?>" size="30" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Title</th>
            <td><input type=text name="title" value="<?php echo $row['title'] ?>" size="30" required /></td>
        </tr>
         <tr>
            <th>Date Posted</th>
            <td><input type=date name="date_posted" value="<?php echo $row['date_posted'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Message</th>
            <td><textarea rows="4" cols="50" name="message" value="<?php echo $row['message'] ?>" /></textarea></td>
        </tr> 
    </table>
    <br>
    <input type="submit" value="Update">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href='reviewdetails.php?id=<?php echo $row['review_num'] ?>'" value="Cancel">
</form>       


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');