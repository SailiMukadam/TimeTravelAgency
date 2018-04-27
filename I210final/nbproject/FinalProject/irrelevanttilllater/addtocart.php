<?php 

    if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    } else {
        $cart = array();
    }

    // if item id cannot be found, terminate script
    if(!filter_has_var(INPUT_GET, 'id')) {
        $error = "Item id not found. Operation cannot proceed.<br><br>";
        header("Location: error.php?m=$error");
        die();
    }

    // retrieve book id and make sure it is a numeric value
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if(!is_numeric($id)) {
        $error = "Invalid item id. Operation cannot proceed.<br><br>";
        header("Location: error.php?m=$error");
        die();
    }

    if (array_key_exists($id, $cart)) {
        $cart[$id] = $cart[$id] + 1;
    } else {
        $cart[$id] = 1;
    }

    //update session variable
    $_SESSION['cart'] = $cart;

    // redirect to showcart.php page
    header('Location: showcart.php');
?>

<html>
    <head>
    </head>
    <body>
    </body>
</html>