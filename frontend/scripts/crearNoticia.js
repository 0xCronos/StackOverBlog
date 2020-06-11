

$(document).ready(function(){
    $("#botonCrearNoticia").click(function(){
        var titulo = $("#tituloCrearNoticia").val();
        var cuerpoNoticia = $("#cuerpoNoticiaCrearNoticia").val();

        if(titulo == ""){
            $("#mensajeTitulo1").fadeIn();
            return false;
        }else{
            $("#mensajeTitulo1").fadeOut();
            if(cuerpoNoticia == ""){
                $("#mensajeCuerpoNoticia").fadeIn();
                return false;
            }else{
                $("#mensajeCuerpoNoticia").fadeOut();
            }
        }
    });
});
