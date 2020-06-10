
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9_\-]+\.[a-zA-Z0-9_\.]+$/;

$(document).ready(function(){
    $("#loginResponse").click(function(){
        var correo = $("#emailInicioSesion").val();
        var password = $("#passwordInicioSesion").val();

        if(correo == ""){
            $("#mensajeEmailInicioSesion1").fadeIn();
            return false;
        }else{
            $("#mensajeEmailInicioSesion1").fadeOut();
            if(!expr.test(correo)){
                $("#mensajeEmailInicioSesion2").fadeIn();
                return false;
            }
            else{
                $("#mensajeEmailInicioSesion2").fadeOut();
                if(password == ""){
                    $("#mensajePwIniciarSesion1").fadeIn();
                    return false;
                }else{
                    $("#mensajePwIniciarSesion1").fadeOut();
                }
            }
        }

    });
});
