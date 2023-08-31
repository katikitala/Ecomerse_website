<?php
session_start();
/*
create an order table

show the form for getting customer info

get the sessions from pid cart
insert the pids and customer into the order table
*/
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == false) {
    echo "Unauthorized attempt!";
    include "menu.html";
    die;
} else {
    include "menu2.html";
}

$conn = mysqli_connect("localhost", "id20794489_patanjali", "Jkjkjk@123", "id20794489_acme23_feb");

if (!$conn) {
    echo "Connection Failed: " . mysqli_connect_error();
    die;
}
if (!isset($_SESSION['cart'])) {
    echo "No item in CART";
    die;
}
if (count($_SESSION['cart']) <= 0) {
    echo "No item in CART";
    die;
}

$True = true;
$False = false;

$localcart = $_SESSION['cart'];
    $item = $localcart[0];
    $p = $item['pid'];
    $qty = $item['pqty'];
    $userid = $_SESSION['userid'];
    $sql_cursor = mysqli_query($conn, "SELECT * FROM product WHERE pid='$p'");
    $row = mysqli_fetch_assoc($sql_cursor);
    $sellerid = $row['sellerid'];

    $sql_status = mysqli_query($conn, "INSERT INTO orders (pid, userid, sellerid) VALUES ('$p', '$userid', '$sellerid')");
    
    if ($sql_status) {
        $orderid = mysqli_insert_id($conn);
        echo "Inserted order_id: " . $orderid;
    } else {
        // Handle the case where the INSERT query fails
        echo "Failed to insert into orders table: " . mysqli_error($conn);
    }
    
    $sql_status = mysqli_query($conn, "UPDATE orders SET pqyt = '$qty', userresp = '$True' WHERE orderid = '$orderid'");
    echo '<script>window.location.href = "delete.php?pid=' . $p . '";</script>';
?>