$(document).ready(function() {
$('#empleadoForm').validate({
        ignore: [],
        rules: {
            txt_nombre: "required",
            txt_correo: {
                required: true,
                email: true
            },
            select_sexo: "required",
            select_area: "required",
            txt_descripcion: "required",
            'roles[]': {
                required: true,
                minlength: 1,
                maxlength: 1
            }
        },
        messages: {
            txt_nombre: "Por favor, ingrese su nombre",
            txt_correo: {
                required: "Por favor, ingrese su correo electrónico",
                email: "Por favor, ingrese un correo electrónico válido"
            },
            select_sexo: "Por favor, seleccione su sexo",
            select_area: "Por favor, seleccione un área",
            txt_descripcion: "Por favor, ingrese una descripción",
            'roles[]': {
                required: "Por favor, seleccione un rol",
                minlength: "Debe seleccionar un rol",
                maxlength: "Solo puede seleccionar un rol"
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorPlacement: function(error, element) {
            if (element.attr("name") == "select_sexo") {
                error.insertAfter(element.closest(".form-group").find(".radio:last"));
            } else if (element.attr("name") == "roles[]") {
                error.insertAfter(element.closest(".form-group").find(".checkbox:last"));
            } else {
                error.insertAfter(element);
            }
        },
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
        if ($('#empleadoForm').valid()) {
            $('#empleadoForm').submit();
        }
    });

    // Remove is-invalid class on focus
    $('input, textarea, select').focus(function() {
        $(this).removeClass('is-invalid');
    });

    $('input[name="select_sexo"]').click(function() {
        $('input[name="select_sexo"]').removeClass('is-invalid');
    });

    $('input[name="roles[]"]').click(function() {
        $('input[name="roles[]"]').removeClass('is-invalid');
    });
});
