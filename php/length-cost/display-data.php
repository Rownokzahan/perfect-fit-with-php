<?php
    include '../connect.php';
    $sql = "select * from `length-cost`";
    $result = mysqli_query($con,$sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $category= $row['category'];
        $from= $row['from'];
        $to= $row['to'];
        $rate= $row['rate'];
        $tableRow ='
            <tr>
                <th scope="row">'.$number.'</th>
                <td>'.$category.'</td>
                <td>'.$from.'</td>
                <td>'.$to.'</td>
                <td>'.$rate.'</td>
                <td>
                    <div class="d-flex gap-3">
                        <button type="button" onclick="showDetails('.$id.')" class="table-btn bg-warning" data-bs-toggle="modal" data-bs-target="#update-inch-modal">Edit</button>
                        <button type="button" onclick="deleteUser('.$id.')" class="table-btn bg-danger">Delete</button>
                    </div>
                </td>
            </tr>
        ';
        echo $tableRow;           
        $number++;
    }
?>