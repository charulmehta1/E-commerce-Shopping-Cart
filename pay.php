<?php
require("includes/common.php");
require('./instamojo.php');
const API_KEY ="test_c6606af527c6d93326bf1f10009";
const AUTH_TOKEN = "test_c54d97db320dd61cc49fcc45f50";


if(isset($_POST['purpose']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['amount']))
{
    $api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN,'https://test.instamojo.com/api/1.1/');
    
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $_POST['purpose'],
            "buyer_name" => $_POST['name'],
            "amount" => $_POST['amount'],
            "send_email" => true,
            "email" => $_POST['email'],
            "redirect_url" => "http://localhost/shopping/success.php"
            ));
            $payment_id = $response['id'];
            $item_id = $_POST['item_id'];
            $user_id =  $_POST['user_id'];
            $amount = $_POST['amount'];
            $status="pending";
            $query = "INSERT INTO paymentdetails(payment_id, item_id,Amount,payment_status,user_id) VALUES('$payment_id','$item_id','$amount','$status', '$user_id')";
            if(mysqli_query($con, $query)){
        
            }else{
                var_dump(mysqli_error($con));
            die(mysqli_error($con));
            }      // print_r($response); 

     header('Location:'. $response['longurl']);
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
}
?>