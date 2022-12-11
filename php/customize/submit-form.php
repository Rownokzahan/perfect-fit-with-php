<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $dress_name= $_POST['dress_name'];
        $dress_id= $_POST['dress_id'];
        $total_price= $_POST['total_price'];
        $color= $_POST['Color'];         
        $fabric= $_POST['Fabric'];
        $neck= $_POST["Neck_Design"];
        $sleeve_design= $_POST['Sleeve_Design'];
        $skirt = $_POST["Skirt_Design"];
        $waistband = $_POST["Waistband"];
        $length = $_POST["length"];
        $body = $_POST["body"];
        $sleeve = $_POST["sleeve"];

        if(!empty($color) && !empty($fabric) && !empty($neck) && !empty($sleeve_design) && !empty($skirt)
            && !empty($waistband) && !empty($length) && !empty($body) && !empty($sleeve)){

            $sql = "insert into `order-details` (dress_name,dress_id,total_price,color,fabric,neck,sleeve_design,skirt,waistband,length,body,sleeve) values ('$dress_name','$dress_id','$total_price','$color','$fabric','$neck','$sleeve_design','$skirt','$waistband','$length','$body','$sleeve')";
            $result =mysqli_query($con,$sql);

            //for getting the inserted row id
            $sql_for_last_id="select id FROM `order-details` order by id desc limit 1";
            $result =mysqli_query($con,$sql_for_last_id);
            $row = $result->fetch_assoc();
            echo $row['id'];
        }
    }   
?>