<div class="container mt-3 bg-light p-3 ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0">
            <h5 class="font-weight-light h4-responsive"><strong >Panel Docentes</strong> / Registro de disponibilidad horaria</h5>
        </ol>
    </nav>
     <div class="container" >

         <div class="row  mt-3 d-flex justify-content-start  ">

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
                            <input type="email" class="form-control form-control-sm">
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
         <section class="mt-5">
             <table id="table" class="table table-sm table-responsive-sm table-responsive-xl table-responsive-md table-striped table-light table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                 <thead>
                    <tr>
                        <th>HORA </th>
                        <th>LUNES</th>
                        <th>MARTES</th>
                        <th>MIERCOLES</th>
                        <th>JUEVES</th>
                        <th>SABADO</th>

                    </tr>
                 </thead>
                 <tbody>
                   <!-- <tr>
                        <td width="150">
                            <input type="text" id="hora" list="listHora" class="form-control form-control-sm">
                            <datalist id="listHora">
                            </datalist>
                        </td>
                        <td>
                            <select class="custom-select form-control form-control-sm">
                                <option value="1">Habilitado</option>
                                <option value="0">Desabilitado</option>
                            </select>
                        </td>
                        <td>
                            <select class="custom-select form-control form-control-sm">
                                <option value="1">Habilitado</option>
                                <option value="0">Desabilitado</option>
                            </select>
                        </td>
                        <td>
                            <select class="custom-select form-control form-control-sm">
                                <option value="1">Habilitado</option>
                                <option value="0">Desabilitado</option>
                            </select>
                        </td>
                        <td>
                            <select class="custom-select form-control form-control-sm">
                                <option value="1">Habilitado</option>
                                <option value="0">Desabilitado</option>
                            </select>
                        </td>
                        <td>
                            <select class="custom-select form-control form-control-sm">
                                <option value="1">Habilitado</option>
                                <option value="0">Desabilitado</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm">+</button>
                        </td>
                    </tr>-->
                 </tbody>
             </table>
         </section>
     </div>
</div>

<script>
    var year = new Date();
  window.onload= function () {

      var currenYear = year.getFullYear();
      var month = year.getMonth();

      $("#año").html(`${currenYear} `)
      cargarHoras()

  }

    function cargarHoras(quitarArray)
    {
        var horas = [ "06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00" ]
        $(horas).each((i,el)=>{
            $("#table tbody").append(`
                         <tr>
                            <td> ${el} </td>
                            <td>  </td>
                              <td> </td>
                             <td>  </td>
                             <td>  </td>
                             <td>  </td>
                         </tr>`);
        });

        $("#table tbody tr").each((i,el)=>{
            let tr = $(el).find("td");
            //alert(tr.length)
            for (let i = 0; i<= tr.length; i++)
            {
                $($(tr)[i]).mouseover(()=>{
                    $($(tr)[i]).addClass("bg-primary")
                });
                $($(tr)[i]).mouseout(()=>{
                    $($(tr)[i]).removeClass("bg-primary")
                });



            }

        });
    }
</script>
