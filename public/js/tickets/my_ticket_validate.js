$(document).ready(function()  {
    function validar(){
        console.log("función de validación");

        if(document.getElementsByClassName("descripcion").value == null || document.getElementsByClassName("descripcion").value == ''){
            $(".descripcion").addClass("is-invalid");
            $(".descripcion").after($("<span class='error text-danger'>La descripción no puede estar vacía.</span>"));
            event.preventDefault();
            return false;
        }
        return true;
        
    }
    let form_submit = document.getElementById("form_resolve");
    let form_esc = document.getElementById("form_escala");
    console.log(form_submit);
    console.log(form_esc);
    form_submit.addEventListener("submit", validar, false);
    form_esc.addEventListener("submit", validar, false);
     }

    );