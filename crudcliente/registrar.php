<?php

class RegistroUsuario
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

            $stm = $this->pdo->prepare("SELECT * FROM  tasnego");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Registro();

                $alm->__SET('id_cliente', $r->id_cliente);
                $alm->__SET('nombres', $r->nombres);
                $alm->__SET('apellidos', $r->apellidos);
                $alm->__SET('identificacion', $r->identificacion);
                $alm->__SET('correo', $r->correo);
			    $alm->__SET('telefono', $r->telefono);
 			    $alm->__SET('nombre_usuario', $r->nombre_usuario);
				$alm->__SET('contrasena_usuario', $r->contrasena_usuario);

                $result[] = $alm;
            }

            return $result;	
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id_cliente)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM tasnego WHERE id_cliente = ?");
                      

            $stm->execute(array($id_cliente));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new registro();

                $alm->__SET('id_cliente', $r->id_cliente);
                $alm->__SET('nombres', $r->nombres);
                $alm->__SET('apellidos', $r->apellidos);
                $alm->__SET('identificacion', $r->identificacion);
                $alm->__SET('correo', $r->correo);
				$alm->__SET('telefono', $r->telefono);
 			    $alm->__SET('nombre_usuario', $r->nombre_usuario);
				$alm->__SET('contrasena_usuario', $r->contrasena_usuario);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_cliente)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM tasnego WHERE id_cliente = ?");                      

            $stm->execute(array($id_cliente));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Registro $data)
    {
        try 
        {
            $sql = "UPDATE tasnego SET 
                        nombres    	        = ?, 
                        apellidos     		    = ?,
                        identificacion     	= ?,
						correo    	= ?, 
						telefono    	= ?,
                        nombre_usuario  = ?,
						contrasena_usuario  = ?
                   WHERE id_cliente = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombres'), 
                    $data->__GET('apellidos'), 
                    $data->__GET('identificacion'),
					$data->__GET('correo'),
					$data->__GET('telefono'),
                    $data->__GET('nombre_usuario'),
					$data->__GET('contrasena_usuario'),
                    $data->__GET('id_cliente')
                    )
                );
        } 
		catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Registro $data)
    {
        try 
        {
        $sql = "INSERT INTO tasnego (id_cliente, nombres, apellidos, identificacion, correo, telefono, nombre_usuario, contrasena_usuario) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_cliente'), 
				$data->__GET('nombres'), 
                $data->__GET('apellidos'), 
		        $data->__GET('identificacion'),
				$data->__GET('correo'),
				$data->__GET('telefono'),
                $data->__GET('nombre_usuario'),
				$data->__GET('contrasena_usuario')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>