<div class="container" ng-controller="controladorCrudContactos">
    <div class="container input-group mt-5 mb-5 px-5">
        <div class="input-group-prepend">
            <span class="input-group-text btn-formulario">Buscar contacto</span>
        </div>
        <input type="text" class="form-control" ng-model="busquedaContactos" placeholder="Busqueda">
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed" style="width:100%">
            <thead class="text-center">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Texto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="contacto in contactos | filter:busquedaContactos">
                    <td class="description">{{contacto.contact_id}}</td>
                    <td class="user">{{contacto.contact_fullname}}</td>
                    <td class="description">{{contacto.contact_email}}</td>

                    <td class="comment">{{contacto.contact_text}}</td>
                    <td><i class="far fa-trash-alt eliminar" ng-click="eliminarContacto(contacto.contact_id)"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>