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

function wishlist(id){
    localStorage.setItem('dress_item_id', id);
}
console.log(localStorage);
let storedItems = '';
for (let i = 0; i < localStorage.length; i++) {
  const key = localStorage.key('dress_item_id');
  const value = localStorage.getItem('dress_item_id');
  console.log(value);
//   storedItems += `<li>${value}</li>`;
}