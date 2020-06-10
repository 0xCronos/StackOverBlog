
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9_\-]+\.[a-zA-Z0-9_\.]+$/;
var exprPw = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

$(document).ready(function(){
    $("#contactForm").click(function(){
        var nombre = $("#nombreContacto").val();
        var correo = $("#emailContacto").val();
        var description = $("#mensajeContacto").val();
        if(nombre == ""){
            $("#mensajeNombreContacto").fadeIn();
            return false;
        }else{
            $("#mensajeNombreContacto").fadeOut();
            if(correo == "" || !expr.test(correo)){
                $("#mensajeCorreoContacto").fadeIn();
                return false;
            }else{
                $("#mensajeCorreoContacto").fadeOut();
                if(description == "" || description.length > 2040){
                    $("#errorMensajeContacto").fadeIn();
                    return false;
                }else{
                    $("#errorMensajeContacto").fadeOut();
                }

            }
        }


    });
});
