//--------For Customer Home Page---------

$('#home-icon').click(function(){
    $('#home-info').css("display","block");

    $('#mail-info').css("display","none");
    $('#phone-info').css("display","none");
});
$('#mail-icon').click(function(){
    $('#mail-info').css("display","block");

    $('#home-info').css("display","none");
    $('#phone-info').css("display","none");
});
$('#phone-icon').click(function(){
    $('#phone-info').css("display","block");

    $('#home-info').css("display","none");
    $('#mail-info').css("display","none");
});

//--------For Admin Home Page---------

$('#dress-info').click(function(){
    if($('#dress-info-detail').html() !=""){
        $('#dress-info-detail').html('');
    }
    else{
        $('#dress-info-detail').html(`
            <a href="category.html" class="nav-link">                            
                <i class="bi bi-stack"></i>
                Category
            </a>
            <a href="product.html" class="nav-link">
                <i class="bi bi-images"></i>    
                Dresses
            </a>
        `); 
    }
});

$('#customization').click(function(){
    if($('#customization-detail').html() !=""){
        $('#customization-detail').html('');
    }
    else{
        $('#customization-detail').html(`
            <a href="" class="nav-link">
                <i class="bi bi-rulers"></i>
                Measurement
            </a>
        `); 
    }
});