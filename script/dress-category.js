$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    $.ajax({
        url:"../php/dress-category/display-data.php",
        type:"post",
        success:function(data,status){
            $('#display-data-table').html(data);
        }
    })
}

//create
$("#category-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/dress-category/create.php",
        type: "POST",
        data: new FormData(this),// using FromData class to send all data of from
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {
            $('#create-message').html(JSON.parse(data));
            displayData();
        },
    });
}));

// delete
function deleteUser(id){
    $.ajax({
        url:"../php/dress-category/delete.php",
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
        url:"../php/dress-category/get-details.php",
        type:"post",
        data:{
            id:id,
        },
        success:function(data,status){
            $('input[name="category-name"]').val(JSON.parse(data));
        }
    })
}

// update
$("#update-category-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/dress-category/update.php",
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