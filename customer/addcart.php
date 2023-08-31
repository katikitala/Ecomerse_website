<?php
session_start();
if(!isset($_SESSION['login_status']) || $_SESSION['login_status']==false)
{
    include "menu.html";
}
else
{
    include "menu2.html";
}
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
        $localcart[$ind]['pqty'] = $localcart[$ind]['pqty']+1;
    }
    else{
        array_push($localcart,['pid'=>$pid,'pqty'=>1]);
    }
}
else
{
    $localcart=[['pid'=>$pid,'pqty'=>1]];
}

$_SESSION['cart']=$localcart;
echo '<script>window.location.href = "index.php";</script>';

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
