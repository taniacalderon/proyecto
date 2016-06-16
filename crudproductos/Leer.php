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
            $alm->__SET('id_productos',              		$_REQUEST['id_productos']);
            $alm->__SET('referencia',          			$_REQUEST['referencia']);
            $alm->__SET('nombre',       				$_REQUEST['nombre']);
            $alm->__SET('marca',            $_REQUEST['marca']);
			$alm->__SET('precio',           $_REQUEST['precio']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        case 'registrar':
            $alm->__SET('id_productos',              		$_REQUEST['id_productos']);
            $alm->__SET('referencia',          			$_REQUEST['referencia']);
            $alm->__SET('nombre',       				$_REQUEST['nombre']);
            $alm->__SET('marca',            $_REQUEST['marca']);
			$alm->__SET('precio',           $_REQUEST['precio']);

            $model->registrar(alm);
            header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_productos']);
            header('Location: index.php');
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
            

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >referencia</th>
                            <th >nombre</th>
                            <th >marca</th>
                            <th >precio</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('referencia'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('marca'); ?></td>
							<td><?php echo $r->__GET('precio'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>



