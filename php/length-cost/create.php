<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){        
        $category= $_POST['category'];
        $from= $_POST['from'];
        $to= $_POST['to'];
        $rate= $_POST['rate'];
        
        if(!empty($category) && !empty($from) && !empty($to) && !empty($rate)){
            $sql = "insert into `length-cost` (`category`, `from`, `to`, `rate`) values ('$category', '$from', '$to', '$rate')";
            $result =mysqli_query($con,$sql);
            if(!$result){
                die(mysqli_error($result));
            }else{
                echo json_encode("Successfully Created");
            }  
        }
    }
?>