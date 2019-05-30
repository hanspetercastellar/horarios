<?php
class admin_model{

    //creamos las propiedades para inicializarlas con la instancia de la coneccion


    public function __construct()
    {

    }


    public function login($email,$password)
    {
        //instanciamos la coneccion para que este disponible en toda la clase
        $db = new Conexion();
        $conect = $db->conectar();


        try{

         if(!empty($email) && !empty($password))
         {
             $sql= "CALL login(:email,:password)";
             //$hash_password= md5( $password); //Password encryption
             $sth =$conect->prepare($sql);
             $sth->bindParam(':email', $email,PDO::PARAM_STR,100 );
             $sth->bindParam(":password", $password,PDO::PARAM_STR,100) ;
             $sth->execute();
             $count = $sth->rowCount();
             $data = $sth->fetch(PDO::FETCH_OBJ);
             if($count)
             {

                 session_start();
                 $_SESSION["id_usuario"]= $data->usuario_id;
                 $_SESSION["rol"] = $data->rol_id ;
                 $_SESSION["nombre"] = $data->usuario_nombre;
                 $_SESSION["apellido"] = $data->usuario_apellido;

                 header("location: http://localhost/horarios/?controlador=admin&accion=home");
                 echo $data->usuario_id;

             }else{

                 echo 0 ;
             }




         }


        }
          catch (PDOException $e)
          {

              die("Error occurred:" . $e->getMessage());

          }

    }

    public function getHorariosXdocente($docente_id)
    {
        $db = new Conexion();
        $conect = $db->conectar();

        $sql= "CALL getHorariosXdocente(:id)";
        //$hash_password= md5( $password); //Password encryption
        $sth =$conect->prepare($sql);
        $sth->bindParam(':id', $docente_id,PDO::PARAM_INT );
        $sth->execute();
        $count = $sth->rowCount();

        if($count>0)
        {

            while($data = $sth->fetch())
            {

                $arrayHorarios[]=array(
                    "lunes"=>$data["lunes"],
                    "martes"=>$data["martes"],
                    "miercoles"=>$data["miercoles"],
                    "jueves"=>$data["jueves"],
                    "viernes"=>$data["viernes"],
                    "sabado"=>$data["sabado"]
                );

            }

            return $arrayHorarios;

        }
    }

    public function getIdHoraiosDocentes($id_docente)
    {

        $db = new Conexion();
        $conect = $db->conectar();

        $sql = "CALL getIdHoraiosDocentes(:id_docente)";
        $sth =$conect->prepare($sql);
        $sth->bindParam(':id_docente', $id_docente,PDO::PARAM_INT );
        $sth->execute();
        $count = $sth->rowCount();

        return $sth->fetch(PDO::FETCH_COLUMN)[0];

    }

    public function getDocentes()
    {
        $db = new Conexion();
        $conect = $db->conectar();

        $sql = "CALL getDocentes()";
        $sth =$conect->prepare($sql);
        $sth->execute();
        $count = $sth->rowCount();


        while ($data = $sth->fetch())
        {
            $id= $data["id"];
            $nombre = $data["nombre"];

           echo "

                      <option value=\"$id\">$nombre</option>

                  ";


        }



    }
    public function buscarHorarioXdocente($cedula)
    {
        $db = new Conexion();
        $conect = $db->conectar();
        $id = intval($cedula);
        $sql= "CALL buscarHorarioXdocente(:id)";
        //$hash_password= md5( $password); //Password encryption
        $sth =$conect->prepare($sql);
        $sth->bindParam(':id', $id,PDO::PARAM_INT );
        $sth->execute();
        $count = $sth->rowCount();
        $horarios = array();
        while ($data = $sth->fetch())
        {
            $horarios[]=array(
                 "lunes"=>$data["lunes"],
                 "martes"=>$data["martes"],
                "miercoles"=>$data["miercoles"],
                "jueves"=>$data["jueves"],
                "viernes"=>$data["viernes"],
                "sabado"=>$data["sabado"],
            );


        }



        return  $horarios;

    }

    public function getRoles()
    {

        $db = new Conexion();
        $conect = $db->conectar();

        $sql = "CALL getRoles()";

        $sth = $conect->prepare($sql);

        $sth->execute();
        while ($data = $sth->fetch())
        {
            $roles[]=array(
                "id"=>$data["id"],
                "rol"=>$data["rol"]
            );


        }
        return $roles;
    }



    public function getDatosPersonales($id)
    {
        $db = new Conexion();
        $conect = $db->conectar();
        $id = intval($id);
        $sql= "CALL getInfoDocente(:id)";
        //$hash_password= md5( $password); //Password encryption
        $datos =$conect->prepare($sql);
        $datos->bindParam(':id', $id,PDO::PARAM_INT );
        $datos->execute();
        $data = $datos->fetch(PDO::FETCH_OBJ);

           return $data;
    }

    public function getAsignaturas($id)
    {
        $db = new Conexion();
        $conect = $db->conectar();
        $id = intval($id);
        $sql= "CALL getAsignaturasXdocentes(:id)";
        //$hash_password= md5( $password); //Password encryption
        $datos =$conect->prepare($sql);
        $datos->bindParam(':id', $id,PDO::PARAM_INT );
        $datos->execute();

        $asignaturas=array();
        while ($data = $datos->fetch())
        {
            $asignaturas[]= array("asignatura"=>$data["asignatura"]);


        }

        return $asignaturas;

    }

    public function getProgramas()
    {
        $db = new Conexion();
        $conect = $db->conectar();
        $sql= "CALL getProgramas()";
        //$hash_password= md5( $password); //Password encryption
        $datos =$conect->prepare($sql);
        $datos->execute();

        $programas=array();
            $cont = 1;
        while ($data = $datos->fetch())
        {
            $id = $data["programa_id"];
            $programas[]= array(
                "item"=>$cont,
                "nombre"=>$data["programa_nombre"],
                "fecha"=>$data["fecha"],
                "accion"=>"<a href='#' onclick='eliminar($id)' class='btn btn-sm btn-danger' title='eliminar'>X</a>"
            );

            $cont++;
        }
           $programas = array("data"=>$programas);

           return $programas;

    }

    public function eliminarPrograma($id)
    {
        $db = new Conexion();
        $conect = $db->conectar();
        $id = intval($id);
        $sql= "CALL deleteProgramas(:id)";
        //$hash_password= md5( $password); //Password encryption
        $datos =$conect->prepare($sql);
        $datos->bindParam(':id', $id,PDO::PARAM_INT );
          $deleted = $datos->execute();


        return $deleted;


    }

    public function regProgramas($nombre)
    {

        $db = new Conexion();
        $conect = $db->conectar();

        $sql= "CALL regProgramas(:nombre)";
        //$hash_password= md5( $password); //Password encryption
        $sth =$conect->prepare($sql);
        $sth->bindParam(':nombre', $nombre,PDO::PARAM_STR,255);

        return $sth->execute();


    }




}
