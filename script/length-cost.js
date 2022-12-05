$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    $.ajax({
        url:"../php/length-cost/display-data.php",
        type:"post",
        success:function(data,status){
            $('#display-data-table').html(data);
        }
    })
}

//create
$("#add-inch-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/length-cost/create.php",
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
        url:"../php/length-cost/delete.php",
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
        url:"../php/length-cost/get-details.php",
        type:"post",
        data:{
            id:id,
        },
        success:function(data,status){
            data = JSON.parse(data);
            $('select[name="category"]').val(data.category);
            $('input[name="from"]').val(data.from);
            $('input[name="to"]').val(data.to);
            $('input[name="rate"]').val(data.rate);
        }
    })
}

// update
$("#update-inch-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "../php/length-cost/update.php",
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