<?php


$page_title = "Shopping Cart";
require_once ('includes/navbar.php');

//define parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "bookstore_db";

//Connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);

//handle connection errors
if ($conn->connect_errno != 0) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die ("Connection failed with: ($errno) $errmsg.");
}
?>
<div class="jumbotron">
    <h2>My Shopping Cart</h2>
</div>
<?php
 print_r($_SESSION['cart']);
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
   
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
<table class="booklist">
    <tr>
        <th style="width: 500px">Title</th>
        <th style="width: 60px">Price</th>
        <th style="width: 60px">Quantity</th>
        <th style="width: 60px">Total</th>
    </tr>
    <?php
    //insert code to display the shopping cart content
        // select statement
        $sql = "SELECT user_id, destination, cost FROM tickets WHERE id=$id";

        // foreach(array_keys($cart) as $id) {
        //     $sql .= " id=$id";
        // }

        // execute query
        $query = $conn->query($sql);

        // fetch books and display in table
        while($row = $query->fetch_assoc()) {
            $id = $row['user_id'];
            $title = $row['destination'];
            $price = $row['cost'];
            $qty = $cart[$id];
            $total = $qty * $price;
            echo "<tr>", 
                    "<td><a href='bookdetails.php?id=$id'>$title</a></td>",
                    "<td>$$price</td>",
                    "<td>$qty</td>",
                    "<td>$$total</td>",
                    "</tr>";
        }
    ?>
</table>
<br>
<div class="bookstore-button">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'listbooks.php'" />
</div>
<br><br>

<?php
include ('includes/footer.php');
