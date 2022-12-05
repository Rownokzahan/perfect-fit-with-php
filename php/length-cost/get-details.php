<?php
    include '../connect.php';
    $id = $_POST['id'];
    $sql = "select * from `length-cost` where id ='$id'";
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        echo json_encode($row);          
    }
?>