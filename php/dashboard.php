<?php
    include 'connect.php';
    $sql = "select * from `dress-item`";
    $total_dress =0;
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $total_dress++;
    }

    $sql = "select * from `orders`";
    $total_order =0;
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $total_order++;
    }
    echo json_encode(["total_dress"=>$total_dress,"total_order"=>$total_order])
?>