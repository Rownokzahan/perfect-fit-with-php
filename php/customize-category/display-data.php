<?php
    include '../connect.php';
    $sql = "select * from `customize-category`";
    $result = mysqli_query($con,$sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $name= $row['name'];
        $tableRow ='
            <tr>
                <th scope="row">'.$number.'</th>
                <td>'.$name.'</td>
                <td class="d-flex gap-3">
                    <button type="button" onclick="showDetails('.$id.')" class="table-btn bg-warning" data-bs-toggle="modal"
                    data-bs-target="#update-category-modal">Edit</button>
                    <button type="button" onclick="deleteUser('.$id.')" class="table-btn bg-danger">Delete</button>
                </td>
            </tr>
        ';
        echo $tableRow;           
        $number++;
    }
?>