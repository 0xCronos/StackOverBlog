<div class="container" ng-controller="controladorCrudCategorias">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Categoría</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="category in categories | orderBy:'+category_id'">
                <input type="hidden" name="category_id" value="{{category.category_id}}" class="{{category.category_id}}">
                <td scope="row">{{category.category_id}}</td>
                <td>{{category.category_name}}</td>
                <td><i class="far fa-trash-alt eliminar" style="cursor: pointer;" ng-click="deleteCategory(category.category_id)"></i></td>
            </tr>
        </tbody>
    </table>
    <div class="container text-center">
        <form class="categoryForm" action="POST">
            <input class="categoryNameInput" name="category_name" type="text">
            <input class="btn btn-dark" value="Agregar nueva categoría" type="submit">
        </form>

    </div>
</div>

