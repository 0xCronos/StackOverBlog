app.controller('controladorInicio', function($scope, $http){
    $scope.section = "Ultimas noticias"
    $scope.targetingNew = false;
    $scope.news = [];

    $scope.loadLastNews = function(amount){
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
    $scope.section = "Noticias"
    $scope.targetingNew = false;
    $scope.news = [];

    $scope.loadAllNews = function(){
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
        $scope.targetingNew = true;
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
});

app.controller('controladorCrudCategorias', function($scope, $http){

});

app.controller('controladorCrudContactos', function($scope, $http){

});