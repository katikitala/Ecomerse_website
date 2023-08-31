<?php
session_start();
if (!isset($_SESSION['login_status'])) {
    echo "Unauthorized attempt!";
    die;
}
if ($_SESSION['login_status'] == false) {
    echo "Illegal Attempt";
    die;
}
$orderid = $_GET['orderid'];
$sellerresp = $_GET['choice'];
print($orderid);
print($sellerresp);
include "menu.html";
include "../../shared/connection.php";
$sql_cursor = mysqli_query($conn, "UPDATE orders SET sellerresp = '$sellerresp' WHERE orderid = '$orderid'");
mysqli_close($conn);
echo "<script>window.location.href = 'vieworders.php';</script>";

?>

