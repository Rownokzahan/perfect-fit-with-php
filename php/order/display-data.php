<?php
    include '../connect.php';
    $sql = "select * from `orders`";
    $result = mysqli_query($con,$sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $order_id= $row['order_id'];
        $total_price= $row['total_price'];
        $name= $row['customer_name'];
        $phone= $row['phone'];
        $address= $row['delivery_address'];
        $payment= $row['payment_method'];
        $transaction_id= $row['transaction_id'];

        $tableRow ='
            <tr>
                <th scope="row">'.$number.'</th>
                <td>'.$order_id.'</td>
                <td>'.$total_price.'</td>
                <td>'.$name.'</td>
                <td>'.$phone.'</td>
                <td>'.$address.'</td>
                <td>'.$payment.'</td>
                <td>'.$transaction_id.'</td>
                <td>
                    <button class="table-btn bg-info" data-bs-toggle="modal"
                    data-bs-target="#order-details">Details</button>
                </td>
                <td>
                    <div class="d-flex gap-3">
                        <button type="button" onclick="deleteUser('.$id.')" class="table-btn bg-danger">Cancel</button>
                    </div>
                </td>
            </tr>
        ';
        echo $tableRow;           
        $number++;
    }
?>