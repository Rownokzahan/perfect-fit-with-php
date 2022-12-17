<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
        $id= $_POST['id'];        
        $category= $_POST['category'];
        $from= $_POST['from'];
        $to= $_POST['to'];
        $rate= $_POST['rate'];
        
        if(!empty($category) && $from!=='' && $to!=='' && $rate!==''){
            $sql = "UPDATE `length-cost` SET `category`='$category', `from` = '$from', `to` = '$to', `rate` = '$rate' WHERE `length-cost`.`id` = $id";
            $result =mysqli_query($con,$sql);
            if($result){
                echo json_encode("Successfully Updated");
            }  
        }
    }
?>