$(document).ready(function () {

    function validar() {
        console.log("función de validación");
        if (document.getElementById("nombre_u").value.length < 3) {
            $("#nombre_u").addClass("is-invalid");
            $("#nombre_u").after($("<span class='error text-danger'>El nombre no puede ser menor a 3 caracteres</span>"));
            event.preventDefault();
            return false;
        }


        if (document.getElementById("apellido_u").value.length < 3) {
            $("#apellido_u").addClass("is-invalid");
            $("#apellido_u").after($("<span class='error text-danger'>El apellido no puede ser menor a 3 caracteres</span>"));
            event.preventDefault();
            return false;
        }

        if (document.getElementById("telefono").value.length < 11 || document.getElementById("telefono").value.length > 11) {
            $("#telefono").addClass("is-invalid");
            $("#telefono").after($("<span class='error text-danger'>Su teléfono no puede ser menor ni mayor a 11 dígitos</span>"));
            event.preventDefault();
            return false;
        }

        if (document.getElementById("correo_electronico").value.length < 10) {
            $("#correo_electronico").addClass("is-invalid");
            $("#correo_electronico").after($("<span class='error text-danger'>Su correo electrónico no puede ser menor a 10 caracteres</span>"));
            event.preventDefault();
            return false;
        } else if (document.getElementById('correo_electronico').value.length == '') {

            $("#correo_electronico").addClass("is-invalid");
            $("#correo_electronico").after($("<span class='error text-danger'>Su correo electrónico no puede estar vacío</span>"));
            event.preventDefault();
            return false;
        }

        return true;
    }


    let form_submit = document.getElementById("form_newuser");

    form_submit.addEventListener("submit", validar, false);




});