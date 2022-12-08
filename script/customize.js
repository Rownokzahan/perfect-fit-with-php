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
            const response = JSON.parse(data);
            $('#dress-info').html(response.dress_info);
            $('#customize-form').html(response.form_info);

            const price = $("#price").text();
            $("#regular-price").text(price);
        }
    })
}

$('.customize-form').click(function(e){
    let customize_item_name=$(e.target).val()
    console.log(customize_item_name);
    $.ajax({
        url:"php/customize/display-table-data.php"+url_variable,
        type:"post",
        success:function(data,status){
            const response = JSON.parse(data);
            $('#dress-info').html(response.dress_info);
            $('#customize-form').html(response.form_info);

            const price = $("#price").text();
            $("#regular-price").text(price);
        }
    })
});
