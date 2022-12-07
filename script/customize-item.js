$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    $.ajax({
        url:"../php/customize-item/display-data.php",
        type:"post",
        success:function(data,status){
            const response = JSON.parse(data);
            $('#display-data-table').html(response.table_body);
            $('.customize-category').html(response.option_list);
        }
    })
}

//create
$("#add-customize-item-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/customize-item/create.php",
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
        url:"../php/customize-item/delete.php",
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
        url:"../php/customize-item/get-details.php",
        type:"post",
        data:{
            id:id,
        },
        success:function(data,status){
            data = JSON.parse(data)
            $('input[name="name"]').val(data.name);
            $('select[name="category"]').val(data.category);
            $('input[name="price"]').val(data.price);
        }
    })
}

// update
$("#update-customize-item-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/customize-item/update.php",
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