<?php
session_start();
//session_destroy();

if(!isset($_GET['pid']))
{
    echo "pid is not passed!";
    die;
}
if($_GET['pid']==false)
{
    echo "Illegal Attempt";
    die;
}

$pid = $_GET['pid'];

if (isset($_SESSION['cart']))
{
    $localcart = $_SESSION['cart'];
    $res_ind= ispidavailable($localcart,$pid);
    $res= $res_ind[0];
    $ind= $res_ind[1];

    if($res)
    {
        $localcart[$ind]['pqty'] = $localcart[$ind]['pqty']-1;
    }
    else{
        echo"error";
    }
}
else
{
    echo"error";
}

$_SESSION['cart']=$localcart;
//print_r($localcart);
    echo "<script>window.location.href = 'viewcart.php';</script>";

function ispidavailable($lc,$pid){
    for($i = 0; $i< count($lc);$i++)
    {
        if ($lc[$i]['pid']== $pid) 
        {
            return array(true,$i);
        }
    }
    return array(false,false);
}
?>