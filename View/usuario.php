<script>
    $(document).ready(function(){
        $(".boton1").click(function(){
             var valor = [];
             var i=0;
             // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){
                //valores+=$(this).html()+"\n";
                valor[i]=$(this).html();
                i++;
            });
           // for(var a=0;a<=2;a++){
            // alert( valor[a]);
            //}
             $("#modal_txtid_up").val(valor[0]);
             $("#modal_txtlogin_up").val(valor[1]);
             $("#modal_txtpassword_up").val(valor[2]);
             $("#modal_txtnombre_up").val(valor[3]);
             $("#modal_txtcedula_up").val(valor[4]);
             $("#modal_txtfec_up").val(valor[5]);


        });
    });
    </script>
     <script>
    $(document).ready(function(){
        $(".boton2").click(function(){
             var valor = [];
             var i=0;
             // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){
                //valores+=$(this).html()+"\n";
                valor[i]=$(this).html();
                i++;
            });
           // for(var a=0;a<=2;a++){
            // alert( valor[a]);
            //}
              $("#modal_txtid_de").val(valor[0]);
             $("#modal_txtlogin_de").val(valor[1]);
             $("#modal_txtpassword_de").val(valor[2]);
             $("#modal_txtnombre_de").val(valor[3]);
             $("#modal_txtcedula_de").val(valor[4]);
             $("#modal_txtfec_de").val(valor[5]);

        });
    });
    </script>
<div class="container">
	<form action="?controlador=usuario&accion=regUsuario" method="POST">
	<br><center><h1> </h1></center>
	<div class="card border-dark mb-3">
	<div class="card border-header"><center><h1>USUARIO</h1></center></div>
	<div class="card-body">
		<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					El cuadrado en una figura geometrica plana (dos dimensiones) cuya caracterisitca principal es de tener cuatro lados iguales y cuatro angulos rectos(angulos de 90°).<br>Para calcular el perimetro de un cuadrado se suman cuatro veces el lado o simplemente se multiplica el lado por cuatro.
					<br> Para el caso del area se calcula multiplicando lado por lado o lado al cuadrado.
								</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6 ">
				<input type="text" name="txtlogin" placeholder="Digite Usuario" class="form-control"><br>
				<input type="password" name="txtpassword" placeholder="Digite Password" class="form-control"><br>
				<input type="text" name="txtnombre" placeholder="Digite Usuario" class="form-control"><br>
				<input type="text" name="txtcedula" placeholder="Digite Cedula" class="form-control"><br>

				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
					<input type="date" name="txtfecha"  class="form-control"><br>
					<div class="group-control">
						<input type="submit" class="btn btn-danger" value="Registrar">
					</div>


				</div>
		</div>
		</div>

	</div>


</div>
</form>


</div>



<div class="container">
	<div class="row">
		<div class= "col-md-12">
			<div class="table-responsive" >
				 <table class="table table-dark"><br>

			 <tr><th>Id</th><th>Usuario</th><th>Passwords</th><th>nombre</th><th>cedula</th><th>fecha</th><th>Editar</th><th>Elimianar</th></tr>
				<?php usuario_controlador::consusuario(); ?>
			</table>
			</div>
		</div>
		</div>
</div>

</div>




<div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="Agregar estudiante" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="agregar estudiante">Edicion de Usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<!--Inicio Formulario de registro-->
	      	<form action="?controlador=usuario&accion=usuarioactualizar" method="post">
	      		<!-- Inicio Body Modal -->
	      		<div class="container">
	      			<div class="row">
	      				<!--Inicio Inputs-->
	      				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 align-self-center">

	      					<label>Id</label>
	      					<input type="text" name="modal_txtid_up" id="modal_txtid_up"  class="form-control" required readonly="readonly">
	      					<label>Login</label>
	      					<input type="text" name="modal_txtlogin_up" id="modal_txtlogin_up" placeholder="Login" class="form-control" required>
	      					<label>Password</label>
	      					<input type="Password" name="modal_txtpassword_up" id="modal_txtpassword_up" placeholder="Password" class="form-control" required>
	      					<label>Nombre</label>
	      					<input type="text" name="modal_txtnombre_up" id="modal_txtnombre_up" placeholder="Nombre" class="form-control" required>
	      					<label>Cedula</label>
	      					<input type="text" name="modal_txtcedula_up" id="modal_txtcedula_up" placeholder="Cedula" class="form-control" required>
	      				</div>
	      				<!--Fin Inpus-->

	      				<!--Inicio Inputs-->
	      				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

	      					<label>Fecha</label>
	      					<input type="date" name="modal_txtfec_up" id="modal_txtfec_up"  class="form-control" required><br>
	      					<input type="submit" name="modal_btnregistrar_up" value="Editar" class="btn btn-dark btn-justified">
	      					<input type="submit" name="modal_btncancelar_up" value="Cancelar" class="btn btn-primary">
	      				</div>
	       			</div>
	      		</div>
	      		<!-- Fin Body Modal -->
	      	</form>
	      	<!--Fin Formulario de registro-->

	      </div>
	    </div>
	  </div>
	</div>
	<!-- Fin modal agregar estudiante -->

<div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="Agregar estudiante" aria-hidden="true">
	 <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="agregar estudiante">Eliminacion  de Usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<!--Inicio Formulario de registro-->
	      	<form action="?controlador=usuario&accion=usuarioeliminar" method="post">
	      		<!-- Inicio Body Modal -->
	      		<div class="container">
	      			<div class="row">
	      				<!--Inicio Inputs-->
	      				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 align-self-center">

	      					<label>Id</label>
	      					<input type="text" name="modal_txtid_de" id="modal_txtid_de"   class="form-control" required readonly="readonly">
	      					<label>Login</label>
	      					<input type="text" name="modal_txtlogin_de" id="modal_txtlogin_de"  class="form-control" required readonly="readonly">
	      					<label>Password</label>
	      					<input type="Password" name="modal_txtpassword_de" id="modal_txtpassword_de"  class="form-control" required readonly="readonly">
	      					<label>Nombre</label>
	      					<input type="text" name="modal_txtnombre_de" id="modal_txtnombre_de"  class="form-control" required readonly="readonly">
	      					<label>Cedula</label>
	      					<input type="text" name="modal_txtcedula_de" id="modal_txtcedula_de"  class="form-control" required readonly="readonly">
	      				</div>
	      				<!--Fin Inpus-->

	      				<!--Inicio Inputs-->
	      				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

	      					<label>Fecha</label>
	      					<input type="date" name="modal_txtfec_de" id="modal_txtfec_de"  class="form-control" required readonly="readonly"><br>
	      					<input type="submit" name="modal_btnregistrar_de" value="Eliminar" class="btn btn-danger btn-justified">
	      					<input type="submit" name="modal_btncancelar_de" value="Cancelar" class="btn btn-primary">
	      				</div>
	       			</div>
	      		</div>
	      		<!-- Fin Body Modal -->
	      	</form>
	      	<!--Fin Formulario de registro-->

	      </div>
	    </div>
	  </div>
	</div>
	<!-- Fin modal agregar estudiante -->



</body>
</html>
