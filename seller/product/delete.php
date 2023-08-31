<?php

$pid=$_GET['pid'];

include_once "../../shared/connection.php";

$status=mysqli_query($conn,"delete from product where pid=$pid");

if($status)
{
    echo "Product deleted Successfully";
    echo "<script>window.location.href = 'view.php';</script>";

}
else
{
    echo "Error while deleting the product";
    echo mysqli_error($conn);
}


?>