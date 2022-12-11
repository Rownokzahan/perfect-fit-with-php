<?php
    include "../connect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
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

            $sql = "insert into `customize-form` (color,fabric,neck,sleeve_design,skirt,waistband,length,body,sleeve) values ('$color','$fabric','$neck','$sleeve_design','$skirt','$waistband','$length','$body','$sleeve')";
            $result =mysqli_query($con,$sql);

            //for getting the inserted row id
            $sql_for_last_id="select id FROM `customize-form` order by id desc limit 1";
            $result =mysqli_query($con,$sql_for_last_id);
            $row = $result->fetch_assoc();
            echo $row['id'];
        }
    }   
?>