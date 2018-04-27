<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//define the select statement
$sql = "SELECT * FROM users";

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
<h2 class="jumbotron">Users</h2>
<table align="center">
    <tr>
        <th width="100px">User ID</th>
        <th width="100px">Firstname</th>
        <th width="100px">Lastname</th>
        <th width="200px">Email</th>
        <th width="150px">Username</th>
        <!--consider adding a reviews tab later.-->
    </tr>

    <?php
    //insert a row into the table for each row of data
while (($row = $query->fetch_assoc()) !== NULL) {
    echo "<tr>";
    echo "<td>", $row['user_id'], "</td>";
    echo "<td>", $row['firstname'], "</td>";
    echo "<td>", $row['lastname'], "</td>";
    echo "<td>", $row['email'], "</td>";
    echo "<td><a href=userdetails.php?id=", $row['user_id'], ">", $row['username'], "</td>";
    echo "</tr>";
}
?>
</table>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');