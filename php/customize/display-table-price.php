<?php
    include '../connect.php';
    $name = $_POST['name'];
    if(!empty($name)){
        $sql = "select * from `customize-item` where name ='$name'";
        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result); 
        $price= $row['price'];
        $category= $row['category'];

        $sql2 = "select * from `customize-category` where name ='$category'";
        $result2 = mysqli_query($con,$sql2);
        $row2=mysqli_fetch_assoc($result2); 
        $id= $row2['id'];

        echo json_encode(["id"=>$id,"price"=>$price]);
  
    }
?>