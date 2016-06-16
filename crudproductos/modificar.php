<?php
require_once 'productos.entidad.php';
require_once 'productos.model.php';

// Logica
$alm = new productos();
$model = new ProductoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id_productos',            	 	 $_REQUEST['id_productos']);
            $alm->__SET('referencia',         			 $_REQUEST['referencia']);
            $alm->__SET('nombre',        				 $_REQUEST['nombre']);
			$alm->__SET('marca',         			    $_REQUEST['marca']);
            $alm->__SET('precio',       			     $_REQUEST['precio']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
            $alm->__SET('id_productos',            	 	 $_REQUEST['id_productos']);
            $alm->__SET('referencia',         			 $_REQUEST['referencia']);
            $alm->__SET('nombre',        				 $_REQUEST['nombre']);
			$alm->__SET('marca',           				  $_REQUEST['marca']);
            $alm->__SET('precio',           			 $_REQUEST['precio']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_productos']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_productos']);
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
                
                <form action="?action=<?php echo $alm->id_productos > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id_productos" value="<?php echo $alm->__GET('id_productos'); ?>" />
                    
                    <table >
                        <tr>
                            <th >referencia</th>
                            <td><input type="text" name="referencia" value="<?php echo $alm->__GET('referencia'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $alm->__GET('nombre'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >marca</th>
                            <td><input type="text" name="marca" value="<?php echo $alm->__GET('marca'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >precio</th>
                            <td><input type="text" name="precio" value="<?php echo $alm->__GET('precio'); ?>"  /></td>
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
                            <th >referencia</th>
                            <th >nombre</th>
                            <th >marca</th>
                            <th >precio</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('referencia'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('marca'); ?></td>
							<td><?php echo $r->__GET('precio'); ?></td>
                            <td>
                                <a href="?action=editar&id_productos=<?php echo $r->id_productos; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id_productos=<?php echo $r->id_productos; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>



