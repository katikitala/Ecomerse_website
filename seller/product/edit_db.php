<?php

session_start();
if(!isset($_SESSION['sellerid']))
{
    echo "Unauthorized attempt!";
    die;
}
$pid=$_SESSION['pid'];
$name=$_POST['name'];
$price=$_POST['price'];
$detail=$_POST['detail'];
$file = $_FILES['imfile']['name'];
include_once "../../shared/connection.php";


if($file ==""){
    
    $status=mysqli_query($conn,"UPDATE product SET name = '$name', price= '$price', detail = '$detail' WHERE pid = '$pid';");
    echo "<script>window.location.href = 'view.php';</script>";

}
else{
    $dest="../../shared/images/".$_FILES['imfile']['name'];
    move_uploaded_file($_FILES['imfile']['tmp_name'],$dest);
    $impath="shared/images/".$_FILES['imfile']['name'];
    $status=mysqli_query($conn,"UPDATE product SET name = '$name', price= '$price', detail = '$detail' ,impath = '$impath' WHERE pid = '$pid';");
    echo "<script>window.location.href = 'view.php';</script>";
}
if($status)
{
    echo "Product Edited Successfully!";
}
else
{
    echo "<br>Error is Product Upload<br>";
    echo mysqli_error($conn);
}





?>