<?php require "Views/slide.php"; ?>
<div class="wrapper">
  <section id="maincode">
    <article>
      <h2>Quienes somos</h2>
      <p>Welcome to #Maincode! You're a web-dev? A web-designer? From around Frankfurt? Awesome, you found the right spot to make your dreams come true.</p>
      <p>Already excited and intersted to hear more? Nice, go on and scroll down.</p>
    </article>
  </section>
  <section id="whatis">
    <article>
      <h2>Servicios</h2>
      <div class="row services-list">
        <div class="services-detail col-md-6">
          <h3>CRM</h3>
          <p>El CRM que tu compañia necesita para triunfar</p>
          <img src="src/crm.jpg" alt="CRM">
        </div> 
        <div class="services-detail col-md-6">
          <h3>Facturacion Electronica</h3>
          <p>El CRM que tu compañia necesita para triunfar</p>
          <img src="src/crm.jpg" alt="CRM">
        </div> 
      </div>
    </article>
  </section>
  <section id="participate">
    <article>
      <h2>Productos</h2>
      <div class="row products-list">
        <div class="product-detail col-md-4">
          <h3>CRM</h3>
          <p>El CRM que tu compañia necesita para triunfar</p>
          <img src="src/crm.jpg" alt="CRM">
        </div> 
        <div class="product-detail col-md-4">
          <h3>Facturacion</h3>
          <p>El CRM que tu compañia necesita para triunfar</p>
          <img src="src/crm.jpg" alt="CRM">
        </div> 
        <div class="product-detail col-md-4">
          <h3>Plugins</h3>
          <p>El CRM que tu compañia necesita para triunfar</p>
          <img src="src/crm.jpg" alt="CRM">
        </div> 
      </div>
    </article>
  </section>
  <section id="happening">
    <article>
      <h2>Soporte</h2>
      <form action="contacto.php" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre Completo:</label>
          <input class="form-control" type="text" name="nombre" placeholder="Nombre completo" required="true">
        </div>
        <div class="form-group">
          <label for="correo">correo</label>
          <input class="form-control" type="email" name="email" placeholder="Correo">
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje:</label>
          <textarea class="form-control" name="mensaje"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="enviar">
      </form> 
    </article>
  </section>
  <section id="costs">
    <article>
      <h2>Contactenos</h2>
      <form action="contacto.php" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre Completo:</label>
          <input class="form-control" type="text" name="nombre" placeholder="Nombre completo" required="true">
        </div>
        <div class="form-group">
          <label for="correo">correo</label>
          <input class="form-control" type="email" name="email" placeholder="Correo">
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje:</label>
          <textarea class="form-control" name="mensaje"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="enviar">
      </form>
    </article>
  </section>
</div>