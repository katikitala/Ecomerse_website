<?php
session_start();
if(!isset($_SESSION['login_status']))
{
    echo "Unauthorized attempt!";
    die;
}
$sellerid=$_SESSION['sellerid'];

$dest="../../shared/images/".$_FILES['imfile']['name'];

move_uploaded_file($_FILES['imfile']['tmp_name'],$dest);

include_once "../../shared/connection.php";

$name=$_POST['name'];
$price=$_POST['price'];
$detail=$_POST['detail'];

$impath="shared/images/".$_FILES['imfile']['name'];

$query="insert into product(name,price,detail,impath,sellerid) values('$name',$price,'$detail','$impath',$sellerid)";
echo $query;
$status=mysqli_query($conn,$query);
if($status)
{
    echo "Product Uploaded Successfully!";
        echo "<script>window.location.href = 'upload.php';</script>";
}
else
{
    echo "<br>Error is Product Upload<br>";
    echo mysqli_error($conn);
}
?>