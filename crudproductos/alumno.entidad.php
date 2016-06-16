<?php
class Alumno
{
    private $id_productos;
    private $referencia;
    private $categoria;
    private $marca;
    private $precio;
	
	

	
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
