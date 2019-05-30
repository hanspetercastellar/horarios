<div class="container mt-3 bg-light p-3 ">
    <h4 class="p-1 bg-dark text-white">Gestion de programas</h4>
    <div class="container">
        <div class="row">
            <div class="col col-sm-12 col-md-12 col-sm-12">
                <p class="lead"> Formulario para crear programas </p>
            </div>
        </div>
        <div class="row">
            <div class="col col-sm-12 col-md-12 col-sm-12">
                <section class="border p-3">
                    <div class="form-group">
                        <label>Nombre del programa</label>
                        <input type="text"  onkeyup="this.value = this.value.toUpperCase();" id="programa" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit"  id="reg" class="btn btn-primary">
                    </div>
                </section>
            </div>
        </div>

        <section class="container-fluidr mt-3">
            <div class="row">
                <div class="col"><h5 class="bg-dark text-white">Listado de programas</h5></div>
            </div>
            <div class="row">
                <div class="col col-md-12">
                     <table class="table" id="table">
                         <thead>
                            <tr>
                                <th>Item</th>
                                <th>Nombre del programa</th>
                                <th>Fecha de creacion</th>
                                <th>Eliminar</th>
                            </tr>
                         </thead>
                     </table>
                </div>
            </div>
        </section>

    </div>
</div>
<script>

    window.onload = function (){

        cargarTabla()

        $("#reg").click(()=>{

          if($("#programa").val()=="")
          {
              alert("No se admiten datos vacios")
              return false
          }else{

              regPrograma($("#programa").val())
          }


        })
    }

    function cargarTabla()
    {
       $("#table").DataTable({
           "destroy":true,
           dom: 'Bfrtip',


           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print'
           ],

           ajax:{
               method:"get",
               url:"?controlador=admin&accion=getProgramas",
               dataType:"json"

           },
           "columns": [
               {"data": "item"},
               {"data": "nombre"},
               {"data": "fecha"},
               {"data": "accion"}

               ]
       })

    }

     function regPrograma(programa)
        {
            $.post("?controlador=admin&accion=regProgramas",{"dato":programa},(response)=>{


                cargarTabla()
                $("#programa").val("")
            })


        }

    function eliminar(id)
    {
        var option = confirm("Desea eliminar este registro?");
        if(option==true)
        {
            $.post("?controlador=admin&accion=eliminarPrograma",{"id":id},(response)=>{


                cargarTabla()
            })
        }

    }

</script>

