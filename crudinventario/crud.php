<?php

require_once 'inventario.php';
require_once 'InventarioProduc.php';

$alm = new inventario();
$model = new productos();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id_inventario',                   $_REQUEST['id_inventario']);
            $alm->__SET('nombre_producto',      		        $_REQUEST['nombre_producto']);
            $alm->__SET('precio',       			    $_REQUEST['precio']);
            $alm->__SET('referencia',            $_REQUEST['referencia']);
			$alm->__SET('venta',           $_REQUEST['venta']);
            $alm->__SET('nuevos_productos',       $_REQUEST['nuevos_productos']);
			$alm->__SET('disponibilidad',       $_REQUEST['disponibilidad']);

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id_inventario',          			$_REQUEST['id_inventario']);
			$alm->__SET('nombre_producto',         		    $_REQUEST['nombre_producto']);
            $alm->__SET('precio',       		        $_REQUEST['precio']);
            $alm->__SET('referencia',            $_REQUEST['referencia']);
			$alm->__SET('venta',           $_REQUEST['venta']);
			$alm->__SET('nuevos_productos',       $_REQUEST['nuevos_productos']);
			$alm->__SET('disponibilidad',       $_REQUEST['disponibilidad']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_inventario']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_inventario']);
            break;
    }
}

?>