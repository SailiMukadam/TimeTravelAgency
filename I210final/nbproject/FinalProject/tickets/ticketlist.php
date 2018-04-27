<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//define the select statement
$sql = "SELECT * FROM tickets";

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}
//display results in a table
?>
<h2 class="jumbotron">Destinations</h2>
<table align="center">
    <tr>
        <th width="200px">Destination</th>
        <th width="200px">Time Period</th>
        <th width="200px">Cost</th>
    </tr>

    <?php
    //insert a row into the table for each row of data
while (($row = $query->fetch_assoc()) !== NULL) {
    echo "<tr>";
    echo "<td><a href=ticketdetails.php?id=", $row['ticket_num'], ">", $row['destination'], "</td>";
    echo "<td>", $row['time_period'], "</td>";
    echo "<td>$", $row['cost'], "</td>";
    echo "</tr>";
}
?>
</table>
<form name="ticketcreate">
    <input type=button onclick="window.location.href='ticketcreate.php'" value="Contribute">
    &nbsp;&nbsp;
    <input type="button" onclick="window.location.href='index.php'" value="Cancel">
</form>

<?php

//finish the query
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');