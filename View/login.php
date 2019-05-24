<?php require_once "View/header.php"; ?>

<script>
    $(document).ready(function(){

    });
    </script>

<div class="container d-flex bd-highlight mt-lg-5 mt-sm-1 mt-md-3  w-75 justify-content-center ">


    <div class="align-self-center shadow p-4 mb-4  bg-light   p-5">
        <div class="  "><h3 class="font-weight-light text-sm-left ">Inicie sesion</h3></div>
        <form method="POST" action="?controlador=admin&accion=login" aria-label="Login">

            <div class="form-group row ">
                <label for="email" class="col-sm-4 col-form-label text-md-right"></label>
                <div class="col-xl-12">
                    <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="Correo" required autofocus>
                </div>
            </div>
            <div class="form-group row ">
                <label for="password" placeholder="Contraseña" class="col-md-4 col-form-label text-md-right"></label>

                <div class="col-xl-12">
                    <input id="password" placeholder="Contraseña" type="password" class="form-control" name="password" required>
                </div>
            </div>

            <div class="col-xl-12 col-sm-12 col-md-12 d-flex justify-content-center ">

                    <button type="submit" class="btn btn-outline-primary  ">
                       Entrar
                    </button>


            </div>
        </form>
    </div>
</div>



</body>
</html>
