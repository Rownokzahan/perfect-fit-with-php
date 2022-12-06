$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    const url_variable = window.location.search;
    $.ajax({
        url:"php/customize/display-data.php"+url_variable,
        type:"post",
        success:function(data,status){
            $('#dress-info').html(data);
            const price = $("#price").text();
            $("#regular-price").text(price);
        }
    })
}
