<?php

class AlumnoModel
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
                $alm = new Alumno();

                $alm->__SET('id_inventario', $r->id_inventario);
                $alm->__SET('productos_ingresados', $r->productos_ingresados);
                $alm->__SET('precio_ingresados', $r->precio_ingresados);
                $alm->__SET('productos_egresados', $r->productos_egresados);
                $alm->__SET('precio_egresados', $r->precio_egresados);
 			    $alm->__SET('categorias', $r->categorias);
				$alm->__SET('conteo', $r->conteo);

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

            $alm = new Alumno();

                $alm->__SET('id_inventario', $r->id_inventario);
                $alm->__SET('productos_ingresados', $r->productos_ingresados);
                $alm->__SET('precio_ingresados', $r->precio_ingresados);
                $alm->__SET('productos_egresados', $r->productos_egresados);
                $alm->__SET('precio_egresados', $r->precio_egresados);
 			    $alm->__SET('categorias', $r->categorias);
				 $alm->__SET('conteo', $r->conteo);

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

    public function Actualizar(Alumno $data)
    {
        try 
        {
            $sql = "UPDATE inventario SET 
                        productos_ingresados    	    = ?, 
                        precio_ingresados     		    = ?,
                        productos_egresados     	    = ?,
						precio_egresados    	        = ?, 
                        categorias                      = ?,
						conteo                          = ?
                   WHERE id_inventario = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('productos_ingresados'), 
                    $data->__GET('precio_ingresados'), 
                    $data->__GET('productos_egresados'),
					$data->__GET('precio_egresados'),
                    $data->__GET('categorias'),
					$data->__GET('conteo'),
                    $data->__GET('id_inventario')
                    )
                );
        } 
		catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Alumno $data)
    {
        try 
        {
        $sql = "INSERT INTO inventario (id_inventario, productos_ingresados, precio_ingresados, productos_egresados, precio_egresados, categorias, conteo) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_inventario'), 
				$data->__GET('productos_ingresados'), 
                $data->__GET('precio_ingresados'), 
		        $data->__GET('productos_egresados'),
				$data->__GET('precio_egresados'),
                $data->__GET('categorias'),
				$data->__GET('conteo')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>