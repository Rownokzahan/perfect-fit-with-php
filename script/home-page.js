//-------- For Every From Validation (Bootsrap) ---------
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
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

//-----------adding Header to every admin page and front page-----------
$(function(){
    $.get("header.html", function(data) {  //there are two header.html file one for admin one for front end
        var htmlContent = data;
        $("body").prepend(data);
    });
});

//-----------adding Footer to every front-----------
$(function(){
    $("#fornt-footer").load("footer.html"); 
});


