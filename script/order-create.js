//create
$("#order-form").on('submit', (function (e) {
    e.preventDefault(); // preventing form from refreshing
    $.ajax({
        url: "php/order/create.php",
        type: "POST",
        data: new FormData(this),// using FromData class to send all data of from
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {
            // $('#create-message').html(JSON.parse(data));
            // displayData();

            console.log(data);
        },
    });
}));