<?php
session_start();
if(!isset($_SESSION['login_status']) || $_SESSION['login_status']==false)
{
    echo "Unauthorized attempt!";
    include "menu.html";
    die;
}
else
{
    include "menu2.html";
}
$orderid = $_GET['orderid'];
echo "Inserted order_id: " . $orderid;
include "../shared/connection.php";
$sql_cursor = mysqli_query($conn, "SELECT * FROM orders WHERE orderid='$orderid'");
$row = mysqli_fetch_assoc($sql_cursor);
$sellerresp = $row['sellerresp'];

// Close the database connection
mysqli_close($conn);

// Create the response array

// Return the data as JSON response
echo "                           <div class='d-flex align-items-center'>
                                
<button class='btn btn-danger' onclick='show($sellerresp)'>                
     Check the Status of you're order.
     <script>
    function show(m) {
        if (m == -1) {
            document.getElementById('dynamic').innerHTML = 'Order declined';
        } 
        else if (m == 1) {
            document.getElementById('dynamic').innerHTML = 'Order Accepted';
        } else if (m == 0 || m==NULL) {
            document.getElementById('dynamic').innerHTML = 'Order Pending';
        } else {
                console.error('Invalid response value');
        }
    }
</script>
</button>
<div class = 'd-flex height:100px mt-5 jumbotron'>
<h1 id='dynamic' class='display-4 bi-justify-right'></h1>
</div>

</div>";
?>
