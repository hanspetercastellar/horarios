<?php
class    usuario_model{
  /////////////////////////////////////////////////////////////////////////
	public function __construct(){}

  //////////////////////////////INSERTAR///////////////////////////////////
	public static function regUsuarios($nombre, $apellido, $documento, $direccion, $telefono, $correo,$pass,$rol){
		$bd = new conexion();
		$c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{


           try {


                $sql='CALL regUsuarios(:nombre,:apellido,:documento,:direccion,:telefono,:correo,:pass,:rol)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':nombre', $nombre, PDO::PARAM_STR,45);
                $sth->bindParam(':apellido',$apellido, PDO::PARAM_STR,45);
                $sth->bindParam(':documento',$documento , PDO::PARAM_STR,11);
                $sth->bindParam(':direccion',$direccion, PDO::PARAM_STR,100);
               $sth->bindParam(':telefono',$telefono, PDO::PARAM_STR,11);
               $sth->bindParam(':correo',$correo, PDO::PARAM_STR,100);
                $sth->bindParam(':pass',$pass, PDO::PARAM_STR,100);
               $sth->bindParam(':rol',$rol, PDO::PARAM_INT);


                $sth->execute();
                //echo "registro exitoso correctamente";
              }
              catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
              $estado=false;
              }
              $bd->cerrar();
              $estado=true;
              return $estado;


            }




	}

	public function verificarDocumento($doc)
    {
        $bd = new conexion();
        $c  = $bd->conectar();
        if($c==null){
            echo 'CONEXION NULA';

        }else {

            try {


                $sql='CALL verificarDocumento(:doc)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':doc', $doc, PDO::PARAM_STR,11);
                $sth->execute();
                return  $sth->fetch(PDO::FETCH_COLUMN)[0];

            }
            catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
                $estado=false;
            }





        }

        }

    public function verificarCorreo($correo)
    {
        $bd = new conexion();
        $c  = $bd->conectar();
        if($c==null){
            echo 'CONEXION NULA';

        }else {

            try {


                $sql='CALL verificarCorreo(:correo)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':correo', $correo, PDO::PARAM_STR,100);
                $sth->execute();
               return  $sth->fetch(PDO::FETCH_COLUMN)[0];



            }
            catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
                $estado=false;
            }
            $bd->cerrar();




        }

    }

    public function getUsuarios()
    {
        $bd = new conexion();
        $c  = $bd->conectar();
        if($c==null){
            echo 'CONEXION NULA';

        }else {

            try {


                $sql='CALL getUsuarios()';
                $sth=$c->prepare($sql);
                $sth->execute();


                while ( $dato =  $sth->fetch(PDO::FETCH_ASSOC))
                {
                     $data[]= array(
                                "rol"=>$dato["rol"],
                                 "nombre"=>$dato["nombre"],
                                   "apellido"=>$dato["apellido"],
                                     "documento"=>$dato["documento"],
                                      "direccion"=>$dato["direccion"],
                                      "telefono"=>$dato["telefono"],
                                      "correo"=>$dato["correo"],
                                       "eliminar"=>'<button type="button" class="btn btn-danger">X</button>'
                                );
                }

                $data = array("data"=>$data);

                return ($data);


            }
            catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
                $estado=false;
            }
            $bd->cerrar();




        }



    }
}
