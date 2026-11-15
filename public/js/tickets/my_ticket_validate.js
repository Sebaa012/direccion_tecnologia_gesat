$(document).ready(function() {
    function validar(event) {
        console.log("función de validación");

        const form = event.currentTarget;
        const descripcion = form.elements["descripcion"] || form.querySelector(".descripcion") || document.querySelector(".descripcion");

        $(descripcion).siblings(".error").remove();
        $(descripcion).removeClass("is-invalid");

        if (!descripcion || descripcion.value == null || descripcion.value.trim() === '') {
            $(descripcion).addClass("is-invalid");
            $(descripcion).after($("<span class='error text-danger d-block'>La descripción no puede estar vacía.</span>"));
            event.preventDefault();
            return false;
        }
        return true;
    }

    const forms = document.querySelectorAll("#form_resolve, #form_escala");
    forms.forEach(function(form) {
        form.addEventListener("submit", validar, false);
    });
});