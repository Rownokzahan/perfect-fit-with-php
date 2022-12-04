<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = $_POST['id'];
        $name = $_POST['category-name'];
        if(!empty($name)){
            $sql = "select * from `dress-category` where name ='$name'";
            $result = mysqli_query($con,$sql);
            $num = mysqli_num_rows($result); 
            if($num>0){
                echo json_encode("This category already exist");
            }else{
                $sql = "update `dress-category` set name='$name' where id=$id";
                $result =mysqli_query($con,$sql);
                if(!$result){
                    die(mysqli_error($result));
                }else{
                    echo json_encode("Successfully Updated !");
                }  
            }
        }
    }    
?>