


<div class="menu">	
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<a class="navbar-brand" href="#"> <?php if($_SESSION["rol"]==1){ ?> DOCENTE <?php } else if($_SESSION["rol"]==2) { ?> Administración <?php } ?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
    <?php if(isset($_SESSION["nombre"])) { ?>
	<div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
		<ul class="navbar-nav">
            <?php if($_SESSION["rol"]==2){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?controlador=admin&accion=horarios">Horarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controlador=admin&accion=docentes">Usuarios</a>
                    </li>
                   <li class="nav-item">
                        <a class="nav-link" href="?controlador=admin&accion=asignaturas">Asignaturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controlador=admin&accion=programas">Programas</a>
                    </li>
            <?php } ?>
		</ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Bienvenido</a>
            </li>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION["nombre"]; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?controlador=docente&accion=logout" onclick="localStorage.setItem('horarios','0')">Salir</a>

                    </div>
                </div>


        </ul>
	</div>
    <?php } ?>
</nav>
</div>
