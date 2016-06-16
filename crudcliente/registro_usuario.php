<?php
class Registro
{
    private $id_cliente;
    private $nombres;
    private $apellidos;
    private $identificacion;
    private $correo;
	private $telefono;
	private $nombre_usuario;
	private $contrasena_usuario;

	
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
