<?php
class usuario_controlador{

	public function index(){
		//require_once "View/template_navbar.php";
        require_once "View/header.php";

        require_once "View/login.php";



	}


	public function regUsuarios(){
		$estado=false;
        $estado=usuario_model::regUsuarios(

		$_POST['nombre'],
		$_POST['apellidos'],
		$_POST['documento'],
		$_POST['direccion'],
		$_POST['telefono'],
		$_POST['correo'],
        $_POST['pass'],
            $_POST['rol']

	  );
        if ($estado==true) {

            echo $estado;

        }else{

        }
	}

	public function verificarDocumento()
    {

        $doc = $_POST["doc"];

        $existe= usuario_model::verificarDocumento($doc);

        echo $existe;
    }

    public function verificarCorreo()
    {

        $correo = $_POST["correo"];

        $existe= usuario_model::verificarCorreo($correo);

        echo $existe;
    }

    public function getUsuarios()
    {

        $usuarios = usuario_model::getUsuarios();

        echo json_encode($usuarios);

    }






}
