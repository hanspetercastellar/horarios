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

            $sql= "CALL login(':email',:hash_password)";
            $hash_password= md5( $password); //Password encryption
           $sth =$conect->prepare($sql);
            $sth->bindParam('email', $email,PDO::PARAM_STR );
            $sth->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
            $sth->execute();
            $count = $sth->rowCount();
            $data = $sth->fetch(PDO::FETCH_OBJ);
            if($count)
            {

              echo var_dump($data);

            }else{

                return false;
            }


        }
          catch (PDOException $e)
          {

              die("Error occurred:" . $e->getMessage());

          }

    }


}
