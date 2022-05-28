<style>
.qwer { 
            padding-top: 100px;
            padding-bottom: 20.5%; 
        }
		
</style>
<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];

//$item_ids_string = $_GET['itemsid'];

//We will change the status of the items purchased by the user to 'Confirmed'
 $customerQuery = "SELECT * from paymentdetails WHERE user_id=".$user_id." AND payment_id='".$_GET['payment_request_id']."'";
$customer = mysqli_query($con, $customerQuery)or die($mysqli_error($con));
$row1 = mysqli_fetch_array($customer);
if($_GET['payment_status']=="Credit"){
$query1 = "UPDATE paymentdetails SET payment_status='Confirmed' WHERE user_id=" . $user_id . " AND payment_id='".$_GET['payment_request_id']."'";
mysqli_query($con, $query1) or die($mysqli_error($con));
$query = "UPDATE users_items SET status='Confirmed' WHERE user_id=" . $user_id . " AND item_id IN (" . $row1['item_id'] . ") and status='Added to cart'";
mysqli_query($con, $query) or die($mysqli_error($con));
}else{
    $query1 = "UPDATE paymentdetails SET payment_status='Failed' WHERE user_id=" . $user_id . " AND payment_id='".$_GET['payment_request_id']."'";
mysqli_query($con, $query1) or die($mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid qwer" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                      <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php");
        ?>
    </body>
</html>