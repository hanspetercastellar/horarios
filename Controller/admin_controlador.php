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
                require_once "View/header.php" ;
                require_once "View/template_navbar.php";

                require_once "View/admin/home.php";



            }else if ($_SESSION["rol"]==2)
            {
                require_once "View/header.php" ;
                require_once "View/template_navbar.php";
                require_once "View/admin/administracion.php";

            }


        }else{

            echo "acceso restringido, por favor inicie session";
        }

    }

    public function getHorarios()
    {

        $id = admin_model::getIdHoraiosDocentes($_SESSION["id_usuario"]);

        $horarios = admin_model::getHorariosXdocente($id);

        echo  json_encode($horarios);

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
        require_once "View/header.php" ;
        require_once "View/template_navbar.php";
        require_once "View/admin/horarios.php";

    }

    public function buscarHorarioXdocente()
    {
        $cedula = $_POST["cc"];

        $horarios = admin_model::buscarHorarioXdocente($cedula);

        echo json_encode($horarios);
    }

    public function docentes()
    {
        require_once "View/header.php" ;
        require_once "View/template_navbar.php";
        require_once "View/admin/docentes.php";

    }
    public function asignaturas()
    {
        require_once "View/header.php" ;
        require_once "View/template_navbar.php";
        require_once "View/admin/asignaturas.php";

    }
    public function programas()
    {
        require_once "View/header.php" ;
        require_once "View/template_navbar.php";
        require_once "View/admin/programas.php";

    }

    public function getRoles()
    {

        $roles = admin_model::getRoles();

        echo json_encode($roles);

    }

}
