<?php
class Alumno
{
    private $id_inventario;
    private $productos_ingresados;
	private $precio_ingresados;
    private $productos_egresados;
	private $precio_egresados;
    private $categorias;
    private $conteo;


	
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
