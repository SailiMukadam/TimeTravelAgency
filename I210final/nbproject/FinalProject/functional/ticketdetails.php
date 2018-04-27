<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//retrieve ticket num from the database using POST
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: Unable to locate ticket. The location you are searching for is outside time-space continuum.";
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

<h2 class="jumbotron">Ticket Details</h2>
<div>

    <table float-text='right'>
        <tr height="50px">
        <th>Ticket#:</th>
        <td><?php echo $row['ticket_num'] ?></td>
    </tr>
        <tr>
        <th>Destination:</th>
        <td><?php echo $row['destination'] ?> </td>
    </tr>    
    <tr height="50px">
        <th>Time Period:</th>
        <td><?php echo $row['time_period'] ?> </td>
    </tr>    
    <tr height="50px">
        <th>Cost:</th>
        <td> $<?php echo $row['cost'] ?></td>
    </tr>
        <tr height="50px">
        <th>Description:</th>
        <td> <?php echo $row['description'] ?></td>
    </tr>
</table>
    <p float='right'>
               <img src = "<?php echo $row['image']?>" />
    </p>
   
<br/>
<p>
<form action="ticketdelete.php" onsubmit="return confirm('Warning! You are about to erase history by deleting this destination.')">
    <input type="button" onclick="window.location.href = 'ticketedit.php?id=<?php echo $row['ticket_num'] ?>'" value="Edit">&nbsp;&nbsp;
    <input type="submit" value="Delete">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href = 'ticketlist.php'" value="Cancel">
    <input type="hidden" name="id" value="<?php echo $row['ticket_num'] ?>">
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