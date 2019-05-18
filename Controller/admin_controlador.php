<?php
class admin_controlador{

    public function __construct()
    {

    }

    public function home()
    {
        require_once "View/template_navbar.php";
        require_once "View/admin/home.php";
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

}
