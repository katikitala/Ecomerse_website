<?php
include "menu.html";
if ($_GET['orderid'] == false) {
    echo "Illegal Attempt";
    die;
}
$orderid = $_GET['orderid'];

include "../../shared/connection.php";
$status = mysqli_query($conn, "DELETE FROM orders WHERE orderid='$orderid'");
if ($status) {
    echo "Product Deleted Successfully!";
} else {
    echo "<br>Error in Product Deletion<br>";
    echo mysqli_error($conn);
}
echo "<script>window.location.href = 'vieworders.php';</script>";

?>
