<?php
session_start();

$_SESSION['login_status']=false;

$uname=$_POST['uname'];
$upass=$_POST['upass'];

$hash_upass=md5($upass);

$conn=new mysqli("localhost","id20794489_patanjali","Jkjkjk@123","id20794489_acme23_feb");

$sql_cursor=mysqli_query($conn,"select * from seller where username='$uname' and password='$hash_upass'");

$total_rows=mysqli_num_rows($sql_cursor);
if($total_rows>0)
{
    $row=mysqli_fetch_assoc($sql_cursor);

    $_SESSION['login_status']=true;
    $_SESSION['sellerid']=$row['sellerid'];
    $_SESSION['username']=$row['username'];

    echo "<h1>Login Success</h1>";
    echo '<script>window.location.href = "product/upload.php";</script>';
}
else
{
    echo "Invalid Credentials";
}

?>