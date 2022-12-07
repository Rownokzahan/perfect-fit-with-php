<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name= $_POST['name'];         
        $category= $_POST['category'];
        $price= $_POST['price'];
        $image = $_FILES["image"]["name"];

        
        // saving the uploaded image into image folder
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./images/" . $image;
        move_uploaded_file($tempname, $folder);

        if(!empty($name) && !empty($category) && !empty($price) && !empty($image)){

            $sql = "insert into `customize-item` (name,category,price,image) values ('$name','$category','$price','$image')";
            $result =mysqli_query($con,$sql);
            if(!$result){
                die(mysqli_error($result));
            }else{
                echo json_encode("Successfully Created");
            }  
        }
    }  
?>