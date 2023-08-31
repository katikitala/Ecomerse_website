<?php
session_start();
include "menu.html";
if(!isset($_SESSION['cart'])){
    echo "N0 item in CART";
    die;
}
if($_GET['pid']==false)
{
    echo "Illegal Attempt";
    die;
}
$pid=$_GET['pid'];

$localcart = $_SESSION['cart'];
$res_ind= ispidavailable($localcart,$pid);
$res= $res_ind[0];
$ind= $res_ind[1];
if($res)
{
    array_splice($localcart,$ind,1);
}
else{
    echo"no such pid";
}
$_SESSION['cart'] =$localcart;
echo '<script>window.location.href = "viewcart.php";</script>';
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