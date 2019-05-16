


<div class="menu">	
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<a class="navbar-brand" href="#"> <?php if(!isset($_SESSION["user"])){ ?> LOGIN <?php } else { ?> Geometria <?php } ?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
    <?php if(isset($_SESSION["user"])) { ?>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="#">Cuadrado</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Rectangulo</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Triangulo</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Circulo</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Rombo</a>
			</li>
		</ul>
	</div>
    <?php } ?>
</nav>
</div>
