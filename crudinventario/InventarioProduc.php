<?php

class productos
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM  inventario");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new inventario();

                $alm->__SET('id_inventario', $r->id_inventario);
                $alm->__SET('nombre_producto', $r->nombre_producto);
                $alm->__SET('precio', $r->precio);
                $alm->__SET('referencia', $r->referencia);
                $alm->__SET('venta', $r->venta);
 			    $alm->__SET('nuevos_productos', $r->nuevos_productos);
				$alm->__SET('disponibilidad', $r->disponibilidad);

                $result[] = $alm;
            }

            return $result;	
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id_inventario)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM inventario WHERE id_inventario = ?");
                      

            $stm->execute(array($id_inventario));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new inventario();

                $alm->__SET('id_inventario', $r->id_inventario);
                $alm->__SET('nombre_producto', $r->nombre_producto);
                $alm->__SET('precio', $r->precio);
                $alm->__SET('referencia', $r->referencia);
                $alm->__SET('venta', $r->venta);
 			    $alm->__SET('nuevos_productos', $r->nuevos_productos);
				 $alm->__SET('disponibilidad', $r->disponibilidad);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_inventario)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM inventario WHERE id_inventario = ?");                      

            $stm->execute(array($id_inventario));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(inventario $data)
    {
        try 
        {
            $sql = "UPDATE inventario SET 
                        nombre_producto    	    		= ?, 
                        precio     		   				= ?,
                        referencia     	   				= ?,
						venta               	        = ?, 
                        nuevos_productos                = ?,
						disponibilidad                  = ?
                   WHERE id_inventario = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre_producto'), 
                    $data->__GET('precio'), 
                    $data->__GET('referencia'),
					$data->__GET('venta'),
                    $data->__GET('nuevos_productos'),
					$data->__GET('disponibilidad'),
                    $data->__GET('id_inventario')
                    )
                );
        } 
		catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(inventario $data)
    {
        try 
        {
        $sql = "INSERT INTO inventario (id_inventario, nombre_producto, precio, referencia, venta, nuevos_productos, disponibilidad) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_inventario'), 
				$data->__GET('nombre_producto'), 
                $data->__GET('precio'), 
		        $data->__GET('referencia'),
				$data->__GET('venta'),
                $data->__GET('nuevos_productos'),
				$data->__GET('disponibilidad')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>