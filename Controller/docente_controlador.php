<?php
class docente_controlador{



    public function regHorario()
    {
      $estado = false;

        $array = $_POST["datos"];
        //aqui se almacena el id de la tabla que esta haciendo foranea de la tabla horarios
        $id_docente_horario = docente_model::regHorarioProfesor($_SESSION['id_usuario']);


        for ($i=0; $i<= count($array)-1; $i++)
        {

           $estado =  docente_model::regHorario(
                $array[$i][0],
                $array[$i][1],
                $array[$i][2],
                $array[$i][3],
                $array[$i][4],
                $array[$i][5],
                $id_docente_horario

            );



        }

        echo $estado;
    }

    public function logout()
    {
        session_destroy();

        header("location: http://localhost/horarios/");

    }

    public function updateHorario()
    {

        $estado = false;

        $array = $_POST["datos"];
        //aqui se almacena el id de la tabla que esta haciendo foranea de la tabla horarios
        $id_docente_horario = docente_model::getIdHoraiosDocentes($_SESSION['id_usuario']);

        //var_dump($array);die;

        for ($i=0; $i<= count($array)-1; $i++)
        {

            $estado =  docente_model::updateHorario(
                $array[$i][0],
                $array[$i][1],
                $array[$i][2],
                $array[$i][3],
                $array[$i][4],
                $array[$i][5],
                $id_docente_horario

            );



        }

        echo $estado;

    }
}
