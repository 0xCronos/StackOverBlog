<?php
require_once "../backend/models/userSession.php";
$userSession = new UserSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StackOverBlog</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body ng-app="blog-app">

    <!-- barras -->
    <?php
    require_once "views/templates/barraSuperior.phtml";

    //Vistas
    if(isset($_GET['pagina'])){
        if($_GET['pagina'] == "inicio"){
            require_once "views/inicio.php";
        }else if($_GET['pagina'] == "noticias"){
            require_once "views/noticias.php";
        }else if($_GET['pagina'] == "contacto"){
            require_once "views/contacto.php";
        }else if($_GET['pagina'] == "login"){
            require_once "views/iniciarSesion.php";
        }else if($_GET['pagina'] == "register"){
            require_once "views/registro.php";
        }else if($_GET['pagina'] == "miPerfil"){
            require_once "views/miPerfil.php";
        }else if($_GET['pagina'] == "perfil"){
            require_once "views/perfil.php";
        }else if($_GET['pagina'] == "editarPerfil"){
            require_once "views/editarPerfil.php";
        }else if($_GET['pagina'] == "administrador" && $userSession->checkUserPrivileges()){
            require_once "views/administrador.php";
        }else{
            header("location: index.php?pagina=inicio");
        }
    }else{
        header("location: index.php?pagina=inicio");
    }
    ?>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Angularjs -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.7.9/angular-route.min.js"></script>

    <!-- scripts -->
    <script src="scripts/main.js"></script>

    <!-- app -->
    <script src="scripts/app.js"></script>

    <!-- controllers -->
    <script src="scripts/controllers.js"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

    <script src="../frontend/scripts/register.js"></script>
    <script src="../frontend/scripts/editarPerfil.js"></script>
    <script src="../frontend/scripts/iniciarSesion.js"></script>
    <script src="../frontend/scripts/contacto.js"></script>
    <script src="../frontend/scripts/editNew.js"></script>
    <script src="../frontend/scripts/crearNoticia.js"></script>

</body>
</html>
