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


            // $('input[name="length"]').on("input", function(e){
            //     console.log($(e.target).val());
            // });

            //try area
            $( ".len-price" ).each(function(index) {
                $(this).on("input", function(){
                    const length = $('input[name="length"]');
                    const body = $('input[name="body"]');
                    const sleeve = $('input[name="sleeve"]');
                    $.ajax({
                        url:"php/customize/display-length-price.php",
                        type:'post',
                        data:{
                            length:length.val(),
                            body:body.val(),
                            sleeve:sleeve.val()
                        },
                        success:function(data,status){
                            const response = JSON.parse(data);
                            console.log(response.body_price);

                            $('#length-price').text(response.length_price);
                            $('#body-price').text(response.body_price);
                            $('#sleeve-price').text(response.sleeve_price);
                            
                        }
                    });

                });
            });
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

            // setting prices according to customize item price
            let customize_total = 0;
            $('.test').each(function(){
                customize_total += parseFloat($(this).text());
            });
            
            $('.customize-total').text(customize_total);
            let total_price = parseFloat($(".regular-price").text()) + customize_total + parseFloat($(".delivery-price").text());
            $('.total-price').text(total_price);
        }
    });
});