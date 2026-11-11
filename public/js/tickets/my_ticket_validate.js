$(document).ready(function()  {
    function validar(){
        console.log("función de validación");

        if(document.getElementById("descripcion").value == null || document.getElementById("descripcion").value == ''){
            $("#descripcion").addClass("is-invalid");
            $("#descripcion").after($("<span class='error text-danger'>La descripción no puede estar vacía.</span>"));
            event.preventDefault();
            return false;
        }
        return true;
        
    }
    let form_submit = document.getElementById("form_resolve");
    form_submit.addEventListener("submit", validar, false);
     }

)