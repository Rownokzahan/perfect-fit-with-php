$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    $.ajax({
        url:"../php/dashboard.php",
        type:"post",
        success:function(data,status){
            data = JSON.parse(data);
            $('#total-order').html(data.total_order);
            $('#total-dress').html(data.total_dress);
        }
    })
}