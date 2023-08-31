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
include "../../shared/connection.php";
$sellerid = $_SESSION['sellerid'];
$sql_cursor = mysqli_query($conn, "SELECT * FROM orders WHERE sellerid='$sellerid'");
if ($sql_cursor === false) {
    echo "Error: " . mysqli_error($conn);
    die;
}
while ($row = mysqli_fetch_assoc($sql_cursor)) {
    if(!$row || count($row)==0){
        echo"No Orders";
    }
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
        <img class='pdt-img' src='../../$impath'>
    </div>
    <div class='detail'>
        $detail
    </div>
    <div class='action d-flex justify-content-around align-items-center'>
        <div>
            <div class='centered-div'>                
                Qty=$pqty<br>
                Order_ID = $orderid
            </div>
            <label for='selectChoice'>Select a Response:</label>
            <select id='selectChoice' name='selectChoice'>
                <option value=-1>Reject</option>
                <option value=0>Pending</option>
                <option value=1>Accept</option>
            </select>
            <button class='btn btn-danger' onclick='show($orderid, document.getElementById(\"selectChoice\").value)'>
                Done
            </button>
            <button onclick='confirmDelete(\"$orderid\")' class='btn btn-danger'>                
                                 <i class='bi-trash'></i>
            </button>
        </div>
    </div>
</div>";

}
?><!DOCTYPE html>
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
        .centered-div {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 200px;
            height: 100px;
            margin: 0 auto;
            background-color: bisque;
            border-radius: 10px;
            font-weight: bold;
            font-size: 18px;
            color: brown;
        }

    </style>
</head>
<body>
<script>
    function show(orderid, choice) {
        window.location.href = 'responsedata.php?orderid=' + orderid + '&choice=' + choice;
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