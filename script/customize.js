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
                            $('#length-price').text(response.length_price);
                            $('#body-price').text(response.body_price);
                            $('#sleeve-price').text(response.sleeve_price);
                            setPriceValue();                            
                        }
                    });

                });
            });
        }
    })
}

$('.customize-form').click(function(e){
    let customize_item_name=$(e.target).val();
    if(customize_item_name==""){
        return;
    }
    if(customize_item_name=="no-modification"){
        let id=(e.target.id).replace(' ','-'); //doing this cause id can't have space
        id = id.replace(1, ''); // removing 1 from the id
        $('#'+id).text(00);
        setPriceValue();
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
            const id = category.replace(' ','-'); //doing this cause id can't have space
            $('#'+id).text(response.price);
            setPriceValue();

        }
    });
});


function setPriceValue(){
    // setting prices according to customize item price
    let customize_total = 0;
    $('.test').each(function(){
        customize_total += parseFloat($(this).text());
    });
    
    $('.customize-total').text(customize_total);
    let total_price = parseFloat($(".regular-price").text()) + customize_total + parseFloat($(".delivery-price").text());
    $('.total-price').text(total_price);
}

$('#customize-form').on("submit",function(e){
    e.preventDefault(); // preventing form from refreshing
    const dress_name = $('#dress-name').text();
    const dress_id = $('#dress-id').val();
    const total_price= $('.total-price').text();
    let form_data= new FormData(this);
    form_data.append('dress_name', dress_name); 
    form_data.append('dress_id', dress_id);
    form_data.append('total_price', total_price);
    $.ajax({
        url: "php/customize/submit-form.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {            
            const id = JSON.parse(data);
            location.href = "order.html?customize_id="+id+"&dress_name="+dress_name;
        },
    });
});