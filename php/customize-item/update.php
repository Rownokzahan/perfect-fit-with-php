<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id= $_POST['id']; 
        $name= $_POST['name'];         
        $category= $_POST['category'];
        $price= $_POST['price'];
        $image = $_FILES["image"]["name"];
        
        // saving the uploaded image into image folder
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./images/" . $image;
        move_uploaded_file($tempname, $folder);

        if(!empty($name) && !empty($category) && $price!=='' && !empty($image)){

            $sql = "update `customize-item` set name='$name',category='$category', price='$price', image='$image'  where id=$id";
            $result =mysqli_query($con,$sql);
            if(!$result){
                echo json_encode($mysqli->error);
            }else{
                echo json_encode("Successfully Updated !");
            }  
        }
    }
  
?>