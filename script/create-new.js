$(document).ready(function () {
    displayData();
});
// display data
function displayData() {
    $.ajax({
        url: "php/create-new/display-data.php",
        type: "post",
        success: function (data, status) {
            const response = JSON.parse(data);
            $('#create-new-form').html(response.form_info);
            $('#price-table').html(response.table_info);
            setPriceValue();

            $(".len-price").each(function (index) {
                $(this).on("input", function () {
                    const length = $('input[name="length"]');
                    const body = $('input[name="body"]');
                    const sleeve = $('input[name="sleeve"]');
                    $.ajax({
                        url: "php/create-new/display-length-price.php",
                        type: 'post',
                        data: {
                            length: length.val(),
                            body: body.val(),
                            sleeve: sleeve.val()
                        },
                        success: function (data, status) {
                            const response = JSON.parse(data);
                            const total_length_price = response.length_price + response.body_price + response.sleeve_price;
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

$('#create-new-form').click(function(e){

    const src = $(e.target).attr("src");
    const pic_name = src.substring(src.lastIndexOf('/') + 1, src.lastIndexOf('.'));
    $('#display-dress').html('<img src="Perfect-fit-Images/Create/'+pic_name+'.jpg" alt="'+pic_name+'">');


    let customize_item_name=$(e.target).val();
    if(customize_item_name==""){
        return; // for measurement section
    }
    $.ajax({
        url:"php/create-new/display-table-price.php",
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
    // setting prices according to category
    let dress_cost = 0;
    $('.test').each(function(){
        dress_cost += parseFloat($(this).text());
    });
    const total_price = dress_cost + parseFloat($(".delivery-price").text());

    $('.dress-cost').text(dress_cost);
    $('.total-price').text(total_price);
}

$('#create-new-form').on("submit", function (e) {
    e.preventDefault(); // preventing form from refreshing
    const dress_name = "Create New";
    const dress_id = "none";
    const total_price = $('.total-price').text();
    let form_data = new FormData(this);
    form_data.append('dress_name', dress_name);
    form_data.append('dress_id', dress_id);
    form_data.append('total_price', total_price);
    $.ajax({
        url: "php/create-new/submit-form.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {
            const id = JSON.parse(data);
            location.href = "order.html?customize_id=" + id + "&dress_name=" + dress_name;
        },
    });
});