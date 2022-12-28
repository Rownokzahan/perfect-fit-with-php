<?php
    $first_item_price = [];
    function formInfo()
    {
        include '../connect.php';
        $sql = "select * from `customize-category`";
        $result = mysqli_query($con, $sql);
        $form_info = "";
        global $first_item_price; // chaging the global variable to use letter
        while ($row = mysqli_fetch_assoc($result)) {
            $dress_category = $row['name'];
            $newName = str_replace(" ", "_", $dress_category);

            $part1 = '
                <div class="row basic-box-style">
                    <h3>Select ' . $dress_category . '</h3>
            ';

            $sql2 = "select * from `customize-item` where category='$dress_category'";
            $result2 = mysqli_query($con, $sql2);

            $part2 = '';
            $customize_item_list = '';
            $num = 1;
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $id = $row2['id'];
                $name = $row2['name'];
                $price = $row2['price'];
                $image = $row2['image'];

                if ($num==1) {
                    $checked = "checked"; //using it for first radio btn checked                    
                    array_push($first_item_price,$price); // chaging the global variable to use letter
                } else {
                    $checked ="";
                }
                $customize_item = '    
                    <div class="form-check col col-lg-2 needs-validation" novalidate>
                        <label class="form-check-label" for="' . $dress_category . $num . '">
                            <input class="form-check-input" type="radio" name="' . $newName . '" value="' . $name . '" id="' . $dress_category . $num . '" '.$checked.'>
                            <img src="php/customize-item/images/' . $image . '" alt="Option ' . $num . '">
                            <p class=text-center>' . $price . ' Taka</p>
                        </label>
                    </div>
                ';

                $customize_item_list = $customize_item_list . $customize_item;
                $num++;
            }
            $part2 = $part2 . $customize_item_list;
            $part3 = '
                </div>
            ';
            $form_info = $form_info . $part1 . $part2 . $part3;
        }

        $form_info = $form_info . '
            <div class="measurement-section row basic-box-style">
                <h3>Measure Section</h3> 
                <div class="form-check col">
                    <div class="mb-3">
                        <label class="form-label"><h6>Length of Dress</h6></label>
                        <div class="input-group mb-3 has-validation">
                            <input type="number" class="form-control len-price" name="length" min="10" max="80" required>
                            <span class="input-group-text">inch</span>
                            <div class="invalid-feedback">
                                Enter the dress length between 10 to 79 inch.
                            </div>
                        </div>                                  
                    </div>
                </div>
                
                <div class="form-check col">
                    <div class="mb-3">
                        <label class="form-label"><h6>Length of Body</h6></label>
                        <div class="input-group mb-3 has-validation">
                            <input type="number" class="form-control len-price" name="body" min="1" max="50" required>
                            <span class="input-group-text">inch</span>
                            <div class="invalid-feedback">
                                Enter the body length between 1 to 49 inch.
                            </div>
                        </div>                                  
                    </div>
                </div>  
    
                <div class="form-check col">
                    <div class="mb-3">
                        <label class="form-label"><h6>Length of Sleeve</h6></label>
                        <div class="input-group mb-3 has-validation">
                            <input type="number" class="form-control len-price" name="sleeve" min="1" max="40" required>
                            <span class="input-group-text">inch</span>
                            <div class="invalid-feedback">
                                Enter the sleeve length between 1 to 39 inch.
                            </div>
                        </div>                                  
                    </div>
                </div>  
            </div>
        ';
        return $form_info ;
    }

    function priceTable()
    {
        include '../connect.php';

        $part1 = '
            <h5></h5>
            <tr>
                <th>Category</th>
                <th class="text-end">Price</th>
            </tr>
        ';
        $part2='';
        $part3='
            <tr>
                <td>Length of Dress</td>
                <td class="text-end test" id="length-price">0</td>
            </tr>
            <tr>
                <td>Length of Body </td>
                <td class="text-end test" id="body-price">0</td>
            </tr>
            <tr>
                <td>Length of Sleeve</td>
                <td class="text-end test" id="sleeve-price">0</td>
            </tr>
            <tr>
                <td>Raw Materials</td>
                <td class="text-end test">500</td>
            </tr>
            <tr>
                <td>Sewing</td>
                <td class="text-end test">300</td>
            </tr>
            <tr>
                <th class="border-0">Total </th>
                <th class="border-0 text-end dress-cost">800</th>
            </tr> 
        ';

        $table_info="";
        $table_data_list="";

        $sql = "select * from `customize-category`";
        $result = mysqli_query($con, $sql);

        global $first_item_price;
        $i = 0;
        // echo "<pre>";
        // var_dump($first_item_price) ; // seeing if the changes in previous function is working
        // echo "</pre>";

        while ($row=mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $dress_category= $row['name'];
            $x= str_replace(" ", "-", $dress_category); // "str1 str2" = "str1-str2" doing this cause id can't have space
            $part2='
                <tr>
                    <td>'.$dress_category.'</td>
                    <td class="text-end test" id="'.$x.'">'.$first_item_price[$i].'</td>
                </tr>
            ';
            $table_data_list= $table_data_list . $part2;

            $i++;
        }
        $table_info = $part1 . $table_data_list . $part3;
        return $table_info;
    }
    
    $form_info = formInfo();
    $table_info= priceTable();
    echo json_encode(["form_info"=>$form_info, "table_info"=>$table_info]);
