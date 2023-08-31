<?php
session_start();
if(!isset($_SESSION['login_status']))
{
    echo "Unauthorized attempt!";
    die;
}
if($_SESSION['login_status']==false)
{
    echo "Illegal Attempt";
    die;
}
include "menu.html";

$pid=$_GET['pid'];
$_SESSION['pid']=$pid;
include_once "../../shared/connection.php";
$sql_cursor=mysqli_query($conn,"select * from product where pid=$pid");
$row=mysqli_fetch_assoc($sql_cursor);
if($row>0){
$name=$row['name'];
$detail=$row['detail'];
$price=$row['price'];
$impath=$row['impath'];
$_SESSION['old']=$impath;
}

?>


<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form enctype="multipart/form-data" action="edit_db.php" class="bg-secondary p-4" method="POST">

            <div class="text-center">
                <h3 class="text-warning">Edit Product</h3>
            </div>

            <input required class="form-control mt-3" type="text" value="<?PHP echo $name; ?>" placeholder="Product Name" name="name">

            <input required min="1" class="form-control  mt-3" type="number" value="<?PHP echo $price; ?>" placeholder="Product Price" name="price">

            <textarea required class="form-control  mt-3" name="detail" cols="30" rows="5"><?php echo htmlspecialchars($detail); ?></textarea>

            <input class="form-control  mt-3" type="file" name="imfile">

            <div class="text-center">
            <button class="mt-3 btn btn-warning">Edit</button>
            </div>

        </form>

    </div>
</body>
</html>