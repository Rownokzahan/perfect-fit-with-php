//-------- For Every From Validation (Bootsrap) ---------
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
})()

//--------For Customer Footer---------
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

//--------For Admin Navbar---------

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
            <a href="length-cost.html" class="nav-link">
                <i class="bi bi-rulers"></i>
                Length Cost
            </a>
        `); 
    }
});