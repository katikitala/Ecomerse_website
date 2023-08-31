<?php
session_start();
if(!isset($_SESSION['login_status']) || $_SESSION['login_status']==false)
{
    include "menu.html";
}
else{
include "menu2.html";
}
$conn=new mysqli("localhost","id20794489_patanjali","Jkjkjk@123","id20794489_acme23_feb");
if($conn->connect_error)
{
    echo "Connection Failed";
    die;
}

$sql_cursor = mysqli_query($conn, "SELECT * FROM product");

if ($sql_cursor === false) {
    echo "Error: " . mysqli_error($conn);
    die;
}

$row = mysqli_fetch_assoc($sql_cursor);

while($row=mysqli_fetch_assoc($sql_cursor))
{
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $detail=$row['detail'];
    $impath=$row['impath'];

    echo "<div class='mycard'>

        <div class='name'>$name</div>
        <div class='price'>$price Rs</div>
        <div class='pdt-img-wrapper'>
            <img class='pdt-img' src='../$impath'>
        </div>
        <div class='detail'>
            $detail
        </div>

        <div class='action d-flex justify-content-around'>
           
            <div>
                <a href = 'addcart.php?pid=$pid'>
                    <button class='btn btn-danger'>                
                    <i class='bi-cart'></i>
                    </button>
                </a>
            </div>
        </div>
    
    </div>";
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .mycard {
        width: 250px;
        height: fit-content;
        background-color: rgb(139, 48, 127);
        margin: 10px;
        padding: 5px;
        display: inline-block;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        text-align: center;
    }
    
    .pdt-img-wrapper {
        width: 100%;
        height: 70%;
    }
    
    .pdt-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 4px;
    }
    
    .name {
        font-weight: bold;
        font-size: 24px;
        margin-top: 10px;
    }
    
    .price {
        color: white;
        font-weight: bold;
        margin-top: 5px;
    }
</style>

</head>
<body>
    

<script>
    function confirmDelete(pid)
    {
        ans=confirm("Are you sure want to Delete?")
        if(ans)
        {
            window.location=`delete.php?pid=${pid}`;
        }        
    }
</script>
</body>
</html>