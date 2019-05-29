
<div class="container mt-3 bg-light p-3 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
            <h5 class="font-weight-light h4-responsive"><strong >Panel Docentes</strong> / Registro de disponibilidad horaria</h5>
        </ol>
    </nav>
     <div class="container" >

         <div class="row  mt-3 d-flex justify-content-start  ">
           <input type="hidden" id="id_docente" value="<?= $_SESSION["id_usuario"]?>">
             <div class=" col-xl-2 col-md-2 col-sm-2 border-right " style="border-right: #4e555b solid">
                 <h6>Información general</h6>
                 <div>Año en curso <strong id="año"></strong></div>
                <div>Periodo academico <strong >02</strong></div>
             </div>
             <div class="col-xl-2 col-md-2 col-sm-2 border-right " style="border-right: #4e555b solid">
                 <h6>Mis asignaturas</h6>
                    <ul class="list-group">
                        <li class="list-group-item lis">Matematicas</li>
                        <li class="list-group-item">Matematicas</li>
                        <li class="list-group-item">Matematicas</li>
                        <li class="list-group-item">Matematicas</li>
                    </ul>
             </div>
             <div class="col-xl-7 col-md-7 col-sm-7 border-right " >
                 <form >
                     <div class="row">
                         <div class="col-sm-12 col-xl-12">
                             <h6>Información personal</h6>
                         </div>
                         <div class="col col-xl-4 col-md-4 col-sm-4">
                             <label>Nombres</label>
                             <input type="text" class="form-control form-control-sm">
                         </div>
                         <div class="col col-xl-4 col-md-4 col-sm-4 ">
                             <label>Apellidos</label>
                             <input type="text" class="form-control form-control-sm">
                         </div>
                         <div class="col col-xl-4 col-md-4 col-sm-4">
                             <label>Telefono</label>
                             <input type="number" class="form-control form-control-sm">
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-xl-5 col-md-5 col-sm-5">
                            <label>Correo</label>
                            <input type="email" class="form-control form-control-sm" >
                        </div>
                         <div class="col-xl-5 col-md-5 col-sm-5">
                             <label>Contraseña</label>
                             <input type="password" class="form-control form-control-sm">
                         </div>
                     </div>
                     <div class="row d-flex justify-content-end">
                         <div class="col-xl-2 col-md-2 col-sm-2">
                             <button type="button" class="btn btn-primary btn-sm">Editar</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         <div class="row justify-content-between mt-3">
             <div class="col">

             </div>
             <div class="col">
                 <div class="row justify-content-end">
                     <div class="col-sm-2 col-md-2 col-md-2">
                         <button class="btn btn-sm btn-secondary">Resetear</button>
                     </div>
                     <div class="col-sm-4 col-md-4 col-md-4">
                         <button class="btn btn-sm btn-success" id="guardar">Guardar horario</button>
                     </div>
                 </div>
             </div>
         </div>
         <hr/>
         <section class="mt-5">
             <table id="table" class="table table-sm table-responsive-sm table-responsive-xl table-responsive-md table-striped table-light table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                 <thead>
                    <tr>
                        <th>HORA </th>
                        <th>LUNES</th>
                        <th>MARTES</th>
                        <th>MIERCOLES</th>
                        <th>JUEVES</th>
                        <th>VIERNES</th>
                        <th>SABADO</th>

                    </tr>
                 </thead>
                 <tbody>


                 </tbody>
             </table>
         </section>
         <section class="mt-5 hide" id="tablaOculta">
             <table id="table2" class="table table-sm table-responsive-sm table-responsive-xl table-responsive-md table-striped table-light table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                 <thead>
                 <tr>
                     <th>HORA </th>
                     <th>LUNES</th>
                     <th>MARTES</th>
                     <th>MIERCOLES</th>
                     <th>JUEVES</th>
                     <th>VIERNES</th>
                     <th>SABADO</th>

                 </tr>
                 </thead>
                 <tbody>
                 </tbody>
             </table>
         </section>
     </div>
</div>

