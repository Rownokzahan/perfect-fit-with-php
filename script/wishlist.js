$(document).ready(function () {
    displayData();
}); 

function displayData(){
    $('#wish-list-item').html('');
    let wishlist = localStorage.getItem('wishlist');
    wishlist = JSON.parse(wishlist) ?? [];
    wishlist.forEach(element => {
        $.ajax({
            url:"php/wishlist/display-data.php",
            type:"post",
            data:{
                id:element,
            },
            success:function(data,status){
                $('#wish-list-item').prepend(data);
            }
        })
    });
}

function customize(id){
    location.href = 'customize.html?dress_id='+id;
}

function remove(id){
    let wishlist = localStorage.getItem('wishlist');
    wishlist = JSON.parse(wishlist) ?? [];
    const index = wishlist.indexOf(id);
    if (index !== -1) {
        wishlist = wishlist.filter(wishlist => wishlist !== id);
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
        displayData();
    }
}