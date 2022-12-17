<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){        
        $category= $_POST['category'];
        $from= $_POST['from'];
        $to= $_POST['to'];
        $rate= $_POST['rate'];
        
        if(!empty($category) && $from!=='' && $to!=='' && $rate!==''){
            $sql = "insert into `length-cost` (`category`, `from`, `to`, `rate`) values ('$category', '$from', '$to', '$rate')";
            $result =mysqli_query($con,$sql);
            if(!$result){
                echo json_encode($mysqli->error);
            }else{
                echo json_encode("Successfully Created");
            }  
        }
    }
?>