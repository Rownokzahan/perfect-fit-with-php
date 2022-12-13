<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
        $order_id= $_POST['order_id'];   
        $customize_id= $_POST["customize_id"];        
            $sql = "select * from `order-details` where `id`= '$customize_id'";
            $result =mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
        $total_price= $row['total_price'];
        $payment= $_POST['payment'];
        $transaction_id= $_POST['trx-id'];
        $name= $_POST['name'];
        $phone= $_POST['phone'];
        $address= $_POST['address'];
        $delivery_date= $_POST['delivery_date'];


        if(!empty($order_id) && !empty($total_price) && !empty($name) && !empty($phone) && !empty($address) && !empty($payment) && !empty($transaction_id)){
            $sql = "insert into `orders` (`order_id`,`customize_id`, `total_price`, `payment_method`, `transaction_id`, `customer_name`, `phone`, `delivery_address`,`delivery_date`) values ('$order_id', '$customize_id', '$total_price', '$payment', '$transaction_id', '$name', '$phone', '$address','$delivery_date')";
            $result =mysqli_query($con,$sql);
            if(!$result){
                die(mysqli_error($result));
            }else{
                echo json_encode("success");
            }  
        }
    }
?>