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
            $alm->__SET('id_cliente',            	 	 $_REQUEST['id_cliente']);
            $alm->__SET('nombres',         			 $_REQUEST['nombres']);
            $alm->__SET('apellidos',        				 $_REQUEST['apellidos']);
			$alm->__SET('identificacion',             $_REQUEST['identificacion']);
            $alm->__SET('correo',            $_REQUEST['correo']);
			$alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('nombre_usuario',		 $_REQUEST['nombre_usuario']);
			$alm->__SET('contrasena_usuario',		 $_REQUEST['contrasena_usuario']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
            $alm->__SET('id_cliente',            	 	 $_REQUEST['id_cliente']);
            $alm->__SET('nombres',         			 $_REQUEST['nombres']);
            $alm->__SET('apellidos',        				 $_REQUEST['apellidos']);
			$alm->__SET('identificacion',             $_REQUEST['identificacion']);
            $alm->__SET('correo',            $_REQUEST['correo']);
			$alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('nombre_usuario',		 $_REQUEST['nombre_usuario']);
			$alm->__SET('contrasena_usuario',		 $_REQUEST['contrasena_usuario']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_cliente']);
            header('Location: index.html');
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
                
                <form action="?action=<?php echo $alm->id_cliente > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id_cliente" value="<?php echo $alm->__GET('id_cliente'); ?>" />
                    
                    <table >
                        <tr>
                            <th >nombres</th>
                            <td><input type="text" name="nombres" value="<?php echo $alm->__GET('nombres'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >apellidos</th>
                            <td><input type="text" name="apellidos" value="<?php echo $alm->__GET('apellidos'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >identificacion</th>
                            <td><input type="text" name="identificacion" value="<?php echo $alm->__GET('identificacion'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >correo</th>
                            <td><input type="text" name="correo" value="<?php echo $alm->__GET('correo'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >telefono</th>
                            <td><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >nombre_usuario</th>
                            <td><input type="text" name="nombre_usuario" value="<?php echo $alm->__GET('nombre_usuario'); ?>"  /></td>
                        </tr>
                        <tr>
						<tr>
                            <th >contrasena_usuario</th>
                            <td><input type="text" name="contrasena_usuario" value="<?php echo $alm->__GET('contrasena_usuario'); ?>"  /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

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
                            <th></th>
                            <th></th>
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
                            <td>
                                <a href="?action=editar&id_cliente=<?php echo $r->id_cliente; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id_cliente=<?php echo $r->id_cliente; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>



