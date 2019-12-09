<?php

class contacto {

  public $correo;
  public $numero;
  public $nombre;
  public $mensaje;

  /**
   * 
   * @param string $correo
   * @param string $numero
   * @param string $nombre
   * @param string $mensaje
   * @param string $to
   * @return boolean status del envio del correo
   */
  public function envioDatos($correo, $numero, $nombre, $mensaje, $to = 'simonsempai@gmail.com') {
    $this->generarMensaje($nombre, $correo, $numero, $mensaje);
    return email($to, "contactenos", "mensaje");
  }

  /**
   * Genera el contenido del correo
   * @param string $nombre nombre del contacto
   * @param string $correo correo del contacto
   * @param string $numero numero del contacto
   * @param string $mensaje mensaje del contacto
   * @return string correo final con formato aprobado
   */
  public function generarMensaje($nombre, $correo, $numero, $mensaje) {
    return "Usted a sido contactado por " . $nombre . " cuyo numero es " . $numero . ",correo es" . $correo . " el motivo del contacto es \n" . $mensaje;
  }

}

//verificar si viene mediante POST
try {
  if ($_POST) {
    //envio a mi correo personal
    $contacto_personal = new contacto();
    if ($contacto_personal->generarMensaje($_POST['nombre'], $_POST['email'], '8888', $_POST['mensaje'])) {
      echo "function";
    }
    // $contacto_personal->envioDatos($_POST['nombre'], $_POST['email'],'8888', $_POST['mensaje']);
    //envio al correo marketing
    $contacto_marketing = new contacto();
    $contacto_marketing->envioDatos("simonsempai@gmail.com,", "8888888", "cristofer", "hola", "marketing@hola.com");
  }
} catch (Exception $exc) {
  echo $exc->getTraceAsString();
}
?> 