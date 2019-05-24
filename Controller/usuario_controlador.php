<?php
class usuario_controlador{

	public function index(){
		//require_once "View/template_navbar.php";
        require_once "View/header.php";

        require_once "View/login.php";



	}


	public function regUsuario(){
		$estado=false;
        $estado=usuario_model::regUsuario(

		$_POST['txtlogin'], 
		$_POST['txtpassword'],
		$_POST['txtnombre'],
		$_POST['txtcedula'],
		$_POST['txtfecha']
		
	  );
        if ($estado==true) {
        	  echo "<script>";
              echo  "alert('USUARIO REGISTRADO CORRECTAMENTE')";
              echo "</script>";
              require_once "View/template_navbar.php";
			require_once "View/login.php";
        }else{

        }
	}

	public function consusuario(){
	
	$json=usuario_model::consusuario();
	$json_tabla = json_decode($json);
						
						
										for($i=0;$i<count($json_tabla);$i++){ 
										echo "<tr>
										
										<td>".$json_tabla[$i]->IdUsuario."</td>
										<td>".$json_tabla[$i]->LoginUsuario."</td>
										<td>".$json_tabla[$i]->PasswordUsuario."</td>
										<td>".$json_tabla[$i]->NombreUsuario."</td>
										<td>".$json_tabla[$i]->cedulaUsuario."</td>
										<td>".$json_tabla[$i]->FechaUsuario."</td>
										<td><a href=#><button type='button' class='boton1 btn btn-primary' data-toggle='modal' data-target='#modaleditar'><span class='icon-edit'>EDITAR</span></button></a></td>
										<td><a href=#><button type='button' class='boton2 btn btn-danger' data-toggle='modal' data-target='#modaleliminar'><span class='icon-cup'>ELIMINAR</span></button></a></td>
										</tr>";
										}       								
									
				


}



public function usuarioeliminar(){
		$estado=false;
        $estado=usuario_model::usuarioeliminar(
		$_POST['modal_txtid_de']
		
		
	  );
        if ($estado==true) {
        	  echo "<script>";
              echo  "alert('USUARIO ELIMINADO CORRECTAMENTE')";
              echo "</script>";
              require_once "View/template_navbar.php";
			  require_once "View/login.php";
        }else{

        }
	}


	public function usuarioactualizar(){
		$estado=false;
        $estado= usuario_model::usuarioactualizar(
        $_POST['modal_txtid_up'], 
		$_POST['modal_txtlogin_up'], 
		$_POST['modal_txtpassword_up'],
		$_POST['modal_txtnombre_up'],
		$_POST['modal_txtcedula_up'],
		$_POST['modal_txtfec_up']
		
	  );
        if ($estado==true) {
        	  echo "<script>";
              echo  "alert('USUARIO ACTUALIZADO CORRECTAMENTE')";
              echo "</script>";
              require_once "View/template_navbar.php";
			  require_once "View/login.php";
        }else{

        }
	}
	/*
	public function registro(){
		require_once "View/usuario/frmRegistro.php";		
	}
	public function consulta(){
		require_once "View/usuario/frmbuscar.php";
  }

	
   
	public function valUsuario(){
	$estado = usuario_model::valUsuario($_POST['usuario'],$_POST['pass']);
	if(isset($_SESSION['USU_ID']))
		header("Location: /mvcBlog");
	else{
		require_once "View/usuario/frmLogin.php";
		echo "datos incorrectos";
		}
	}
	public function Cerrar(){
		if (isset($_SESSION['USU_ID'])){
			session_destroy();
			header("Location: /mvcBlog");
		}
		}


		*/
	}
