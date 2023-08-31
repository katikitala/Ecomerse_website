<?php

$uname=$_POST['uname'];
$upass=$_POST['upass1'];

$hash_pass=md5($upass);

$conn = mysqli_connect("localhost", "id20794489_patanjali", "Jkjkjk@123", "id20794489_acme23_feb");

if (!$conn) {
    echo "Connection Failed: " . mysqli_connect_error();
    die;
}

$sql_status=mysqli_query($conn,"insert into seller(username,password) values('$uname','$hash_pass')");
if($sql_status)
{
    echo "Registration Successfull Please Login";
    
}
else{
    echo "Something Went Wrong: ";
    echo mysqli_error($conn);
}

?>