<?php


require_once 'productos.entidad.php';
require_once 'productos.model.php';

$alm = new productos();
$model = new ProductoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id_productos',                   $_REQUEST['id_productos']);
            $alm->__SET('referencia',      		        $_REQUEST['referencia']);
            $alm->__SET('nombre',       			    $_REQUEST['nombre']);
            $alm->__SET('marca',            $_REQUEST['marca']);
			$alm->__SET('precio',           $_REQUEST['precio']);
          
            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id_productos',          			$_REQUEST['id_productos']);
			$alm->__SET('referencia',         		    $_REQUEST['referencia']);
            $alm->__SET('nombre',       		        $_REQUEST['nombre']);
            $alm->__SET('marca',            $_REQUEST['marca']);
			$alm->__SET('precio',           $_REQUEST['precio']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_productos']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_productos']);
            break;
    }
}

?>