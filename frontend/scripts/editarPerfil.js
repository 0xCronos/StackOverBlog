
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9_\-]+\.[a-zA-Z0-9_\.]+$/;
var exprPw = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

$(document).ready(function(){
    $("#editPerfilButton").click(function(){
        var nombre = $("#nombreEditarPerfil").val();
        var correo = $("#disabledTextInput").val();
        var password = $("#passwordEditarPerfil").val();
        var description = $("#descriptionEditarPerfil").val();

        if(nombre == ""){
            $("#mensajeNombreEditarPerfil1").fadeIn();
            return false;
        }else{
            $("#mensajeNombreEditarPerfil1").fadeOut();
            if(correo == "" || !expr.test(correo)){
                $("#mensajeEmailEditarPerfil1").fadeIn();
                return false;
            }else{
                $("#mensajeEmailEditarPerfil1").fadeOut();
                if(password == ""){
                    $("#mensajePasswordEditarPerfil1").fadeIn();
                    return false;
                }else{
                    $("#mensajePasswordEditarPerfil1").fadeOut();
                    if(!exprPw.test(password)){
                        $("#mensajePasswordEditarPerfil2").fadeIn();
                        return false;
                    }else{
                        $("#mensajePasswordEditarPerfil2").fadeOut();
                        if(description == "" || description.length > 2040){
                            $("#mensajeDescriptionEditarPerfil1").fadeIn();
                            return false;
                        }else{
                            $("#mensajeDescriptionEditarPerfil1").fadeOut();
                        }
                    }
                }
            }
        }


    });
});
