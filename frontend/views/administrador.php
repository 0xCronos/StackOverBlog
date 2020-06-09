<div class="container">
    <div class="row" style="margin-left: 10%;">
        <div class="col-lg-12 contenedorPrincipal">
            <!-- vistas administrador -->
            <?php
            if(isset($_GET['seccion'])){
                if($_GET['seccion'] == "inicio"){
                    require_once "views/crud/inicio.php";

                }else if($_GET['seccion'] == "crudNoticias"){
                    require_once "views/crud/noticias.php";

                }else if($_GET['seccion'] == "crudCategorias"){
                    require_once "views/crud/categorias.php";

                }else if($_GET['seccion'] == "crudContactos"){
                    require_once "views/crud/contactos.php";
                    
                }else{
                    header("location: index.php?pagina=administrador");
                }
            }else{
                require_once "views/crud/inicio.php";
            }
            ?>
        </div>
    </div>
</div>