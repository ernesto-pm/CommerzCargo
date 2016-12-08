var FormValidationMd = function() {
    var e = function() {
            var e = $("#form_sample_1"),
                r = $(".alert-danger", e),
                i = $(".alert-success", e);
            e.validate({
                errorElement: "span",
                errorClass: "help-block help-block-error",
                focusInvalid: !1,
                ignore: "",
                messages: {
                    name: {
                        required: jQuery.validator.format("El nombre es requerido")
                    },
                    lastName: {
                        required: jQuery.validator.format("El apellido es requerido")
                    },
                    email: {
                        email: jQuery.validator.format("Ingresa un email con formato válido"),
                        required: jQuery.validator.format("Ingresa tu email")
                    },
                    personalPhoneNumber: {
                        required: jQuery.validator.format("Ingresa tu numero de teléfono"),
                        number: jQuery.validator.format("El teléfono solo debe contener dígitos")
                    },
                    officePhoneNumber: {
                        required: jQuery.validator.format("Ingresa tu numero de teléfono"),
                        number: jQuery.validator.format("El teléfono solo debe contener dígitos")
                    },
                    state: {
                        required: jQuery.validator.format("Especifica tu estado")
                    },
                    city: {
                        required: jQuery.validator.format("Especifica tu ciudad")
                    },
                    password: {
                        pwcheck: jQuery.validator.format("Se necesita una minúscula, un dígito"),
                        minlength: jQuery.validator.format("Se necesitan 8 dígitos mínimos")
                    },
                    password_confirmation: {
                        equalTo: jQuery.validator.format("Introduce la misma contraseña")
                    }

                },
                rules: {
                    name: {
                        required: !0
                    },
                    lastName: {
                        required: !0
                    },
                    email: {
                        required: !0,
                        email: !0
                    },
                    personalPhoneNumber: {
                        required: !0,
                        number: !0
                    },
                    officePhoneNumber: {
                        required: !0,
                        number: !0
                    },
                    state :{
                        required: !0
                    },
                    city :{
                        required: !0
                    },
                    password: {
                        pwcheck: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        equalTo : "#password"
                    }
                },
                invalidHandler: function(e, t) {
                    i.hide(), r.show(), App.scrollTo(r, -200)
                },
                errorPlacement: function(e, r) {
                    r.is(":checkbox") ? e.insertAfter(r.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline")) : r.is(":radio") ? e.insertAfter(r.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline")) : e.insertAfter(r)
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
                success: function(e) {
                    e.closest(".form-group").removeClass("has-error")
                },
                submitHandler: function(e) {
                    console.log("Submiteando la forma");
                    e.submit();
                    i.show(), r.hide()
                }
            })
        }
    return {
        init: function() {
            e()
        }
    }
}();
jQuery(document).ready(function() {
    FormValidationMd.init()
    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
    });
});