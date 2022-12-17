<?php
    include '../connect.php';
    $sql = "select * from `orders`";
    $result = mysqli_query($con,$sql);
    $number = 1;
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $order_id= $row['order_id'];
        $customize_id= $row['customize_id'];
        $total_price= $row['total_price'];
        $payment= $row['payment_method'];
        $transaction_id= $row['transaction_id'];
        $name= $row['customer_name'];
        $phone= $row['phone'];
        $address= $row['delivery_address'];
        $delivery_date= $row['delivery_date'];


        $tableRow ='
            <tr>
                <th scope="row">'.$number.'</th>
                <!--<td>'.$order_id.'</td>
                <td>'.$customize_id.'</td>-->
                <td>'.$total_price.'</td>
                <td>'.$payment.'</td>
                <td>'.$transaction_id.'</td>
                <!--<td>'.$name.'</td>-->
                <td>'.$phone.'</td>
                <!--<td>'.$address.'</td>-->
                <td>'.$delivery_date.'</td>

                <td>
                    <button onclick="orderDetails('.$id.')" class="table-btn bg-info">Details</button>
                </td>
                <td>
                    <div class="d-flex gap-3">
                        <button type="button" onclick="cancelOrder('.$id.')" class="table-btn bg-danger">Cancel</button>
                    </div>
                </td>
            </tr>
        ';
        echo $tableRow;           
        $number++;
    }
?>