$(document).ready(function () {

    function validar() {


        if (document.getElementById("departamento").value == 'Seleccione el departamento') {
            $("#departamento").addClass("is-invalid");
            $("#departamento").after($("<span class='error text-danger'>Seleccione el departamento</span>"));
            event.preventDefault();
            return false;
        }
        if (document.getElementById("piso").value == 'Seleccione el piso') {
            $("#piso").addClass("is-invalid");
            $("#piso").after($("<span class='error text-danger'>Seleccione el piso</span>"));
            event.preventDefault();
            return false;
        }

        if (document.getElementById("nombre_solicitante").value.length < 3) {
            $("#nombre_solicitante").addClass("is-invalid");
            $("#nombre_solicitante").after($("<span class='error text-danger'>Su nombre no puede ser menor a 3 caracteres</span>"));
            event.preventDefault();
            return false;
        }

        if (document.getElementById("telefono").value.length < 11) {
            $("#telefono").addClass("is-invalid");
            $("#telefono").after($("<span class='error text-danger'>Su teléfono no puede ser menor a 11 caracteres</span>"));
            event.preventDefault();
            return false;
        }

        if (document.getElementById("descripcion").value.length < 10) {
            $("#descripcion").addClass("is-invalid");
            $("#descripcion").after($("<span class='error text-danger'>Su descripción no puede ser menor a 10 caracteres</span>"));
            event.preventDefault();
            return false;
        }

        return true;
    }


    let form_submit = document.getElementById("form_solicitud");

    form_submit.addEventListener("submit", validar, false);




});