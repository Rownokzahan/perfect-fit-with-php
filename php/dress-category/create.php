<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['category-name'];
        if(!empty($name)){
            $sql = "select * from `dress-category` where name ='$name'";
            $result = mysqli_query($con,$sql);
            $num = mysqli_num_rows($result); 
            if($num>0){
                echo json_encode("This category already exist");
            }else{
                $sql = "insert into `dress-category` (name) values ('$name')";
                $result =mysqli_query($con,$sql);
                if(!$result){
                    die(mysqli_error($result));
                }else{
                    echo json_encode("Successfully Created");
                }  
            }
        }
    }    
?>