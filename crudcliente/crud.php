<?php

require_once 'registro_usuario.php';
require_once 'registrar.php';

$alm = new Registro();
$model = new RegistroUsuario();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id_cliente',                   $_REQUEST['id_cliente']);
            $alm->__SET('nombres',      		        $_REQUEST['nombres']);
            $alm->__SET('apellidos',       			    $_REQUEST['apellidos']);
            $alm->__SET('identificacion',               $_REQUEST['identificacion']);
			$alm->__SET('correo',           			$_REQUEST['correo']);
			$alm->__SET('telefono',           			$_REQUEST['telefono']);
            $alm->__SET('nombre_usuario',       		$_REQUEST['nombre_usuario']);
			$alm->__SET('contrasena_usuario',       	$_REQUEST['contrasena_usuario']);

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id_cliente',          			$_REQUEST['id_cliente']);
			$alm->__SET('nombres',         		        $_REQUEST['nombres']);
            $alm->__SET('apellidos',       		        $_REQUEST['apellidos']);
            $alm->__SET('identificacion',               $_REQUEST['identificacion']);
			$alm->__SET('correo',           			$_REQUEST['correo']);
			$alm->__SET('telefono',           			$_REQUEST['telefono']);
			$alm->__SET('nombre_usuario',      			$_REQUEST['nombre_usuario']);
			$alm->__SET('contrasena_usuario',       	$_REQUEST['contrasena_usuario']);

            $model->registrar($alm);
            echo "Guardo el Registro Exitosamente";

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_cliente']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_cliente']);
            break;
    }
}

?>