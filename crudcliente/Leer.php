<?php
require_once 'registro_usuario.php';
require_once 'registrar.php';

// Logica
$alm = new Registro();
$model = new RegistroUsuario();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id_cliente',              		$_REQUEST['id_cliente']);
            $alm->__SET('nombres',          			$_REQUEST['nombres']);
            $alm->__SET('apellidos',       				$_REQUEST['apellidos']);
            $alm->__SET('identificacion',               $_REQUEST['identificacion']);
			$alm->__SET('correo',           			$_REQUEST['correo']);
			$alm->__SET('telefono',          			$_REQUEST['telefono']);
            $alm->__SET('nombre_usuario', 				$_REQUEST['nombre_usuario']);
			$alm->__SET('contrasena_usuario', 			$_REQUEST['contrasena_usuario']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        case 'registrar':
            $alm->__SET('id_cliente',              		$_REQUEST['id_cliente']);
            $alm->__SET('nombres',          			$_REQUEST['nombres']);
            $alm->__SET('apellidos',       				$_REQUEST['apellidos']);
            $alm->__SET('identificacion',               $_REQUEST['identificacion']);
			$alm->__SET('correo',           			$_REQUEST['correo']);
			$alm->__SET('telefono',           			$_REQUEST['telefono']);
            $alm->__SET('nombre_usuario', 				$_REQUEST['nombre_usuario']);
			$alm->__SET('contrasena_usuario', 			$_REQUEST['contrasena_usuario']);

            $model->registrar(alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_cliente']);
            header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_cliente']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >nombres</th>
                            <th >apellidos</th>
                            <th >identificacion</th>
                            <th >correo</th>
							<th >telefono</th>
							<th >nombre_usuario</th>
							<th >contrasena_usuario</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombres'); ?></td>
                            <td><?php echo $r->__GET('apellidos'); ?></td>
                            <td><?php echo $r->__GET('identificacion'); ?></td>
							<td><?php echo $r->__GET('correo'); ?></td>
							<td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('nombre_usuario'); ?></td>
							<td><?php echo $r->__GET('contrasena_usuario'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>



