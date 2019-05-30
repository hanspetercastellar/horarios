<?php
  function cargaContenido($contenido, $accion){
  	require_once "Controller/" .$contenido. "_controlador.php";
  	$clase = $contenido."_controlador";
  	$cnt = new $clase();
  	require_once "Model/".$contenido."_Model.php";
  	$cnt->{$accion}();
  }
    $controladores = array(
                 "usuario" => array("index","regUsuarios","verificarDocumento","verificarCorreo","getUsuarios"),
                 "admin" => array("home",
                                  "login",
                                  "PanelAdmin",
                                  "horarios",
                                  "getHorarios",
                                 "buscarHorarioXdocente",
                                 "docentes",
                                   "asignaturas",
                                    "programas",
                                       "getRoles",
                                        "datosDocente",
                                         "getProgramas",
                                          "eliminarPrograma",
                                           "regProgramas"
                                            ),
                  "docente"=>array("regHorario","logout","updateHorario")

    
    );
if (array_key_exists($controlador, $controladores)){
	if(in_array($accion, $controladores[$controlador])){
		cargaContenido($controlador, $accion);
	}
	else{
		echo "<center><h1> Este contenido no existe </h1></center>";
 
  ?>
 <center> <img src="<?php echo $URL."/Resource/img/pn.jpg";?>";></center>
    
<?php
 }
} 

?>
