<div class="container" ng-controller="controladorCrudContactos">
    <section id="news">
      <ul>
        <li>
          <section id="comments">
            <ul id="list-comments">

              <fieldset ng-repeat="contacto in contactos" class="comments container-fluid">

                <legend class="user">{{contacto.contact_fullname}}</legend>
                <p class="description">{{contacto.contact_id}} | {{contacto.contact_email}}</p>
                <i class="far fa-trash-alt eliminar" ng-click="eliminarContacto(contacto.contact_id)" ></i>

                <form ng-hide="true" action="POST">
                  <input type="text" name="contact_id" value="{{contacto.contact_id}}" class="{{contacto.contact_id}}">
                </form>

                <li><p class="comment">{{contacto.contact_text}}</p></li>

            </ul>
          </section>
        </li>
      </ul>
    </section>
</div>