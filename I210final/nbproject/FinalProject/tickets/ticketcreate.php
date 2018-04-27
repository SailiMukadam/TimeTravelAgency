<?php
require_once 'includes/navbar.php';
require_once 'includes/database.php';
?>

<h2 class="jumbotron">Create Your Ticket</h2>
<form name="ticketcreate" action="ticketadd.php" method="post">
    <table>
        <tr>
            <th>Destination</th>
            <td><input type=text name="destination" size="30" required /></td>
        </tr>
        <tr>
            <th>Time Period</th>
            <td><input type=date name="time_period" required /></td>
        </tr> 
        <tr>
            <th>Cost</th>
            <td><input type="number" min="0" step="0.01" name="cost" vsize="30" required /></td>
        </tr>
                <tr>
            <th>Description</th>
            <td><textarea rows="4" cols="50" name="description" /></textarea></td>
        </tr>
            <th>View</th>
            <td>
                
                <input name="image" type="url" size='50' />

            </td>
    </table>
    <input type="submit" value="Submit ticket">&nbsp;&nbsp;
    <input type="button" onclick="window.location.href='ticketdetails.php'" value="Cancel">


<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');