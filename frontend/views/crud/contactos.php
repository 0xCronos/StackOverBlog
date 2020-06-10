<div class="container" ng-controller="controladorCrudContactos">
    <section id="news">
        <section id="comments">
            <ul id="list-comments">
                <table class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Texto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="contacto in contactos | filter:busquedaContactos">
                            <td class="description">{{contacto.contact_id}}</td>
                            <td class="user">{{contacto.contact_fullname}}</td>
                            <td class="description">{{contacto.contact_email}}</td>

                            <td class="comment">{{contacto.contact_text}}</td>
                            <div class="text-right mb-4">
                                <input class="btn border-dark" type="text" ng-model="busquedaContactos" placeholder="Busqueda">
                            </div>
                            <td><i class="far fa-trash-alt eliminar" ng-click="eliminarContacto(contacto.contact_id)"></i></td>
                        </tr>
                    </tbody>
                </table>
            </ul>
        </section>
    </section>
</div>