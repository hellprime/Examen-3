<?php

class DatosCliente
{
    public $Correo;
    public $Nombre;
    public $Mensaje;
    public $Razon; //solo es usado en el form de soporte
    public $To;
    /**
     * Envia el correo bajo el formato valido
     * @param string $Correo
     * @param string $Nombre
     * @param string $Mensaje
     * @param string $To
     * @return boolean status del envio del correo
     */
    public function EnvioDatos($Correo, $Nombre, $Mensaje, $Razon, $To = "wray.93@gmail.com")
    {
        if ($Razon == null) {
            $this->GenerarMensaje($Correo, $Nombre, $Mensaje, null);
        } else {
            $this->GenerarMensaje($Correo, $Nombre, $Mensaje, $Razon);
        }
        return mail($To, "Nuevo Mensaje", $Mensaje);
    }
    /**
     * Genera el contenido del correo
     * @param string $Nombre nombre del contacto
     * @param string $Correo correo del contacto
     * @param string $Mensaje mensaje del contacto
     * @return string correo final con formato aprobado
     */
    public function GenerarMensaje($Correo, $Nombre, $Mensaje, $Razon)
    {

        if ($Razon == null) {
            return "Usted ha sido contactado por " . $Nombre . ", el correo es " . $Correo
                . " y el detalle del contacto es \n\n" . $Mensaje;
        } else {
            return "Ha recibido un mensaje de soporte por " . $Nombre . ", el correo es " . $Correo
                . " y el motivo del contacto es " . $Razon . "\n\n Detalle del contacto: \n\n $Mensaje";
        }
    }
}
try {
    // verificar si viene meditante POST
    if ($_POST) {
        $Contacto = new DatosCliente();
        if ($Contacto->EnvioDatos($_POST['Correo'], $_POST['Nombre'], $_POST['Mensaje'], $_POST['Razon'])) {
            echo "Enviado";
        }
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
