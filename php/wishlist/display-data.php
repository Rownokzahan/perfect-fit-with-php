<?php
    include '../connect.php';
    $id = $_POST['id'];
    $sql = "select * from `dress-item` where id ='$id'";
    $result = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $id= $row['id'];
    $name= $row['name'];
    $price= $row['price'];
    $image= $row['image'];
    $tableRow ='
        <tr>
            <th><img src="php/dress-item/images/'.$image.'" alt="" height="60" width="60"></th>
            <td>'.$name.'</td>
            <td>'.$price.'</td>
            <td>In Stock</td>
            <td>
                <button onclick="customize('.$id.')" class="btn btn-primary rounded">
                    Buy Now
                </button>
            </td>
            <td class="remove-btn"><i onclick="remove('.$id.')" class="bi bi-x-circle-fill"></i></td>
        </tr>
    ';
    echo $tableRow;    
?>