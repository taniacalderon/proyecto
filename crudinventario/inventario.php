<?php
class inventario
{
    private $id_inventario;
    private $nombre_producto;
	private $precio;
    private $referencia;
	private $venta;
    private $nuevos_productos;
    private $disponibilidad;


	
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
