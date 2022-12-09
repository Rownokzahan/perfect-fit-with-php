$(document).ready(function () {
    displayData();
}); 
// display data
function displayData(){
    const url_variable = window.location.search;
    $.ajax({
        url:"php/customize/display-data.php"+url_variable,
        type:"post",
        success:function(data,status){
            const response = JSON.parse(data);
            $('#dress-info').html(response.dress_info);
            $('#customize-form').html(response.form_info);
            $('#customize-price-table').html(response.table_info);

            const price = $("#price").text();
            $(".regular-price").text(price);
            $('.total-price').text( parseFloat(price) + parseFloat($(".delivery-price").text()));
        }
    })
}

$('.customize-form').click(function(e){
    let customize_item_name=$(e.target).val()
    if(customize_item_name==""){
        return;
    }
    $.ajax({
        url:"php/customize/display-table-price.php",
        type:'post',
        data:{
            name:customize_item_name
        },
        success:function(data,status){
            const response = JSON.parse(data);
            let category = response.category;
            category = category.replace(' ','-'); //doing this cause id can't have space
            $('#'+category).text(response.price);


            let customize_total = 0;
            $('.test').each(function(){
                customize_total += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
            });
            $('.customize-total').text(customize_total);

            let total_price = parseFloat($(".regular-price").text()) + customize_total + parseFloat($(".delivery-price").text());
            $('.total-price').text(total_price);
        }
    });
});
