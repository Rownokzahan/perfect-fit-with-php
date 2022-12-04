<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        include "connect.php";
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql ="select * from `registration` where username='$username'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);            
        if($num > 0){
            $sql ="select * from `registration` where username='$username'and password='$password'";
            $result = mysqli_query($con,$sql);
            $num = mysqli_num_rows($result); 
            if($num<=0){
                echo "incorrect password";
            }
        }else{
            // echo json_encode("incorrect username");
        }
    }
?>