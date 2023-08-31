<?php
session_start();
include "menu.html";
if(!$_SESSION["sellerid"]){
    echo "unauthorised attempt";
    die;
}
$sellerid=$_SESSION["sellerid"];
include_once "../../shared/connection.php";

$sql_cursor=mysqli_query($conn,"select * from product where sellerid=$sellerid");

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
            <img class='pdt-img' src='../../$impath'>
        </div>
        <div class='detail'>
            $detail
        </div>

        <div class='action d-flex justify-content-around'>
            <div>
                <button onclick='confirmEdit($pid)' class='btn btn-warning'>

                <i class='bi-pencil'></i>

                </button>
            </div>
            <div>
                
                    <button onclick='confirmDelete($pid)' class='btn btn-danger'>                
                    <i class='bi-trash'></i>
                    </button>
                
            </div>
        </div>
    
    </div>";
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .mycard
        {
            width:250px;
            height:fit-content;
            background-color:bisque;
            margin:10px;
            padding:5px;
            display:inline-block;
        }
        .pdt-img-wrapper
        {
            width:100%;
            height:70%;
        }
        .pdt-img
        {
            width:100%;
            height:100%;
        }
        .name
        {
            font-weight:bold;
            font-size:24px;
        }
        .price
        {
            color:brown;
            font-weight:bold;
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

    function confirmEdit(pid)
    {
        ans=confirm("Are you sure want to Edit?")
        if(ans)
        {
            window.location=`edit.php?pid=${pid}`;
        }        
    }
</script>
</body>
</html>
