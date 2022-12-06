<?php    
    include '../connect.php';

    $id = $_GET['dress_id'];
    $sql = "select * from `dress-item` where id= $id";
    $result = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    $name= $row['name'];
    $price= $row['price'];
    $image= $row['image'];
    $description= $row['description'];

    $dress_info ='
        <div class="dress-info">
            <img src="php/dress-item/images/'.$image.'" alt="" class="dress-img">
            <h5>'.$name.'</h5>
            <h5><span id="price">'.$price.' </span> Taka</h5>
            <p>'.$description.'</p>
        </div>
    ';
    echo $dress_info;   
?>