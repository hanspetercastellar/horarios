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

                 echo 000 ;
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
        $data = $sth->fetch(PDO::FETCH_ASSOC);

        return $data;
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

        $sql= "CALL buscarHorarioXdocente(:id)";
        //$hash_password= md5( $password); //Password encryption
        $sth =$conect->prepare($sql);
        $sth->bindParam(':id', $cedula,PDO::PARAM_INT );
        $sth->execute();
        $count = $sth->rowCount();
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


}
