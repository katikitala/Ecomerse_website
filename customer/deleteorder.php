<?php
session_start();
if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == false) {
    include "menu.html";
} else {
    include "menu2.html";
}
if (!isset($_SESSION['cart'])) {
    echo "No item in CART";
    die;
}
if ($_GET['orderid'] == false) {
    echo "Illegal Attempt";
    die;
}
$orderid = $_GET['orderid'];

include "../shared/connection.php";
$userid = $_SESSION['userid'];
$status = mysqli_query($conn, "DELETE FROM orders WHERE orderid='$orderid'");
if ($status) {
    echo "Product Deleted Successfully!";
} else {
    echo "<br>Error in Product Deletion<br>";
    echo mysqli_error($conn);
}
echo '<script>window.location.href = "vieworders.php?";</script>';
?>
