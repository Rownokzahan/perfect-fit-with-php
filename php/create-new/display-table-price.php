<?php
    include '../connect.php';
    $name = $_POST['name'];
    if(!empty($name)){
        $sql = "select * from `customize-item` where name ='$name'";
        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result); 
        $price= $row['price'];
        $category= $row['category'];

        echo json_encode(["category"=>$category,"price"=>$price]);  
    }
?>