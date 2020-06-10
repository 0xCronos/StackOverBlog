app.controller('controladorInicio', function($scope, $http){
    $scope.section = ""
    $scope.targetingNew = false;
    $scope.news = [];

    //carga usuario logeado    
    $scope.user_id;
    $http.get("../backend/controllers/getCurrentUserIdCtr.php")
    .then(function (response) {
        $scope.user_id = response.data.user_id;
    }
    ,function(error) {
        console.warn(error);
    })

    $scope.loadLastNews = function(amount){
        $scope.targetingNew = false;
        $scope.section = "Ultimas noticias"
        $http.get("../backend/controllers/getNewsCtr.php?amount="+amount)
        .then(function (response){
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }

    $scope.targetNew = function(id){
        $scope.section = ""
        $scope.targetingNew = true;
        $http.get("../backend/controllers/getNewsCtr.php?id="+id)
        .then(function (response){
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }
    
    $scope.guardarRating = function (rating,id_noticia) {
        $.ajax({
            url: '../backend/controllers/addRatingCtr.php',
            type: 'POST',
            dataType: 'text',
            data: "rating_value="+rating+"&new_id="+id_noticia
        })
        .done(function (data) {
            if(data=="El usuario ya voto"){
                alert(data);
            }else{
                alert("votacion exitosa");
            }
        })
    }
        
    $scope.comentar = function(id){
        console.log($scope.user_id)
        console.log(id)

        if($scope.user_id == 0){
            alert("Inicia sesión primero!");
            return;
        }

        $.ajax({
            url: '../backend/controllers/addCommentCtr.php',
            type: 'POST',
            dataType: 'text',
            data: "user_id="+$scope.user_id+"&new_id="+id+"&comment_text="+$(".caja-comentarios-"+id).val()
        })
        .done(function (data) {
            window.location.reload();
        })
    }
        
    $scope.loadLastNews(5);
});

app.controller('controladorNoticias', function($scope, $http){
    $scope.section = ""
    $scope.targetingNew = false;
    $scope.news = [];
    
    //carga usuario logeado    
    $scope.user_id;
    $http.get("../backend/controllers/getCurrentUserIdCtr.php")
    .then(function (response) {
        $scope.user_id = response.data.user_id;
    }
    ,function(error) {
        console.warn(error);
    });

    $scope.loadAllNews = function(){
        $scope.section = "Noticias"
        $scope.targetingNew = false;
        $http.get("../backend/controllers/getNewsCtr.php")
        .then(function (response) {
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }

    $scope.targetNew = function(id){
        $scope.section = ""
        $scope.targetingNew = true;
        $http.get("../backend/controllers/getNewsCtr.php?id="+id)
        .then(function (response) {
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }
    
    $scope.guardarRating = function (rating,id_noticia) {
        $.ajax({
            url: '../backend/controllers/addRatingCtr.php',
            type: 'POST',
            dataType: 'text',
            data: "rating_value="+rating+"&new_id="+id_noticia
        })
        .done(function (data) {
            if(data=="El usuario ya voto"){
                alert(data);
            }else{
                alert("votacion exitosa");
            }
        })
    }
        
    $scope.comentar = function(id){
        console.log($scope.user_id)
        console.log(id)

        if($scope.user_id == 0){
            alert("Inicia sesión primero!");
            return;
        }

        $.ajax({
            url: '../backend/controllers/addCommentCtr.php',
            type: 'POST',
            dataType: 'text',
            data: "user_id="+$scope.user_id+"&new_id="+id+"&comment_text="+$(".caja-comentarios-"+id).val()
        })
        .done(function(data){
            window.location.reload();
        })
    }

    $scope.loadAllNews();
});

app.controller("controladorNuevaNoticia",function($scope, $http){
    $scope.categorias = [];
    $http.get("../backend/controllers/getCategoriesCtr.php")
    .then(function(response){
        $scope.categorias = response.data;
    })
})

app.controller('controladorCrudNoticias', function($scope, $http){
    $scope.news = [];
    $scope.categorias = [];

    $http.get("../backend/controllers/getCategoriesCtr.php")
        .then(function (response) {
            $scope.categorias = response.data;
        })


    $scope.eliminarComentario = function(id){
        $.ajax({
            url: '../backend/controllers/deleteCommentCtr.php',
            type: 'POST',
            dataType: 'text',
            data: "comment_id="+id
        })
        .done(function (data) {
            window.location.reload();
        })

    }

    $scope.loadAllNews = function(){
        $http.post("../backend/controllers/getNewsCtr.php")
        .then(function(response){
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }
    $scope.loadAllNews();

    //AJAX ELIMINAR NOTICIA
    $scope.eliminarNoticia = function (id) {
        var elemento = ".idNoticia-"+ id;
        $.ajax({
            url: '../backend/controllers/deleteNewCtr.php',
            type: 'POST',
            dataType: 'text',
            data: $(elemento).serialize()
        })
        .done(function (data) {
            window.location.reload();
        })
    }

    //AJAX CREAR NOTICIA
    $(document).ready(function(){
        $("#createNewForm").submit(function(e){
            e.preventDefault();
            var form = $('#createNewForm')[0];
            var data = new FormData(form);
            $.ajax({
                url: '../backend/controllers/addNewCtr.php',
                method: 'POST',
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                data: data
            })
            .done(function(data){
                console.log(data);
                if(data == "1"){
                    alert("noticia agregada con exito");
                    window.location.reload();
                }else{
                    alert("No se pudo crear la noticia");
                    //$("#respuesta").html("Nombre de usuario y/o contraseña incorrecto");
                }
            })
        })
    });

    //AJAX MODIFICAR NOTICIA
    $scope.actualizarNoticia = function(id) {
        var formEspecifico = ".noticia-" + id;
        var form = $(formEspecifico)[0];
        var dataTransformado = new FormData(form);
        console.log(dataTransformado);
        $.ajax({
            url: "../backend/controllers/modifyNewCtr.php",
            method: "POST",
            enctype: "multipart/form-data",
            processData: false,
            contentType: false,
            data: dataTransformado
        })
        .done(function (data) {
            if(data!="1"){
                alert(data);
            }else{
                window.location.reload();
            }

        })
    }
});

app.controller('controladorCrudCategorias', function($scope, $http){
    $scope.categories = [];
   
    $scope.modificarCategoria = function(id){
        var conexion = "#c-" + id;
        var nombre  = $(conexion).val();
        console.log("category_id="+id+"&category_name="+nombre);
        $.ajax({
            url: '../backend/controllers/modifyCategoryCtr.php',
            type: 'POST',
            dataType: 'text',
            data: "category_id="+id+"&category_name="+nombre
        })
        .done(function (data) {
            window.location.reload();
        })
    }

    $scope.deleteCategory = function(id) {
        var elemento = "."+ id;
        $.ajax({
            url: '../backend/controllers/deleteCategoryCtr.php',
            type: 'POST',
            dataType: 'text',
            data: $(elemento).serialize()
        })
        .done(function (data) {
            if(data == "1"){
                window.location.reload();
            }else{
                alert("Primero borra las noticias de esta categoría");
            }

        })
    }

    $scope.getCategories = function(){
        $http.get("../backend/controllers/getCategoriesCtr.php")
        .then(function(response){
            $scope.categories = response.data;
        })
    }

    $(document).ready(function () {
        $(".categoryForm").submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '../backend/controllers/addCategoryCtr.php',
                type: 'POST',
                dataType: 'text',
                data: $(".categoryNameInput").serialize()
            })
            .done(function (data) {
                if(data == "1"){
                    window.location.reload();
                }else{
                    alert("ya existe una categoria con este nombre");
                }
            })
        })
    })
    $scope.getCategories();
});

app.controller('controladorCrudContactos', function($scope, $http){
    $(document).ready(function () {

        $scope.contactos = [];
        $http.get("../backend/controllers/getContactsCtr.php")
        .then(function (response) {
            $scope.contactos = response.data;
        }
        ,function(error){
            console.warn(error);
        })

        $scope.eliminarContacto = function (id) {
            $.ajax({
                url: '../backend/controllers/deleteContactCtr.php',
                type: 'POST',
                dataType: 'text',
                data: 'contact_id=' + id
            })
            .done(function (data) {
                window.location.reload();
            })
        }
    })
})

app.controller('controladorBarraDerecha', function($scope, $http){
    $scope.owner = {};
    $scope.bestRatedNews = [];

    $scope.loadOwner = function(){
        $http.get("../backend/controllers/getOwnerCtr.php")
        .then(function (response){
            $scope.owner = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }

    $scope.loadBestRatedNews = function(){
        $http.get("../backend/controllers/get5BestRatedNewsCtr.php")
        .then(function (response){
            $scope.bestRatedNews = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }

    $scope.loadOwner();
    $scope.loadBestRatedNews();
})

app.controller('controladorPerfil', function($scope, $http){
    $scope.userData = [];

    $scope.loadProfile = function(id){
        $http.get("../backend/controllers/getProfileCtr.php?user_id="+id)
        .then(function (response){
            $scope.userData = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }


});

app.controller("modificarPerfil",function ($scope,$http) {

    $("form.editar_perfil").submit(function () {


        var formEspecifico = $(".editar_perfil")[0];
        console.log($(".editar_perfil")[0]);
        var form = $(formEspecifico)[0];
        var dataTransformado = new FormData(form);
        console.log(dataTransformado);
        $.ajax({
            url: "../backend/controllers/modifyProfileCtr.php",
            method: "POST",
            enctype: "multipart/form-data",
            processData: false,
            contentType: false,
            data: dataTransformado
        })
            .done(function (data) {
                if(data!="1"){
                    alert(data);
                }else{
                    window.location.assign("index.php?pagina=miPerfil");
                }

            })


    })







})