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
            $id= $data["cedula"];
            $nombre = $data["nombre"];

           echo "

                      <option value=\"$nombre\">$id</option>

                  ";


        }



    }


}
