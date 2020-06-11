

$(document).ready(function(){
    $("#botonModificarNoticia").click(function(){
        var tituloAModificar = $("#modificarTitulo").val();
        var cuerpoNoticia = $("#cuerpoNoticiaAModificar").val();
        console.log(tituloAModificar);
        if(tituloAModificar == ""){
            $("#mensajeTituloAModificar").fadeIn();
            return false;
        }else{
            $("#mensajeTituloAModificar").fadeOut();
            if(cuerpoNoticia == ""){
                $("#mensajeCuerpoNoticiaAModificar").fadeIn();
                return false;
            }else{
                $("#mensajeCuerpoNoticiaAModificar").fadeOut();
            }
        }
    });
});
