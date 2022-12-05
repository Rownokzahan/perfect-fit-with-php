<?php
    include '../connect.php';
    $sql = "select * from `dress-item`";
    $result = mysqli_query($con,$sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $name= $row['name'];
        $category= $row['category'];
        $price= $row['price'];
        $description= $row['description'];
        $image= $row['image'];
        $tableRow ='
            <tr>
                <th scope="row">'.$number.'</th>
                <td>'.$name.'</td>
                <td>'.$category.'</td>
                <td>'.$price.'</td>
                <td class="table-description">'.$description.'</td>
                <td><img src="../php/dress-item/images/'.$image.'" height="90" width="90"></td>
                <td>
                    <div class="d-flex gap-3">
                        <button type="button" onclick="showDetails('.$id.')" class="table-btn bg-warning" data-bs-toggle="modal" data-bs-target="#update-product-modal">Edit</button>
                        <button type="button" onclick="deleteUser('.$id.')" class="table-btn bg-danger">Delete</button>
                    </div>
                </td>
            </tr>
        ';
        echo $tableRow;           
        $number++;
    }
?>