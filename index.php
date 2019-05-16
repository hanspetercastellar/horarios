<?php
session_start();
require_once ('Model/conexion.php');
if(isset($_GET['controlador']) && isset($_GET['accion'])){
	$controlador = $_GET['controlador'];
	$accion      = $_GET['accion'];
}else{
	$controlador = "usuario";
	$accion     = "index";
}
$URL = "http://$_SERVER[HTTP_HOST]"."/horarios";
require_once "View/header.php";
