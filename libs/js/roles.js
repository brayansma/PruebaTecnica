$(document).ready(function() {
$('#rolesForm').validate({
        ignore: [],
        rules: {
            txt_nombre: "required"
        },
        messages: {
            txt_nombre: "Por favor, ingrese su nombre de Area"
        },
        errorClass: "is-invalid",
        validClass: "is-valid",

        highlight: function(element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            
          },
          unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
          },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $('#btn_actualizar, #btn_guardar').click(function(event) {
        event.preventDefault();
        if ($('#rolesForm').valid()) {
            $('#rolesForm').submit();
        }
    });

    // Remove is-invalid class on focus
    $('input').focus(function() {
        $(this).removeClass('is-invalid');
    });

});
