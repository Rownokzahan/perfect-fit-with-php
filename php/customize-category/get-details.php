<?php
    include '../connect.php';
    $id = $_POST['id'];
    $sql = "select * from `customize-category` where id ='$id'";
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $name= $row['name'];
        echo json_encode($name);          
    }
?>