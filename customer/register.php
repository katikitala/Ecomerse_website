<?php
session_start();

include "menu.html";

$uname = $_POST['uname'];
$upass = $_POST['upass1'];
$phonenumber = $_POST['phonenumber'];
$adress1 = $_POST['adress1'];
$adress2 = $_POST['adress2'];
$pincode = $_POST['pincode'];
$address = $adress1 . ", " . $adress2 . ", " . $pincode;

$hash_pass = md5($upass);

$conn = mysqli_connect("localhost", "id20794489_patanjali", "Jkjkjk@123", "id20794489_acme23_feb");

if (!$conn) {
    echo "Connection Failed: " . mysqli_connect_error();
    die;
}

$sql_status = mysqli_query($conn, "INSERT INTO user (username, password, phonenumber, address) VALUES ('$uname', '$hash_pass', '$phonenumber', '$address')");

if ($sql_status === false) {
    echo "Error: " . mysqli_error($conn);
    die;
}
else {
    $_SESSION['registration_success'] = true;
    echo '<script>window.location.href = "placeorder.php";</script>';
    exit;
}
?>