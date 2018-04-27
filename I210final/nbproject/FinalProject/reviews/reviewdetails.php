<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve review num from the database using POST
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: Unable to locate review. The message you are searching for is outside time-space continuum.";
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

<h2 class="jumbotron">Review Details</h2>
<div>

    <table float-text='right'>
        <tr height="50px">
            <th>Review#:</th>
            <td><?php echo $row['review_num'] ?></td>
        </tr>
        <tr>
            <th>Title:</th>
            <td><?php echo $row['title'] ?> </td>
        </tr>    
        <tr height="50px">
            <th>Date Posted:</th>
            <td> <?php echo $row['date_posted'] ?></td>
        </tr>
        <tr height="50px">
            <th>Message:</th>
            <td><?php echo $row['message'] ?> </td>
        </tr>    


    </table>
   
<br/>
<p>
<form action="reviewdelete.php" onsubmit="return confirm('Warning! You are about to erase history by deleting this text.')">
    <input type="button" onclick="window.location.href = 'reviewedit.php?id=<?php echo $row['review_num'] ?>'" value="Edit">&nbsp;&nbsp;
    <input type="submit" value="Delete">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'reviewlist.php'" value="Cancel">
    <input type="hidden" name="id" value="<?php echo $row['review_num'] ?>">
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