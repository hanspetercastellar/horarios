<div class="container mt-3 bg-light p-3 ">
     <h4 class="p-1 bg-dark text-white">Disponibilidad docentes</h4>
       <hr class="my-4"/>
      <div class="container">
          <form class="form-row">
              <div class="col col-xl-4 col-md-4 col-sm-4">
                  <input class="form-control" type="text" placeholder="Escriba un nombre o  documento" list="docenteList" id="docente">
                  <datalist id="docenteList">
                  <?php admin_model::getDocentes();

                  ?>
                  </datalist>
              </div>
              <div class="col col-xl-2 col-md-2 col-sm-2">
                  <button class="btn btn-primary" id="buscar">Buscar</button>
              </div>
          </form>
      </div>
    <div class="container">
        <hr class="my-">
        <h5>Horas disponibles</h5>
        <section>
            <table id="table" class="table table-sm table-responsive-sm table-responsive-xl table-responsive-md table-striped table-light table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                <thead>
                <tr>
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

                buscarHorarioXdocente( $("#docente").val() );

            }


        })

    }

    function  buscarHorarioXdocente(cc)
    {

        $.post('?controlador=admin&accion=buscarHorarioXdocente',{"cc":cc},(response)=>{

            let json = $.parseJSON(response);
            $("#table tbody").html("")
            for(var i=0; i <= json.length; i++)
            {


                let tr = ` <tr>
                              <td>${ json[i].lunes } </td>
                             <td>${ json[i].martes }</td>
                              <td>${ json[i].miercoles }</td>
                              <td>${ json[i].jueves }</td>
                               <td>${ json[i].viernes }</td>
                               <td>${ json[i].sabado }</td>
                            </tr> `
                $("#table tbody").append(tr)

            }

            $("#table tbody tr").each((i,el)=>{

                let td = $(el).find("td");

                if($($(td)[i]).text()!= "")
                {
                    $($(td)[i]).text();
                }

            });


        });

    }



</script>