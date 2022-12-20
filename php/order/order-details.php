<?php
    include '../connect.php';
    $order_id = $_POST['order_id'];
    $sql = "select * from `orders` where id ='$order_id'";
    $result = mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    $order_id= $row['order_id'];
    $total_price= $row['total_price'];
    $payment= $row['payment_method'];
    $transaction_id= $row['transaction_id'];
    $name= $row['customer_name'];
    $phone= $row['phone'];
    $address= $row['delivery_address'];
    $delivery_date= $row['delivery_date'];

    $customize_id= $row['customize_id'];
    $sql = "select * from `order-details` where id ='$customize_id'";
    $result = mysqli_query($con,$sql);
    $row2=mysqli_fetch_assoc($result);

    $color= $row2['color'];
    $fabric= $row2['fabric'];
    $neck= $row2['neck'];
    $sleeve_design= $row2['sleeve_design'];
    $skirt= $row2['skirt'];
    $waistband= $row2['waistband'];
    $length= $row2['length'];
    $body= $row2['body'];
    $sleeve= $row2['sleeve'];

    $dress_id= $row2['dress_id'];
    $sql = "select * from `dress-item` where id ='$dress_id'";
    $result = mysqli_query($con,$sql);
    $row3=mysqli_fetch_assoc($result);
    $dress_name = $row3['name'];
    $dress_image = $row3['image'];


    $main ='       
        <div>
            <h3>Order ID #<span class="text-primary">'.$order_id.'</span></h3>
            <div class="order-card">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="border: none;">
                                <h4>Order Information</h4>
                            </th>
                        </tr>
                        <tr>
                            <th>Payment Method</b></th>
                            <td>'.$payment.'</td>
                        </tr>
                        <tr>
                            <th>Transaction ID</b></th>
                            <td>'.$transaction_id.'</td>
                        </tr>
                        <tr>
                            <th>Price</b></th>
                            <td>'.$total_price.'</td>
                        </tr>
                        <tr>
                            <th>Delivery Date</b></th>

                            <td>'.$delivery_date.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="order-card">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="border: none;">
                                <h4>Customize Information</h4>
                            </th>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td>'.$color.'</td>
                        </tr>
                        <tr>
                            <th>Fabric</th>
                            <td>'.$fabric.'</td>
                        </tr>
                        <tr>
                            <th>Neck</th>
                            <td>'.$neck.'</td>
                        </tr>
                        <tr>
                            <th>Sleeve</th>
                            <td>'.$sleeve_design.'</td>
                        </tr>
                        <tr>
                            <th>Skirt</th>
                            <td>'.$skirt.'</td>
                        </tr>
                        <tr>
                            <th>Waistband</th>
                            <td>'.$waistband.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <div class="order-image">
                <img src="../php/dress-item/images/'.$dress_image.'">
                <h5 class="text-center">'.$dress_name.'</h5>
            </div>
            <div class="small-card">
                <h4>Measurement</h4>
                <table>
                    <tbody>
                        <tr>
                            <th>Long</b></th>
                            <th>:</th>
                            <td>'.$length.' inch</td>
                        </tr>
                        <tr>
                            <th>Body</b></th>
                            <th>:</th>
                            <td>'.$body.' inch</td>
                        </tr>
                        <tr>
                            <th>Sleeve</b></th>
                            <th>:</th>
                            <td>'.$sleeve.' inch</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="small-card">
                <h4>Customer Information</h4>
                <table>
                    <tbody>
                        <tr>
                            <th>Name</b></th>
                            <td>'.$name.'</td>
                        </tr>
                        <tr>
                            <th>Adress</b></th>
                            <td>'.$address.'</td>
                        </tr>
                        <tr>
                            <th>Phone Number</b></th>
                            <td>'.$phone.'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    ';

    echo json_encode($main);