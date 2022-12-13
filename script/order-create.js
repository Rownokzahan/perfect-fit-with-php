// genrate delivery date
const d = new Date();
d.setDate(d.getDate() + 14);
const delivery_date= `${d.getDate()}-${d.getMonth()}-${d.getFullYear()}`;
$('#delivery-date').text(delivery_date);


const url_query = window.location.search;
const customize_id = url_query.slice(1).split("&")[0].split("=")[1];
const dress_name= url_query.slice(1).split("&")[1].split("=")[1].split('%20').join(' ');
$('#dress-name').text(dress_name);

// random order id generator
const order_id = Math.floor( Math.random()*100000000).toString(16) + customize_id;
$('#order-id').text(order_id);

//create order
$("#order-form").on('submit', (function (e) {
    e.preventDefault();
    let form_data= new FormData(this);
    form_data.append('order_id', order_id);
    form_data.append('customize_id', customize_id);
    form_data.append('delivery_date', delivery_date);
    $.ajax({
        url: "php/order/create.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, status) {
            const response =JSON.parse(data);
            console.log();
            if(response=="success"){
                $('#confirm-modal').modal('show');
            }
        },
    });
}));