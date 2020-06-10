<div class="container mb-5" ng-controller="controladorNuevaNoticia">
    <div id="form-row" class="row justify-content-center align-items-center">
        <div id="form-column" class="col-lg-10">
            <div id="form-box" class="bg-light text-dark">
                <form id="createNewForm" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center">Crear noticia</h2>
                    <!-- titulo -->
                    <div class="form-group">
                        <label class="d-inline" for="new_title">Titulo</label>
                        <input type="text" class="form-control" name="new_title">
                    </div>

                    <!-- categorias-->
                    <div class="form-group">
                        <label class="d-inline" for="category_id">Categoría</label>
                        <select class="form-control-sm" name="category_id">
                            <option value="" selected disabled hidden>Elegir categoría</option>
                            <option ng-repeat="categoria in categorias" value="{{categoria.category_id}}">{{categoria.category_name}}</option>
                        </select>
                    </div>

                    <!-- estado -->
                    <div class="form-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="state_id" value="1">
                            <label class="form-check-label" for="public">Público</label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="state_id" value="2">
                            <label class="form-check-label" for="private">Privado</label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="state_id" value="3">
                            <label class="form-check-label" for="notPublic">No público</label>
                        </div>
                    </div>

                    <!-- cuerpo noticia -->
                    <div class="form-group">
                        <label class="d-inline" for="new_body">Cuerpo de la noticia</label>
                        <textarea class="form-control" name="new_body" rows="7" placeholder="Ingresa el cuerpo de la noticia..."></textarea>
                    </div>

                    <!-- imagen noticia -->
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" class="form-control-file" name="image" accept="image/*">
                    </div>

                    <div class="form-group text-center mt-4">
                            <input type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Crear noticia">
                            <span class="text-danger" id="registerResponse"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-1" ng-controller="controladorCrudNoticias">
    <div class="container mb-5" ng-repeat="new in news">
        <hr class="container">
        <div id="form-row" class="row justify-content-center align-items-center">
            <div id="form-column" class="col-lg-10 mt-0">
                <div id="form-box" class="bg-light text-dark">

                    <div class="content text-right">
                        <i class="far fa-trash-alt eliminar" ng-click="eliminarNoticia(new.new_id)"></i>
                    </div>

                    <form method="POST" id="modifyNews" class="noticia-{{new.new_id}}" enctype="multipart/form-data">

                        <h2 class="text-center">Modificar noticia id {{new.new_id}}</h2>

                        <!-- id noticia (oculto) -->
                        <div class="form-group">
                            <input type="hidden" class="form-control idNoticia-{{new.new_id}}" name="new_id" value="{{new.new_id}}">
                        </div>

                        <!-- titulo -->
                        <div class="form-group">
                            <label class="d-inline" for="new_title">Titulo</label>
                            <input type="text" class="form-control" name="new_title" value="{{new.new_title}}">
                        </div>

                        <!-- categorias-->
                        <div class="form-group">
                            <label class="d-inline" for="category_id">Categoría</label>
                            <select class="form-control-sm" name="category_id">
                                <option value="" selected disabled hidden>Elegir categoría</option>
                                <option ng-repeat="categoria in categorias" value="{{categoria.category_id}}">{{categoria.category_name}}</option>
                            </select>
                        </div>

                        <!-- estado -->
                        <div class="form-group">
                            <div class="form-check-inline">
                                <input class="form-check-input" required type="radio" name="state_id" value="1">
                                <label class="form-check-label" for="public">Público</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" required type="radio" name="state_id" value="2">
                                <label class="form-check-label" for="private">Privado</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" required type="radio" name="state_id" value="3">
                                <label class="form-check-label" for="notPublic">No público</label>
                            </div>
                        </div>

                        <!-- cuerpo noticia -->
                        <div class="form-group">
                            <label class="d-inline" for="new_body">Cuerpo de la noticia</label>
                            <textarea class="form-control" name="new_body" rows="14" placeholder="Ingresa el cuerpo de la noticia...">{{new.new_body}}</textarea>
                        </div>
                        <!-- imagen noticia -->
                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input type="file" class="form-control-file" name="image" accept="image/*">
                        </div>

                        <div class="text-center">
                            <img src="../backend/assets{{new.new_image}}" loading="lazy" class="fotoEditarNoticia">
                        </div>

                        <!-- Sección de comentarios -->
                        <hr class="px-5">
                        <div class="form-group">
                            <h5>Comentarios</h5>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Fecha creación</th>
                                        <th scope="col">Comentario</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="comment in new.comments | orderBy:'+comment_id'">
                                        <input type="hidden" name="category_id" value="{{comment.comment_id}}" class="{{comment.comment_id}}">
                                        <td scope="row">{{comment.comment_id}}</td>
                                        <td>{{comment.user_fullname}}</td>
                                        <td>{{comment.comment_timestamp}}</td>
                                        <td>{{comment.comment_text}}</td>
                                        <td><i class="far fa-trash-alt eliminar" style="cursor: pointer;" ng-click="eliminarComentario(comment.comment_id)"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- BOTON -->
                        <div class="form-group text-center mt-4">
                            <input type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Modificar">
                            <span class="text-danger" id="registerResponse"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>