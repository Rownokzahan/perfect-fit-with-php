<?php
    include '../connect.php';
    $sql = "select * from `customize-item`";
    $result = mysqli_query($con,$sql);
    $number = 1;
    $table_body ='';
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $name= $row['name'];
        $category= $row['category'];
        $price= $row['price'];
        $image= $row['image'];
        $tableRow ='
            <tr>
                <th scope="row">'.$number.'</th>
                <td>'.$name.'</td>
                <td>'.$category.'</td>
                <td>'.$price.'</td>
                <td><img src="../php/customize-item/images/'.$image.'" height="50" width="50"></td>
                <td>
                    <div class="d-flex gap-3">
                        <button type="button" onclick="showDetails('.$id.')" class="table-btn bg-warning" data-bs-toggle="modal" data-bs-target="#update-customize-item-modal">Edit</button>
                        <button type="button" onclick="deleteUser('.$id.')" class="table-btn bg-danger">Delete</button>
                    </div>
                </td>
            </tr>
        ';
        $table_body = $table_body .$tableRow;           
        $number++;
    }

    $sql = "select * from `customize-category`";
    $result = mysqli_query($con,$sql);
    $option_list ='<option selected disabled value="">Choose A Category</option>';
    while($row=mysqli_fetch_assoc($result)){
        $name= $row['name'];
        $option ='<option>'.$name.'</option>
        ';
        $option_list =$option_list.$option;
    }

    echo json_encode(["table_body"=>$table_body, "option_list"=>$option_list]); 
?>