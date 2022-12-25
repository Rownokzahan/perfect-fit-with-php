$(document).ready(function () {
    displayData();
}); 
// display table data
function displayData(){
    $.ajax({
        url:"php/all-dress/display-data.php",
        type:"post",
        success:function(data,status){
            $('#all-dress-list').html(data);
        }
    })
}

function customize(id){
    location.href = 'customize.html?dress_id='+id;
}

function addToWishlist(id){
    wishlist = localStorage.getItem('wishlist');
    wishlist = JSON.parse(wishlist) ?? [];
    if (!wishlist.includes(id)){
        wishlist.push(id);
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
    }
}