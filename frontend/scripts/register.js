
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9_\-]+\.[a-zA-Z0-9_\.]+$/;
var exprPw = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

$(document).ready(function(){
    $("#registerForm").click(function(){
        var nombre = $("#nombre").val();
        var correo = $("#email").val();
        var password = $("#password").val();
        var description = $("#description").val();

        if(nombre == ""){
            $("#mensaje1").fadeIn();
            return false;
        }else{
            $("#mensaje1").fadeOut();
            if(correo == "" || !expr.test(correo)){
                $("#mensaje2").fadeIn();
                return false;
            }else{
                $("#mensaje2").fadeOut();
                if(password == ""){
                    $("#mensaje3").fadeIn();
                    return false;
                }else{
                    $("#mensaje3").fadeOut();
                    if(!exprPw.test(password)){
                        $("#mensajePw").fadeIn();
                        return false;
                    }else{
                        $("#mensajePw").fadeOut();
                        if(description == "" || description.length > 2040){
                            $("#mensaje4").fadeIn();
                            return false;
                        }else{
                            $("#mensaje4").fadeOut();
                        }
                    }
                }
            }
        }


    });
});
