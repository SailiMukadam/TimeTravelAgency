<?php
require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve ticket num
if (!filter_has_var(INPUT_GET, 'id')) {
echo "Error: Location cannot be found. Please search for locations that exist in time-space continuum.";
require_once ('includes/footer.php');
exit();
}

$ticket_num = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM tickets WHERE ticket_num=" . $ticket_num;

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
<form name="ticketedit" action="ticketupdate.php" method="post">
    <table>
        <tr>
            <th>Ticket Number</th>
            <td><input type="number" name="ticket_num" value="<?php echo $row['ticket_num'] ?>" size="30" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Destination</th>
            <td><input type=text name="destination" value="<?php echo $row['destination'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Time Period</th>
            <td><input type=date name="time_period" value="<?php echo $row['time_period'] ?>" size="30" required /></td>
        </tr> 
        <tr>
            <th>Cost</th>
            <td><input type="number" min="0" step="0.01" name="cost" value="<?php echo $row['cost'] ?>" size="30" required /></td>
        </tr>
                <tr>
            <th>Description</th>
            <td><textarea rows="4" cols="50" name="description" value="<?php echo $row['description'] ?>" /></textarea></td>
        </tr>
            <th>View</th>
            <td>
                
                <input name="image" type="url" size='50' />

            </td>
    </table>
    <br>
    <input type="submit" value="Update">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href='ticketdetails.php?id=<?php echo $row['ticket_num'] ?>'" value="Cancel">
</form>       


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');