
var barraIzquierdaActiva = true;
var tamaño = 16; //fuente tamaño 16, ocupado en la funcion cambiarTexto()
var activo = 1;	//Bandera, ocupado en la funcion cambiarFondo()

function cambiarTexto(valor){
	tamaño = tamaño + valor;
	$("body").css("font-size", tamaño);
}

function cambiarfondo(){
	if(activo){
		$("body").css("background-color", "black");
		$('body').css("transition", "2s");
		$("body").css("color", "white");
		activo = 0;

	}else{
		$("body").css("background-color", "white");
		$('body').css("transition", "2s");
		$("body").css("color", "black");
		activo = 1;
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
                window.location = "/blog-prod/frontend/index.php?pagina=administrador";
                
            }else{
                alert("no funciona");
                $("input[type=password]").val('');
                $("#respuesta").html("Nombre de usuario y/o contraseña incorrecto");
            }
        })
    })

    //AJAX CREAR NOTICIA
    $("#createNewForm").submit(function(e){
        e.preventDefault();
        var form = $('#createNewForm')[0];
        var data = new FormData(form);
        $.ajax({
<<<<<<< Updated upstream
            url: '../backend/controllers/addNewCtr.php',
            method: 'POST',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            data: data
=======
            url: '../backend/controllers/addContactCtr.php',
            type: 'POST',
            dataType: 'text',
            data: $(".contactForm").serialize()

>>>>>>> Stashed changes
        })
        .done(function(data){
            console.log(data);
            if(data == "noticia agregada con exito"){
                alert("noticia agregada con exito");
                window.location.reload();
            }else{
                alert("no funciona");
                //$("#respuesta").html("Nombre de usuario y/o contraseña incorrecto");
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