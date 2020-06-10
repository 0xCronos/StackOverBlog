<div class="container" ng-controller="controladorCrudCategorias">
    <section id="news">
        <section id="comments">
            <ul id="list-comments">
                <table  class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>                                
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr ng-repeat="category in categories | orderBy:'+category_id'">
                            <input type="hidden" name="category_id" value="{{category.category_id}}" class="{{category.category_id}}">
                            <td >{{category.category_id}}</td>
                            <td><input id="c-{{category.category_id}}" value="{{category.category_name}}"></td>
                            <td>
                            <i class="far fa-trash-alt eliminar" style="cursor: pointer;" ng-click="deleteCategory(category.category_id)"></i>
                            <i class="fas fa-edit" ng-click="modificarCategoria(category.category_id)"></i>
                            </td>
                        </tr>
                             
                    </tbody>        
                </table>

                <div class="container text-center">
                    <form class="categoryForm" action="POST">
                        <input class="categoryNameInput" name="category_name" type="text">
                        <input class="btn btn-formulario" value="Agregar nueva categoría" type="submit">
                    </form>
                </div>
            </ul>
        </section>
    </section>
</div>