$(function(){

    $('#loginForm').validate({
        rules:{
            email: {required: true, email: true, minlength: 5, maxlength: 255},
            password: {required: true, maxlength: 126}
        },
        messages:{
            email: {required: "Ingrese su correo", email: "El formato de email es incorrecto", minlength: "El largo mínimo son 5 caracteres", maxlength: "El largo máximo son 255 caracteres"},
            password: {required: "Ingrese su contraseña", maxlength: "El largo máximo son 126 caracteres"}
            
        }
    });

    $('#registerForm').validate({
        rules:{
            fullname: {required: true, minlength: 4, maxlength: 100},
            email: {required: true, email: true, minlength: 5, maxlength: 255},
            password: {required: true, minlength: 8, maxlength: 126},
            confirm_password: {equalTo: "#registerPassword"},
            description: {maxlength: 2048}
        },
        messages:{
            fullname: {required: "Ingresa un nombre o alias", minlength: "El largo mínimo son 4 caracteres", maxlength: "El largo máximo son 100 caracteres"},
            email: {required: "Ingrese un correo", email: "El formato de email es incorrecto", minlength: "El largo mínimo son 5 caracteres", maxlength: "El largo máximo son 255 caracteres"},
            password: {required: "Ingrese su contraseña", minlength:"La contraseña debe tener minimo 8 caracteres", maxlength: "El largo máximo son 126 caracteres"},
            confirm_password: {equalTo: "Las contraseñas no coinciden"},
            description: {maxlength: "El largo máximo son 2048 caracteres"}
        }
    });

    $('#contactForm').validate({
        rules:{
            contact_fullname: {required: true, minlength: 4, maxlength: 100},
            contact_email: {required: true, email: true, minlength: 5, maxlength: 255},
            contact_text: {maxlength: 2048}
        },
        messages:{
            contact_fullname: {required: "Ingresa un nombre o alias", minlength: "El largo mínimo son 4 caracteres", maxlength: "El largo máximo son 100 caracteres"},
            contact_email: {required: "Ingrese un correo", email: "El formato de email es incorrecto", minlength: "El largo mínimo son 5 caracteres", maxlength: "El largo máximo son 255 caracteres"},
            contact_text: {maxlength: "El largo máximo son 2048 caracteres"}
        }
    });

    $('#createNewForm').validate({
        rules:{
            new_title: {required: true, maxlength: 120},
            new_body: {required: true, maxlength: 2048}
        },
        messages:{
            new_title: {required: "Ingresa un titulo para la noticia", maxlength: "El largo máximo son 120 caracteres"},
            new_body: {required:"Debe incluir un cuerpo en la noticia", maxlength: "El largo máximo son 2048 caracteres"}
        }
    });

    $('#editProfile').validate({
        rules:{
            user_fullname: {required: true, minlength: 4, maxlength: 100},
            user_password: {minlength: 8, maxlength: 126},
            user_confirm_password: {equalTo: "#editPassword"},
            user_description: {maxlength: 2048}
        },
        messages:{
            user_fullname: {required: "Ingresa un nombre o alias", minlength: "El largo mínimo son 4 caracteres", maxlength: "El largo máximo son 100 caracteres"},
            user_password: {minlength:"La contraseña debe tener minimo 8 caracteres", maxlength: "El largo máximo son 126 caracteres"},
            user_confirm_password:{equalTo: "Las contraseñas no coinciden"},
            user_description: {maxlength: "El largo máximo son 2048 caracteres"}
        }
    });

    $('#categoryForm').validate({
        rules:{
            category_name: {required: true, minlength: 1, maxlength: 35}
        },
        messages:{
            category_name: {required: "Ingresa un nombre para la categoría", minlength: "El largo mínimo es de 1 caracter", maxlength: "El largo máximo son 35 caracteres"}
        }
    });
    


})