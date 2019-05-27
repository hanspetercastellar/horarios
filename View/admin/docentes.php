<div class="container mt-3 bg-light p-3 ">
    <h4 class="p-1 bg-dark text-white">Registro docentes y usuarios</h4>
    <hr class="my-4"/>
    <div class="container">
        <form autocomplete="off" id="form">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label>Rol</label>
                    <select id="rol" name="rol" class="form-control form-control-sm custom-select custom-select-sm">

                    </select>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <label>Nombre</label>
                    <input type="text"  name="nombre" required id="nombre" class="form-control-sm form-control">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Apellidos</label>
                    <input type="text"  name="apellidos" required id="apellidos" class="form-control-sm form-control">
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <label>Documento</label>
                    <input type="text"  name="documento" required id="documento" class="form-control-sm form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <label>Direccion</label>
                    <input  type="text" id="direccion" required name="direccion" class="form-control form-control-sm ">

                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Telefono</label>
                    <input type="text"  name="telefono" required required id="telefono" class="form-control-sm form-control">
                </div>

            </div>
            <div class="row">
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label>Correo</label>
                    <input type="email"   name="correo" required required id="correo" class="form-control-sm form-control">
                </div>
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <label>Contraseña</label>
                    <input type="password" required  name="pass" required id="pass" class="form-control-sm form-control">
                </div>
            </div>
             <div class="row mt-3">
                 <div class="col">
                     <input class="btn btn-primary" type="submit" value="Enviar" id="enviar">
                 </div>
             </div>

        </form>
    </div>
    <hr class="my-4"/>
    <div class="container">
        <table id="usuarios_table" class="table table-sm table-striped">
            <thead>
               <th>Rol</th>
               <th>Documento</th>
               <th>Nombre</th>
               <th>Apellidos</th>
               <th>Direccion</th>
               <th>Telefono</th>
               <th>Correo</th>
            </thead>
        </table>
    </div>

</div>

<script>

    //esperamos a que cargue el documento
    window.onload = function ()
    {

        getRoles()

       $("#enviar").click((e)=>{
           e.preventDefault()
           //serializeArray convierte los datos en un arreglo
          var form = $("#form").serializeArray();

          //teniendo los datos de forma de arreglo procedo a iterarlos para validar
           for (let i=0; i<form.length; i++ )
           {
             //en esta condicion valido todos los campos de mi formulario
               if(form[i].value =="")
               {
                   alert(`Disculpe el campo ${form[i].name} es obligatorio `)
                   return false
               }

           }
          //enviamos el formulario mediante ajax
           $.post("?controlador=usuario&accion=regUsuarios",$("#form").serialize(),(response)=>{

               console.log(response)

               if(response=="1")
               {

                   alert("Usuario registrado conexito")
               }else{

                   alert("Error usuario no registrado")
               }
           })





       })

    }

     function getRoles()
     {
         $.ajax({

             url:"?controlador=admin&accion=getRoles",
             type:'get',
             dataType:'json'

         }).done(function (response) {
             console.log(response)

             $(response).each((i,el)=>{

                 $("#rol").append(`<option value="${el.id} "> ${el.rol} </option>`)
             })

         })

     }

     function cargarTabla()
     {

         $("#usuarios_table").DataTable({
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ],

             ajax:{

                 type:"get",
                 url: "?controlador=usuario&accion=getUsuarios",
                 dataType: "json"

             },
             "columns": [
                 {"data": "estanque"},
                 {"data": "cantidad"},
                 {"data": "peso"},
                 {"data": "promedio"},
                 {"data": "eliminar"}
             ],
         })
     }
</script>