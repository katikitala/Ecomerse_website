<?php
session_start();

include "menu.html";

if (!isset($_SESSION['login_status']) || $_SESSION['login_status'] == false) {
    echo "
    <!DOCTYPE html>
<html lang='en'>
<head>
    <style>
        body {
            background-color: rgb(217, 230, 242); /* Soft blue color for the whole page */
        }

        .cl {
            background-color: rgb(156, 186, 216); /* Medium blue color for the outer box */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .button-container {
            width: 400px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px solid black;
            border-radius: 10px;
            background-color: rgb(197, 211, 224); /* Light blue color for the container */
            margin-bottom: 1rem;
        }

        .btn-success,
        .btn-info {
            width: 200px;
        }

        .btn-success {
            background-color: rgb(45, 121, 181); /* Deep blue color for the success button */
            border-color: rgb(28, 94, 142);
        }

        .btn-info {
            background-color: rgb(76, 154, 214); /* Bright blue color for the info button */
            border-color: rgb(42, 112, 155);
        }
    </style>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
</head>
<body>
        <div class='cl'>
        <div class='button-container'>
            <a href='login.html'>
                <button class='p-3 btn btn-success'>Login</button>
            </a>
            <a href='register.html'>
                <button class='p-3 btn mt-3 btn-info'>Register</button>
            </a>
        </div>
    </div>
</body>
</html>
";
} else {
    echo '<script>window.location.href = "placeorder.php";</script>';
    exit();
}

if (!isset($_SESSION['cart'])) {
    echo "No items in CART";
    die;
}
?>
