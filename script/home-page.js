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

//-----------adding Header and Footer to every front-----------
$(function(){
    $("#fornt-nav").load("header.html"); 
    $("#fornt-footer").load("footer.html"); 
});

//-----------adding Header to every admin-----------
$(function(){
    $("#admin-nav").load("header.html"); 
});