<?php
session_start();
if (!isset($_SESSION['login_status']) ||$_SESSION['login_status'] == false) {
    echo "Unauthorized attempt!";
    include "menu.html";
    die;
}
else{
    include "menu2.html";
}
include "../shared/connection.php";
$userid = $_SESSION['userid'];
$sql_cursor = mysqli_query($conn, "SELECT * FROM orders WHERE userid='$userid'");

while ($row = mysqli_fetch_assoc($sql_cursor)) {
    // Access and display the data for each row
    $pid = $row['pid'];
    $pqty = $row['pqyt'];
    $sellerid = $row['sellerid'];
    $orderid = $row['orderid'];
    $sql_cursor2 = mysqli_query($conn, "SELECT * FROM product WHERE pid='$pid'");
    $row2 = mysqli_fetch_assoc($sql_cursor2);
    $name=$row2['name'];
    $price=$row2['price'];
    $detail=$row2['detail'];
    $impath=$row2['impath'];
    //print_r($row2);

    echo "<div class='mycard'>

                        <div class='name'>$name</div>
                        <div class='price'>$price Rs</div>
                        <div class='pdt-img-wrapper'>
                            <img class='pdt-img' src='../$impath'>
                        </div>
                        <div class='detail'>
                            $detail
                        </div>

                        <div class='d-flex justify-content'>
                        
                            <div>
                                
                                 <button class='btn btn-danger p-2'>                
                                      Qty=$pqty
                                      oid = $orderid
                                 </button>
                                 <button class='btn btn-danger p-2' onclick='show(\"$orderid\")'>
                                 check
                                 </button>
                                 <button onclick='confirmDelete(\"$orderid\")' class='btn btn-danger p-2'><i class='bi-trash'></i></button>
                                
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
    function show(m) {
        window.location.href = 'fetchdata.php?orderid=' + m;
    }
    function confirmDelete(orderid)
    {
        ans=confirm("Are you sure want to Delete??")
        if(ans)
        {
            window.location=`deleteorder.php?orderid=${orderid}`;
        }        
    }
</script>

</body>
</html>