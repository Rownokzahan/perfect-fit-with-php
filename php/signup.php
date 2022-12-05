<?php
    include "connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $sql = "insert into `registration` (username,phone,password) values ('$username','$phone','$password')";
        $result =mysqli_query($con,$sql);
        if(!$result){
            die(mysqli_error($result));
        }else{
            header("Location:../index.html");
            exit();
        }
    }    
?>