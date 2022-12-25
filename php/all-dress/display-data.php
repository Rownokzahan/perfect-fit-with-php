<?php
    include '../connect.php';
    $sql = "select * from `dress-category`";
    $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $dress_category= $row['name'];

        $part1 = '
            <div class="dress-category">
                <h2 class="dress-category-name">'.$dress_category.'</h2>
                <div class="line"></div>
                <div class="row">
        ';

        $part2='';

        $sql2 = "select * from `dress-item` where category='$dress_category'";
        $result2 = mysqli_query($con,$sql2);

        $dress_list='';

        while($row2=mysqli_fetch_assoc($result2)){
            $id= $row2['id'];
            $name= $row2['name'];
            $price= $row2['price'];

            $image= $row2['image'];
            $dress_item ='    
                        <div class="col">
                            <div class="dress-item">
                                <img src="php/dress-item/images/'.$image.'" class="card-img-top" alt="...">
                                <div class="item-body">
                                    <h5 class="item-name">'.$name.'</h5>
                                    <p class="">$ <span id="dress-price">'.$price.'</span></p>
                                </div>
                                <div class="d-flex justify-content-evenly pb-3">
                                <button onclick=wishlist('.$id.') class="btn btn-secondary">
                                    <i class="bi bi-heart-fill"></i> Add to Wishlist
                                </button>
                                <button onclick=customize('.$id.') class="btn btn-primary">
                                    <i class="bi bi-bag-heart-fill"></i> Buy Now
                                </button>
                            </div>
                            </div>
                        </div>

            ';

           $dress_list = $dress_list. $dress_item;            
        }
        $part2= $part2.$dress_list;

        $part3 = '
                </div>
            </div>
        ';

        $full_part = $part1.$part2.$part3;
        echo $full_part;          
    }
?>