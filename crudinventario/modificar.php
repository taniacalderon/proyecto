<?php
require_once 'inventario.php';
require_once 'InventarioProduc.php';

// Logica
$alm = new inventario();
$model = new productos();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id_inventario',            	 	 		 $_REQUEST['id_inventario']);
            $alm->__SET('nombre_producto',         			 $_REQUEST['nombre_producto']);
            $alm->__SET('precio',        				 $_REQUEST['precio']);
			$alm->__SET('referencia',            			 $_REQUEST['referencia']);
            $alm->__SET('venta',          			     $_REQUEST['venta']);
            $alm->__SET('nuevos_productos',		 						 $_REQUEST['nuevos_productos']);
			$alm->__SET('disponibilidad',									 $_REQUEST['disponibilidad']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
            $alm->__SET('id_inventario',            	 			 $_REQUEST['id_inventario']);
            $alm->__SET('nombre_producto',         			 $_REQUEST['nombre_producto']);
            $alm->__SET('precio',        				 $_REQUEST['precio']);
			$alm->__SET('referencia',            			 $_REQUEST['referencia']);
            $alm->__SET('venta',           				 $_REQUEST['venta']);
            $alm->__SET('nuevos_productos',								 $_REQUEST['nuevos_productos']);
			$alm->__SET('disponibilidad',									 $_REQUEST['disponibilidad']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_inventario']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_inventario']);
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
                
                <form action="?action=<?php echo $alm->id_inventario > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id_inventario" value="<?php echo $alm->__GET('id_inventario'); ?>" />
                    
                    <table >
                        <tr>
                            <th >nombre_producto</th>
                            <td><input type="text" name="nombre_producto" value="<?php echo $alm->__GET('nombre_producto'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >precio</th>
                            <td><input type="text" name="precio" value="<?php echo $alm->__GET('precio'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >referencia</th>
                            <td><input type="text" name="referencia" value="<?php echo $alm->__GET('referencia'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >venta</th>
                            <td><input type="text" name="venta" value="<?php echo $alm->__GET('venta'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >nuevos_productos</th>
                            <td><input type="text" name="nuevos_productos" value="<?php echo $alm->__GET('nuevos_productos'); ?>"  /></td>
                        </tr>categorias                        <tr>
						<tr>
                            <th >disponibilidad</th>
                            <td><input type="text" name="disponibilidad" value="<?php echo $alm->__GET('disponibilidad'); ?>"  /></td>
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
                            <th >nombre_producto</th>
                            <th >precio</th>
                            <th >referencia</th>
                            <th >venta</th>
							<th >nuevos_productos</th>
							<th >disponibilidad</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre_producto'); ?></td>
                            <td><?php echo $r->__GET('precio'); ?></td>
                            <td><?php echo $r->__GET('referencia'); ?></td>
							<td><?php echo $r->__GET('venta'); ?></td>
                            <td><?php echo $r->__GET('nuevos_productos'); ?></td>
							<td><?php echo $r->__GET('disponibilidad'); ?></td>
                            <td>
                                <a href="?action=editar&id_inventario=<?php echo $r->id_inventario; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id_inventario=<?php echo $r->id_inventario; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>



