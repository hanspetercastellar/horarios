<?php
  function cargaContenido($contenido, $accion){
  	require_once "Controller/" .$contenido. "_controlador.php";
  	$clase = $contenido."_controlador";
  	$cnt = new $clase();
  	require_once "Model/".$contenido."_Model.php";
  	$cnt->{$accion}();
  }
    $controladores = array(
                 "usuario" => array("index","regUsuario","usuarioeliminar","usuarioactualizar"),
                 "admin" => array("home","regHorario","PanelAdmin"),
                  "docente"=>array("regHorario")

    
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
