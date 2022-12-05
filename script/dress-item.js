$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    $.ajax({
        url:"../php/dress-item/display-data.php",
        type:"post",
        success:function(data,status){
            $('#display-data-table').html(data);
        }
    })
}

//create
$("#add-product-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/dress-item/create.php",
        type: "POST",
        data: new FormData(this),// using FromData class to send all data of from
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {
            $('#create-message').html(data);
            displayData();
        },
    });
}));

// delete
function deleteUser(id){
    $.ajax({
        url:"../php/dress-item/delete.php",
        type:'post',
        data:{
            id:id
        },
        success:function(data,status){
            displayData();
        }
    });
}


//get details
function showDetails(id){
    $('#hidden').val(id);
    $.ajax({
        url:"../php/dress-item/get-details.php",
        type:"post",
        data:{
            id:id,
        },
        success:function(data,status){
            data = JSON.parse(data)
            $('input[name="product-name"]').val(data.name);
            $('select[name="category"]').val(data.category);
            $('input[name="product-price"]').val(data.price);
            $('input[name="description"]').val(data.description);
            // $('input[name="product-image"]');
            // var file = $('input[name="product-image"]');
        }
    })
}

// update
$("#update-product-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/dress-item/update.php",
        type: "POST",
        data: new FormData(this),// using FromData class to send all data of from
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {
            $('#update-message').html(JSON.parse(data));
            displayData();
        },
    });
}));