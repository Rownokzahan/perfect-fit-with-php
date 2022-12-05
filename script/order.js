$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    $.ajax({
        url:"../php/order/display-data.php",
        type:"post",
        success:function(data,status){
            $('#display-data-table').html(data);
        }
    })
}