app.controller('controladorInicio', function($scope, $http){
    $scope.section = "";
    $scope.targetingNew = false;
    $scope.news = [];

    $scope.loadLastNews = function(amount){
        $scope.section = "Ultimas noticias";
        $scope.targetingNew = false;
        $http.get("../backend/controllers/getNewsCtr.php?amount="+amount)
        .then(function (response){
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }

    $scope.targetNew = function(id){
        $scope.section = "";
        $scope.targetingNew = true;
        $http.get("../backend/controllers/getNewsCtr.php?id="+id)
        .then(function (response){
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }
    $scope.loadLastNews(5);
});

app.controller('controladorNoticias', function($scope, $http){
    $scope.section = "";
    $scope.targetingNew = false;
    $scope.news = [];

    $scope.loadAllNews = function(){
        $scope.section = "Noticias";
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
        $scope.section = "";
        $scope.targetingNew = true;
        $scope.section
        $http.get("../backend/controllers/getNewsCtr.php?id="+id)
        .then(function (response) {
            $scope.news = response.data;
        }
        ,function(error){
            console.warn(error);
        })
    }
    $scope.loadAllNews();
});

app.controller('controladorCrudNoticias', function($scope, $http){
    $scope.news = [];

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

});

app.controller('controladorCrudCategorias', function($scope, $http){
    $scope.categories = [];
    
    $scope.deleteCategory = function(id) {
        //console.log(id);
        var elemento = "."+ id;
        //console.log(elemento);
        //console.log($(elemento).val());
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
            //console.log(response.data);
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

});