<?php

class ProductoModel
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

            $stm = $this->pdo->prepare("SELECT * FROM  productos");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new productos();

                $alm->__SET('id_productos', $r->id_productos);
                $alm->__SET('referencia', $r->referencia);
                $alm->__SET('nombre', $r->nombre);
                $alm->__SET('marca', $r->marca);
                $alm->__SET('precio', $r->precio);
 			  

                $result[] = $alm;
            }

            return $result;	
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id_productos)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM productos WHERE id_productos = ?");
                      

            $stm->execute(array($id_productos));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new productos();

                $alm->__SET('id_productos', $r->id_productos);
                $alm->__SET('referencia', $r->referencia);
                $alm->__SET('nombre', $r->nombre);
                $alm->__SET('marca', $r->marca);
                $alm->__SET('precio', $r->precio);
 			    

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_productos)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM productos WHERE id_productos = ?");                      

            $stm->execute(array($id_productos));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(productos $data)
    {
        try 
        {
            $sql = "UPDATE productos SET 
                        referencia    	        = ?, 
                        nombre     		    = ?,
                        marca     	= ?,
						precio    	= ? 
                       
                   WHERE id_productos = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('referencia'), 
                    $data->__GET('nombre'), 
                    $data->__GET('marca'),
					$data->__GET('precio'),
                    $data->__GET('id_productos')
                    )
                );
        } 
		catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(productos $data)
    {
        try 
        {
        $sql = "INSERT INTO productos (id_productos, referencia, nombre, marca, precio) 
                VALUES (?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_productos'), 
				$data->__GET('referencia'), 
                $data->__GET('nombre'), 
		        $data->__GET('marca'),
				$data->__GET('precio'),
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>