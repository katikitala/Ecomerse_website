<?php
session_start();

if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == false) {
    include "menu.html";
} else {
    include "menu2.html";
}

if (!isset($_SESSION['cart'])) {
    echo "No items in the cart";
    die;
}

echo "
<div class='text-center'>
    <a href='order.php'>
        <button class='btn btn-success px-5'>Place Order</button>
    </a>
    <a href='vieworder2.php'>
        <button class='btn btn-success px-5'>View Orders</button>
    </a>
</div>
";

$localcart = $_SESSION['cart'];
$pids = [];
for ($i = 0; $i < count($localcart); $i++) {
    array_push($pids, $localcart[$i]['pid']);
}

include "../shared/connection.php";
if (count($pids) > 0) {
    $str_pids = implode(",", $pids);
    $query = "SELECT * FROM product WHERE pid IN ($str_pids)";
    $sql_cursor = mysqli_query($conn, $query);
} else {
    echo "Empty cart";
    die;
}

while ($row = mysqli_fetch_assoc($sql_cursor)) {
    $pid = $row['pid'];
    $name = $row['name'];
    $price = $row['price'];
    $detail = $row['detail'];
    $impath = $row['impath'];
    $qty = getQty($localcart, $pid);

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
                <a href='reduceqty.php?pid=$pid'>
                    <button class='btn btn-danger'>-</button>
                </a>
                <a href='addcart.php?pid=$pid'>
                    <button class='btn btn-danger'>Qty=$qty</button>
                </a>
                <a href='increaseqty.php?pid=$pid'>
                    <button class='btn btn-danger'>+</button>
                </a>
            </div>
            <div>
                <button onclick='confirmDelete($pid)' class='btn btn-danger'>
                    <i class='bi-trash'></i>
                </button>
            </div>
        </div>
    </div>";
}

function getQty($lc, $pid)
{
    for ($i = 0; $i < count($lc); $i++) {
        if ($lc[$i]['pid'] == $pid) {
            return $lc[$i]['pqty'];
        }
    }
    return array(false, false);
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
            background-color:rgb(104, 130, 187);
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
            color:white;
            font-weight:bold;
        }
    </style>
</head>
<body>
    

<script>
    function confirmDelete(pid)
    {
        ans=confirm("Are you sure want to Delete??")
        if(ans)
        {
            window.location=`delete.php?pid=${pid}`;
        }        
    }
</script>
</body>
</html>
