$(document).ready(function() {
    function validar(event) {
        console.log("función de validación");

        const descripcion = document.querySelector(".descripcion");
        if (!descripcion || descripcion.value == null || descripcion.value === '') {
            $(".descripcion").addClass("is-invalid");
            $(".descripcion").after($("<span class='error text-danger'>La descripción no puede estar vacía.</span>"));
            event.preventDefault();
            return false;
        }
        return true;
    }

    const form_submit = document.getElementById("form_resolve");
    const form_esc = document.getElementById("form_escala");

    if (form_submit) {
        form_submit.addEventListener("submit", validar, false);
    }
    if (form_esc) {
        form_esc.addEventListener("submit", validar, false);
    }
});