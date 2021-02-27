$(document).ready(function(){

    window.onscroll = function showHeader () {

        var header = document.querySelector('.header');

        if (window.pageYOffset > 200) {
            header.classList.add('header_active')
        } else {
            header.classList.remove('header_active')
        }
    }

// Validate
    function validateForms(form){
    $(form).validate({
        rules: {
            name: "required",
            phone: "required",
        },
        messages: {
            name: "Пожалуйста введите свое имя",
            phone: "Пожалуйста введите совй номер",
          }
    }); 
    };

    validateForms('#call');

    $('input[name=phone]').mask("+7(999) 999-9999");


    // Telegram
    $('form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "telegram.php",
            data: $(this).serialize()
        }).done(function() {
            $(this).find("input").val("");
            $('#consultation').fadeOut();
            $('.overlay, #thanks').fadeIn('slow');


            $('form').trigger('reset');
        });
        return false;
    });

  });