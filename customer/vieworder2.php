<?php
session_start();
include "menu.html";
if(!isset($_SESSION['login_status']) || $_SESSION['login_status']==false)
{
echo "<div class='login-container'>
<a href='login.html'>
    <button class='login-button success'>Login</button>
</a>
<a href='register.html'>
    <button class='login-button warning'>Register</button>
</a>
</div>";
}
else{
    echo '<script>window.location.href = "vieworders.php";</script>';
}
if(!isset($_SESSION['cart'])){
    echo "N0 item in CART";
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        
        .login-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4rem;
        }
        
        .login-container a {
            text-decoration: none;
        }
        
        .login-button {
            padding: 1rem 3rem;
            font-size: 1.25rem;
        }
        
        .login-button.success {
            background-color: #5cb85c;
            color: #fff;
            border-color: #5cb85c;
        }
        
        .login-button.success:hover {
            background-color: #449d44;
            border-color: #449d44;
        }
        
        .login-button.warning {
            background-color: #f0ad4e;
            color: #fff;
            border-color: #f0ad4e;
        }
        
        .login-button.warning:hover {
            background-color: #ec971f;
            border-color: #ec971f;
        }
    </style>
</head>
<body>
</body>
</html>