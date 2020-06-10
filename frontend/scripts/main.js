
var barraIzquierdaActiva = true;
var tamaño = 16; //fuente tamaño 16, ocupado en la funcion cambiarTexto()
var tamaño2 = 20;
var tamaño3 = 16;
var tamaño4 = 40;
var tamaño5 = 24;
var activo = 1;	//Bandera, ocupado en la funcion cambiarFondo()

function cambiarTexto(valor){
    tamaño = tamaño + valor;
    tamaño2 = tamaño2 + valor;
    tamaño3 = tamaño3 + valor;
    tamaño4 = tamaño4 + valor;
    tamaño5 = tamaño5 + valor;
    $("body").css("font-size", tamaño);
    $(".letraBlanca").css("font-size",tamaño);
    $(".letraIzquierda").css("font-size",tamaño2);
    $(".letraSuperior").css("font-size",tamaño3);
    $(".letraNoticia").css("font-size",tamaño4);
    $(".letraDerecha").css("font-size",tamaño5);
}

function cambiarfondo(){
    if(activo){
        
     $("body").css("background","#4b6cb7");
     $("body").css("background","-webkit-linear-gradient(to right, #182848, #4b6cb7)");
     $("body").css("background","linear-gradient(to right, #182848, #4b6cb7)");

     $(".barraSuperior").css("background","#232526");
     $(".barraSuperior").css("background","-webkit-linear-gradient(to right, #414345, #232526)");
     $(".barraSuperior").css("background","linear-gradient(to right, #414345, #232526)");    


     $(".barraIzquierda").css("background","#485563");
     $(".barraIzquierda").css("background","-webkit-linear-gradient(to bottom, #29323c, #485563)");
     $(".barraIzquierda").css("background","linear-gradient(to bottom, #29323c, #485563)");


     $(".barraDerecha").css("background","#485563");
     $(".barraDerecha").css("background","-webkit-linear-gradient(to bottom, #29323c, #485563)");
     $(".barraDerecha").css("background","linear-gradient(to bottom, #29323c, #485563)");


     $(".seccionNoticia").css("background","#2b5876");
     $(".seccionNoticia").css("background","-webkit-linear-gradient(to right, #4e4376, #2b5876)");
     $(".seccionNoticia").css("background","linear-gradient(to right, #4e4376, #2b5876)");


     $(".noticia").css("background","#485563");
     $(".noticia").css("background","-webkit-linear-gradient(to right, #29323c, #485563");
     $(".noticia").css("background","linear-gradient(to right, #29323c, #485563)");


     $(".letraBlanca").css("color","#EEE");
     $(".letraNegra").css("color","#EEE");
     $(".letraNoticia").css("color","#EEE");
     activo=0;

    }else{
      
      $("body").css("background","radial-gradient(circle 1224px at 10.6% 8.8%,  rgba(255,255,255,1) 0%, rgba(153,202,251,1) 100.2%)"); 
      $(".barraSuperior").css("background","linear-gradient( 99.6deg,  rgba(112,128,152,1) 10.6%, rgba(242,227,234,1) 32.9%, rgba(234,202,213,1) 52.7%, rgba(220,227,239,1) 72.8%, rgba(185,205,227,1) 81.1%, rgba(154,180,212,1) 102.4% )");
      $(".barraIzquierda").css("background","radial-gradient( circle farthest-corner at 10% 20%,  rgba(51,51,81,1) 0%, rgba(34,72,86,1) 90% )");
      $(".barraDerecha").css("background","radial-gradient( circle farthest-corner at 10% 20%,  rgba(51,51,81,1) 0%, rgba(34,72,86,1) 90% )");
      $(".seccionNoticia").css("background","linear-gradient(to right, #ff4b1f 0%, #ff9068 51%, #ff4b1f 100%)");
      $(".noticia").css("background","white");
      
      $(".letraBlanca").css("color","white");
      $(".letraNegra").css("color","black");
      $(".letraNoticia").css("color","black");
      activo=1;
    }    
}
function botonBarraIzquierda(){
	if(barraIzquierdaActiva){
		$('.barraIzquierda').css("display", "none");
		barraIzquierdaActiva = false;
	}else{
		$('.barraIzquierda').css("display", "inline");
		barraIzquierdaActiva = true;
	}
}

function expandComments(obj){
    var commentsBox = $(obj).next(commentsBox);
    if(commentsBox.children().hasClass("d-none")){
        commentsBox.children().removeClass("d-none");
    }else{
        commentsBox.children().toggleClass("d-none");
    }
}

$(".modifyNewForm").ready(function(){
    $('.test').click(function(){
        alert("hoaaaa");
    })
});

$(document).ready(function(){

    //AJAX INICIO DE SESION
    $(".loginForm").submit(function (e) {
        e.preventDefault();

        var correo = $("input[type=email]").val();
        var clave = $("input[type=password]").val();

        $.ajax({
            url: '../backend/controllers/loginCtr.php',
            method: 'POST',
            dataType: 'text',
            data: $(".loginForm").serialize()
        })
        .done(function (data) {
            console.log(data);
            if(data == "user"){
                window.location = "../frontend/index.php?pagina=inicio";
            }else if(data == "admin"){
                window.location = "index.php?pagina=administrador";
                
            }else{
                alert("no funciona");
                $("input[type=password]").val('');
                $("#respuesta").html("Nombre de usuario y/o contraseña incorrecto");
            }
        })
    })

   //AJAX ENVIAR CONTACTO
    $(".contactForm").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '../backend/controllers/addContactCtr.php',
            type: 'POST',
            dataType: 'text',
            data: $(".contactForm").serialize()

        })
        .done(function (data) {
            if(data == "1"){
                alert("Enviado");
            }else{
                alert(data);
            }
        })
    }) 

    //abre o cierra barra lateral izquierda
	$('#botonBarraIzquierda').click((elem) => botonBarraIzquierda());

	//llama a la etiqueta #mas y va a leer el elemento click
	$("#mas").click(function(){
		if (tamaño >= 32) return;
		//Al hacer click el va a invocar una funciona que se llama "cambiarTexto(1)"
		cambiarTexto(1);

	});

	//llama a la etiqueta #menos y va a leer el elemento click
	$("#menos").click(function(){
		if (tamaño <= 10) return;
		//Al hacer click el va a invocar una funciona que se llama "cambiarTexto(-1)
		cambiarTexto(-1);

	});

	$("#tiempo").click(function(){
		cambiarfondo();
    });

    $('#formulario').submit(function () {
        validar();
    });
});