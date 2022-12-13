<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){    
        $customize_id = $_POST["customize_id"];        
            $sql = "select * from `order-details` where `id`= '$customize_id'";
            $result =mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
        $total_price= $row['total_price'];
        $order_id=$_POST['order_id'];
        $name= $_POST['name'];
        $phone= $_POST['phone'];
        $address= $_POST['address'];
        $payment= $_POST['payment'];
        $transaction_id= $_POST['trx-id'];

        if(!empty($order_id) && !empty($total_price) && !empty($name) && !empty($phone) && !empty($address) && !empty($payment) && !empty($transaction_id)){
            $sql = "insert into `orders` (`order_id`,`customize_id`, `total_price`, `payment_method`, `transaction_id`, `customer_name`, `phone`, `delivery_address`) values ('$order_id', '$customize_id', '$total_price', '$payment', '$transaction_id', '$name', '$phone', '$address')";
            $result =mysqli_query($con,$sql);
            if(!$result){
                die(mysqli_error($result));
            }else{
                echo json_encode("Your Order Has Placed Successfully! You Will Get A Confermation Message From Us With In 24 Hours");
            }  
        }
    }
?>