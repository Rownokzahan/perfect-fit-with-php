$(document).ready(function () {
    const url = new URL(window.location);
    const params = new URLSearchParams(url.search);
    const order_id = params.get('order_id');
    $.ajax({
        url:"../php/order/order-details.php",
        type:"post",
        data:{
            order_id:order_id,
        },
        success:function(data,status){
            data = JSON.parse(data);
            $('main').html(data);

        }
    })
});
