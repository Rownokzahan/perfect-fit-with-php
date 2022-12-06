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