<div class="container mt-3 bg-light p-3 ">
     <h4 class="p-1 bg-dark text-white">Disponibilidad docentes</h4>
       <hr class="my-4"/>

    <p class="lead" style="font-size: 12pt"> Por favor seleccione un docente de la lista:  </p>
      <div class="container row">


              <div class="col col-xl-6 col-md-6 col-sm-5" >
                  <form class="form-row">
                      <div class="col col-xl-8 col-md-8 col-sm-8">
                          <input class="form-control" type="text" placeholder="Selecciona uno" list="docenteList" id="docente">
                          <datalist id="docenteList">
                          <?php admin_model::getDocentes();

                          ?>
                          </datalist>
                      </div>
                      <div class="col col-xl-2 col-md-2 col-sm-2">
                          <button class="btn btn-primary" id="buscar">Buscar</button>
                      </div>
                  </form>

                  <div class="row mt-3">
                      <div class="col-md-12 ">
                          <section class="border p-3" style="border-radius: 0px 80px 0px 60px; ">
                              <p class="lead" style="font-size: 12pt; font-style: italic">Las horas disponibles son las que se encuentran marcadas</p>
                          </section>
                      </div>
                  </div>
              </div>
          <div class="col border-left">
                <div class="row">
                    <div class="col col-md-5 col-xl-5 col-sm-5 border-right">
                                <div class="row">
                                    <div class="col col-md-12 col-xl-12 col-sm-12">
                                        <h4>Info personal</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12 col-xl-12 col-sm-12">
                                        <label>Nombre</label>
                                        <input type="text" id="nombre" disabled class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12 col-xl-12 col-sm-12">
                                        <label>Apellidos</label>
                                        <input type="text" id="apellido" disabled class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12 col-xl-12 col-sm-12">
                                        <label>Numero de cedula</label>
                                        <input type="text" id="cedula" disabled class="form-control form-control-sm">
                                    </div>
                                </div>
                    </div>

                    <div class="col col-md-7 col-xl-7 col-sm-7">
                        <div class="row">
                            <div class="col col-md-12 col-xl-12 col-sm-12">
                                <h4>Asignaturas a cargo</h4>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush " id="ul" style="height:250px; overflow-y: scroll;">

                        </ul>
                    </div>



                </div>
          </div>
      </div>
    <div class="container">
        <hr class="my-">
        <h5>Horas disponibles</h5>
        <section>
            <table id="table" class="table table-sm table-striped">
                <thead>
                <tr>
                    <th width="50">HORAS</th>
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

    window.onload = function () {


        $("#buscar").click((e)=>{

            e.preventDefault()

            if($("#docente").val()=="")
            {
                alert("Disculpe, no se admiten datos vacios");
            }else{

                buscarHorarioXdocente($("#docente").val());

            }
        })

        $("#docente").change(()=>{

              $.post("?controlador=admin&accion=datosDocente",{"id":$("#docente").val()},(response)=>{

                  var json = JSON.parse(response)

                  $("#nombre").val(json[0].nombre)
                  $("#apellido").val(json[0].apellido)
                  $("#cedula").val(json[0].documento)
                   console.log(json[1])

                  $("#ul").html("")

                  $(json[1]).each((i,el)=>{


                      $("#ul").append(`
                                 <li class="list-group-item"><span>${i+1}</span>:  ${el.asignatura}</li>
                                 `)


                  })


              });

        })



    }

    function  buscarHorarioXdocente(cc)
    {
        var horas = [ "06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00" ]
        $.post('?controlador=admin&accion=buscarHorarioXdocente',{"cc":cc},(response)=>{

            console.log(response)
            let json = $.parseJSON(response);

            $("#table tbody").html("")
            $(json).each((i,el)=>{

                let tr = ` <tr>
                              <td class="bg-light"> ${horas[i]} </td>
                              <td>${el.lunes}</td>
                             <td>${el.martes}</td>
                              <td>${el.miercoles}</td>
                              <td>${el.jueves}</td>
                               <td>${el.viernes}</td>
                               <td>${el.sabado}</td>
                            </tr> `

                $("#table tbody").append(tr)
            });

            $("#table").DataTable({
                "lengthChange": false,
                "paging": false,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            });



        });


    }


</script>
