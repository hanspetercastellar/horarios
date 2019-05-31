<div class="container mt-3 bg-light p-3"  >
    <div class="row">
        <div class="col">
            <h4 class="bg-dark p-1 text-white"> Registro de asignaturas </h4>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col col-sm-12 col-md-12 col-sm-12">
                <p class="lead"> Formulario para crear asignaturas </p>
            </div>
        </div>
        <div class="row">
            <div class="col col-sm-4 col-md-4 col-sm-4">
                        <label>Seleccione programa</label>
                        <select class="form-control custom-select" id="programas" >

                        </select>
            </div>
            <div class="col col-sm-4 col-md-4 col-sm-4">
                <label>Asignaturas</label>
                <select class="form-control custom-select" id="asignaturas" >

                </select>
            </div>
            <div class="col col-sm-4 col-md-4 col-sm-4">
                <label>Seleccione un docente</label>
                <select class="form-control custom-select" id="docentes" >
                    <option selected disabled>Seleccione uno</option>
                    <?php admin_model::getDocentes();

                    ?>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col col-sm-12 col-md-12 col-sm-12">
                <input type="submit" value="Asignar"  id="reg" class="btn btn-primary">
            </div>
        </div>


    <!--    <section class="container-fluidr mt-3">
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

    </div>-->


</div>

<script>

     $(document).ready(()=>{

        cargarProgramas()



         $("#programas").change(()=>{

             getAsignaturasXprogramas($("#programas").val())
             

         })


         $("#reg").click((e)=>{
             e.preventDefault()

                 $.post("?controlador=admin&accion=regAsignaturasDocentes",{"id_docente":$("#asignaturas").val(),"id_asignatura":$("#docentes").val()},(ret)=>{

                   if(ret)
                   {

                       alert("Asignatura creada correctamente")
                       $("#asignaturas").val("")
                       $("#docentes").val("")
                   }

                 })

         })


     })

     function  cargarProgramas()
     {

         $.get("?controlador=admin&accion=getProgramas",(response)=>{

             var json = $.parseJSON(response)

             $("#programas").html("")
              $("#programas").append(`<option selected value="0" disabled>Seleccione uno</option>`)
             $(json.data[0]).each((i,el)=>{

                 let option = `<option value=" ${el.id} ">${el.nombre}</option>`
                 $("#programas").append(option)
             })


         })

     }


     function getAsignaturasXprogramas(id) {

         $.post("?controlador=admin&accion=getAsignaturasXprogramas",{"id":id},(response)=>{
              var json = $.parseJSON(response)
              console.log(json);
            $(json).each((i,el)=>{

                if(json.length > 0)
                {
                    $("#asignaturas").append(`<option value="${el.id}">${el.nombre}</option>`)
                }else
                {

                    $("#asignaturas").append(`<option disabled value="" selected>Sin asignaturas</option>`)
                }


            })

         })

     }

     function asignar()
     {



     }


</script>