<script>
    var year = new Date();
   window.onload= function () {

       //esta funcion carga la informacion del docente

          $("#tablaOculta").addClass("d-none")
         //console.log($("#id_docente").val())
          var currenYear = year.getFullYear();
          var month = year.getMonth();

          $("#año").html(`${currenYear}`)

          $("#guardar").click(function(){

                guardarHorario()
          })

                //cargarHoras()

            getHorarios()



  }

  function getHorarios()
  {
      let json= 0;
      $.post('?controlador=admin&accion=getHorarios',(response)=>{
          //console.log(JSON.parse(response));
          //json = JSON.parse(response)
          var horas = [ "06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00" ]
          console.log(response)
          if(response!="null")
          {
              console.log(JSON.parse(response));
              json = JSON.parse(response)

              $(json).each((i,el)=>{
                  $("#table tbody").append(`
                         <tr>
                            <td class="bg-secondary text-white" width="50"> ${horas[i]} </td>
                            <td>${el.lunes} </td>
                              <td>${el.martes} </td>
                             <td> ${el.miercoles}</td>
                             <td>${el.jueves} </td>
                             <td>${el.viernes} </td>
                           <td> ${el.sabado}</td>
                         </tr>`);
              });

              $("#table tbody tr").each((i,el)=>{

                  var td = $(el).find("td");

                  if($($(td)[i]).text()==" ")
                  {
                      alert()
                      $($(td)[i]).addClass("bg-success")
                  }


              })
              $("#table").DataTable({
                  "lengthChange": false,
                  "paging": false,
                  "destroy":true,
                  dom: 'Bfrtip',


                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
              });



          }else{

              cargarHoras()
          }
      })

  }

    function cargarHoras()
    {
            var horas = [ "06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00" ]

         $(horas).each((i,el)=>{
            $("#table tbody").append(`
                         <tr>
                            <td> ${el} </td>
                            <td> </td>
                              <td> </td>
                             <td> </td>
                             <td> </td>
                             <td> </td>
                           <td> </td>
                         </tr>`);
        });

        $("#table tbody tr").each((i,el)=>{
            let td = $(el).find("td");
            //alert(tr.length)
            for (let i = 1; i<= td.length; i++)
            {
                $($(td)[i]).mouseover(()=>{
                    $($(td)[i]).addClass("bg-primary")
                    $($(td)[i]).css("cursor","pointer")

                });
                $($(td)[i]).mouseout(()=>{
                    $($(td)[i]).removeClass("bg-primary")
                    $($(td)[i]).css("cursor","pointer")
                });

                $($(td)[i]).click(()=>{
                    if ( $($(td)[i]).hasClass('bg-success'))
                    {
                        $($(td)[i]).removeClass("bg-success")
                        $($(td)[i]).text("")

                    }else{
                        $($(td)[i]).text($($(td)[0]).text())
                        $($(td)[i]).addClass("bg-success")
                    }

                });


            }

        });
        $("#table").DataTable({
            "lengthChange": false,
            "paging": false,
            "destroy":true,
            dom: 'Bfrtip',


            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });

    }

/*esta funcion javaScript es la encargada de recorrer la tabla de horarios guardando cada fila de la tabla en una matriz para posteriormente
  enviarla al controlador docente en la accion regHorario
  */
    function guardarHorario()
    {
        //inicializo esta variable de tipo Array (convierto la variable en un arreglo vacio);
        //para almacenar cada fila de la tabla de horarios
        var array = new Array();
        // accedo a el elemento tr de la tabla con id #table y recorro todas sus filas con la funcion jquery each.
        $("#table tbody tr").each((i,el)=>{

            //con let creo la variable td que contiene cada celda de la fila
            let td = $(el).find("td");

          /*A continiacion almaceno en sus respectivas variables las horas disponibles y las no disponibles para posteriormente crear un arreglo por
            cada iteracion del ciclo each */
          //nota: tener en cuenta que el ciclo se repite de acuerdo al numero de filas de la tabla


                var lunes = $($(td)[1]).text();//Accede a el texto de la  celda numero 1 de cada fila, la cual equivale a el dia lunes
                var martes = $($(td)[2]).text();
                var miercoles = $($(td)[3]).text();
                var jueves = $($(td)[4]).text();
                var viernes = $($(td)[5]).text();
                var sabado = $($(td)[6]).text();

                //una vez obtenido todos los valores de cada celda por dia, se crea un arreglo por cada fila.
                var horasDisponibles = new Array(lunes,martes,miercoles,jueves,viernes,sabado)

                array.push(horasDisponibles);//en esta linea  agregamos con push el nuevo arreglo a la matriz que almacena todas las horas de todos los dias



        })
       //   localStorage.setItem("horarios",JSON.stringify(array))

        /*la funcion de jquery $.post() realiza una peticion ajax de tipo post. Recibe tres parametros; una cabecera la cual corresponde a la url
          ,las variables post que se envian en forma de objetos,y por ultipo una funcion callback, la cual maneja la respuesta del servidor */
            $.post("?controlador=docente&accion=regHorario",{"datos":array},function (response) {
                console.log(response)

                if(response)
                {
                    alert("Horario registrado")
                    getHorarios()
                }

            })




    }
     function verificarHorario(id_docente)
     {

         $.post('?controlador=docente&accion=verificarHorario',{"id":id_docente},(response)=>{

             return response;

         });

     }

</script>
