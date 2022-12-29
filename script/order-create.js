// genrate delivery date
const d = new Date();
d.setDate(d.getDate() + 14);
const delivery_date= `${d.getDate()}-${d.getMonth()+1}-${d.getFullYear()}`;
$('#delivery-date').text(delivery_date);

const url = new URL(window.location);
const params = new URLSearchParams(url.search);
const customize_id = params.get('customize_id');
const dress_name= params.get('dress_name');

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