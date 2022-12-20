<?php
    include "connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        if(!empty($username) && !empty($phone) && !empty($password)){
            $sql = "insert into `registration` (username,phone,password) values ('$username','$phone','$password')";
            $result =mysqli_query($con,$sql);
            if(!$result){
                echo json_encode($mysqli->error);
            }else{
                echo json_encode("Successfully signed up !");
            }
        }
    }    
?>