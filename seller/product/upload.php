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
?>



<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form enctype="multipart/form-data" action="upload_db.php" class="bg-secondary p-4" method="POST">

            <div class="text-center">
                <h3 class="text-warning">Upload Product</h3>
            </div>

            <input required class="form-control mt-3" type="text" placeholder="Product Name" name="name">

            <input required min="1" class="form-control  mt-3" type="number" placeholder="Product Price" name="price">

            <textarea required class="form-control  mt-3" name="detail"  cols="30" rows="5"></textarea>

            <input required class="form-control  mt-3" type="file" name="imfile">

            <div class="text-center">
            <button class="mt-3 btn btn-warning">Upload</button>
            </div>

        </form>

    </div>

</body>
</html>
