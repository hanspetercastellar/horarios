<?php
class admin_controlador{

    public function __construct()
    {

    }

    public function home()
    {
        if(isset($_SESSION["rol"]))
        {
            if ($_SESSION["rol"]==1){

                require_once "View/template_navbar.php";
                require_once "View/admin/home.php";



            }else if ($_SESSION["rol"]==2)
            {

                require_once "View/template_navbar.php";
                require_once "View/admin/administracion.php";

            }


        }else{

            echo "acceso restringido, por favor inicie session";
        }

    }

    public function login()
    {
       $estado= false;

       $estado =  admin_model::login($_POST["email"],$_POST["password"]);

       if($estado)
       {

          var_dump($estado);
       }
    }

    public function horarios()
    {
        require_once "View/template_navbar.php";
        require_once "View/admin/horarios.php";





    }

}
