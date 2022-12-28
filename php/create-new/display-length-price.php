<?php
    include '../connect.php';
    $length = $_POST['length'];
    $body = $_POST['body'];
    $sleeve = $_POST['sleeve'];

    $length_price=0;
    $body_price=0;
    $sleeve_price=0;

    if(!empty($length) && $length>10 && $length<80){
        $sql = 'select * from `length-cost` where `category`="Dress Length" and '.$length.' between `from` and `to`';
        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $length_price= $row['rate'];    
    }

    if(!empty($body) && $body>1 && $body<50){
        $sql = 'select * from `length-cost` where `category`="Body Length" and '.$body.' between `from` and `to`';
        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $body_price= $row['rate'];    
    }

    if(!empty($sleeve) && $sleeve>1 && $sleeve<40){
        $sql = 'select * from `length-cost` where `category`="Sleeve Length" and '.$sleeve.' between `from` and `to`';
        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $sleeve_price= $row['rate'];    
    }
    echo json_encode(["length_price"=>$length_price, "body_price"=>$body_price, "sleeve_price"=>$sleeve_price]); 
?>