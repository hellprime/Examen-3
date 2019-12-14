<div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12" id="Soporte">
        <h2 id=Soporte>
            Soporte
        </h2>
        <form action="contacto.php" method="POST">
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" name="Nombre" placeholder="Jose Perez">
            </div>
            <div class="form-group">
                <label for="Correo">Correo electronico</label>
                <input type="email" class="form-control" name="Correo" placeholder="nombre@ejemplo.com">
            </div>
            <div class="form-group">
                <label for="Razon">Razon del contacto</label>
                <select class="form-control" name="Razon">
                    <option>Problema con servicios</option>
                    <option>Problema con productos</option>
                    <option>Otros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Mensaje">Consulta</label>
                <textarea class="form-control" name="Mensaje" rows="3"
                    placeholder="En que podemos ayudarte?"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12" id="Contactenos">
        <h2 id=Contactenos>
            Contactenos
        </h2>
        <form action="contacto.php" method="POST">
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" class="form-control" id="Nombre" placeholder="Jose Perez">
            </div>
            <div class="form-group">
                <label for="Correo">Correo electronico</label>
                <input type="email" class="form-control" id="Correo" placeholder="nombre@ejemplo.com">
            </div>
            <div class="form-group">
                <label for="Mensaje">Consulta</label>
                <textarea class="form-control" id="Mensaje" rows="3" placeholder="En que podemos ayudarte?"></textarea>
            </div>
            <button type="Enviar" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
