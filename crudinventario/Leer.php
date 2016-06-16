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
            $alm->__SET('id_inventario',              		$_REQUEST['id_inventario']);
            $alm->__SET('nombre_producto',          		$_REQUEST['nombre_producto']);
            $alm->__SET('precio',       					$_REQUEST['precio']);
            $alm->__SET('referencia',           			$_REQUEST['referencia']);
			$alm->__SET('venta',          				    $_REQUEST['venta']);
            $alm->__SET('nuevos_productos', 				$_REQUEST['nuevos_productos']);
			$alm->__SET('disponibilidad', 					$_REQUEST['disponibilidad']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        case 'registrar':
            $alm->__SET('id_inventario',              	$_REQUEST['id_inventario']);
            $alm->__SET('nombre_producto',          	$_REQUEST['nombre_producto']);
            $alm->__SET('precio',       				$_REQUEST['precio']);
            $alm->__SET('referencia',            		$_REQUEST['referencia']);
			$alm->__SET('venta',           				$_REQUEST['venta']);
            $alm->__SET('nuevos_productos', 			$_REQUEST['nuevos_productos']);
			$alm->__SET('disponibilidad', 				$_REQUEST['disponibilidad']);

            $model->registrar(alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_inventario']);
            header('Location: index.php');
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
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >nombre_producto</th>
                            <th >precio</th>
                            <th >referencia</th>
                            <th >venta</th>
							<th >nuevos_productos</th>
							<th >disponibilidad</th>
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
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>



