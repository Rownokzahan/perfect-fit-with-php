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

