<?php

require_once ('includes/navbar.php');
require_once('includes/database.php');

//define the select statement
$sql = "SELECT * FROM reviews";

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
<h2 class="jumbotron">Reviews</h2>
<table align="center">
    <tr>
        <th width="200px">Title</th>
        <th width="150px">Date Posted</th>
    </tr>

    <?php
    //insert a row into the table for each row of data
while (($row = $query->fetch_assoc()) !== NULL) {
    echo "<tr>";
    echo "<td><a href=reviewdetails.php?id=", $row['review_num'], ">", $row['title'], "</td>";
    echo "<td>", $row['date_posted'], "</td>";
    echo "</tr>";
}
?>
</table>

<?php

//finish the query
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');