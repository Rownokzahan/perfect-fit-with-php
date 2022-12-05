<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){        
        $order_id= $_POST['order-id'];
        $total_price= $_POST['total-price'];
        $name= $_POST['name'];
        $phone= $_POST['phone'];
        $address= $_POST['address'];
        $payment= $_POST['payment'];
        $transaction_id= $_POST['trx-id'];

        if(!empty($order_id) && !empty($total_price) && !empty($name) && !empty($phone) && !empty($address) && !empty($payment) && !empty($transaction_id)){
            $sql = "insert into `orders` (`order_id`, `total_price`, `customer_name`, `phone`, `delivery_address`, `payment_method`, `transaction_id`) values ('$order_id', '$total_price', '$name', '$phone', '$address', '$payment', '$transaction_id')";
            $result =mysqli_query($con,$sql);
            if(!$result){
                die(mysqli_error($result));
            }else{
                echo json_encode("Your Order Has Placed Successfully! You Will Get A Confermation Message From Us With In 24 Hours");
            }  
        }
    }
?>