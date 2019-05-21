<?php
class docente_controlador{



    public function regHorario()
    {
      $estado = false;

        $array = $_POST["datos"];


        for ($i=0; $i<= count($array)-1; $i++)
        {

             docente_model::regHorario(
                $array[$i][0],
                $array[$i][1],
                $array[$i][2],
                $array[$i][3],
                $array[$i][4],
                $array[$i][5],
                1

            );



        }


    }

    public function logout()
    {
        session_destroy();

        header("location: http://localhost/horarios/");

    }
}
