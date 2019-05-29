<?php
class docente_model{

    //creamos las propiedades para inicializarlas con la instancia de la coneccion


    public function __construct()
    {


    }

    public function verificarHorario($id)
    {
        $bd = new conexion();
        $c  = $bd->conectar();

        $sql = 'CALL verificarHorario(:id)';

        $sth = $c->prepare($sql);
        $sth->bindParam(':id',$id,PDO::PARAM_INT);
        $sth->execute();
        $count = $sth->rowCount();

        echo $count;


    }

    public function regHorario($lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$docente)
    {

        $bd = new conexion();
        $c  = $bd->conectar();

        if($c==null)
        {
            echo "conexion nula";
        }
        else{

            try{

                $sql='CALL regHorario(:lunes,:martes,:miercoles,:jueves,:viernes,:sabado,:docente)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':lunes', $lunes, PDO::PARAM_STR,45);
                $sth->bindParam(':martes',$martes, PDO::PARAM_STR,45);
                $sth->bindParam(':miercoles',$miercoles , PDO::PARAM_STR,45);
                $sth->bindParam(':jueves',$jueves, PDO::PARAM_STR,45);
                $sth->bindParam(':viernes',$viernes, PDO::PARAM_STR,45);
                $sth->bindParam(':sabado',$sabado, PDO::PARAM_STR,45);
                $sth->bindParam(':docente', $docente, PDO::PARAM_INT);
                $sth->execute();

            }catch (PDOException $e){

                die("Error ocurred:" . $e->getMessage());
                $estado = false;
            }

            $bd->cerrar();

            $estado=true;
           echo $estado;


        }

    }

    public function updateHorario($lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$docente)
    {
        $bd = new conexion();
        $c  = $bd->conectar();
        // echo   var_dump($lunes);die;

        $docente = intval($docente);
        if($c==null)
        {
            echo "conexion nula";
        }
        else{

            try{

                $sql='CALL updateHorario(:lunes,:martes,:miercoles,:jueves,:viernes,:sabado,:docente)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':lunes', $lunes, PDO::PARAM_STR,45);
                $sth->bindParam(':martes',$martes, PDO::PARAM_STR,45);
                $sth->bindParam(':miercoles',$miercoles , PDO::PARAM_STR,45);
                $sth->bindParam(':jueves',$jueves, PDO::PARAM_STR,45);
                $sth->bindParam(':viernes',$viernes, PDO::PARAM_STR,45);
                $sth->bindParam(':sabado',$sabado, PDO::PARAM_STR,45);
                $sth->bindParam(':docente', $docente, PDO::PARAM_INT);
                $sth->execute();

            }catch (PDOException $e){

                die("Error ocurred:" . $e->getMessage());
                $estado = false;
            }

            $bd->cerrar();

            $estado=true;
            echo $estado;
        }



    }
    
    public function regHorarioProfesor($docente)
    {

        $bd = new conexion();
        $c  = $bd->conectar();

        if($c==null)
        {
            echo "conexion nula";
        }
        else{

            try{

                $sql='CALL regHorarioDocente(:docente)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':docente', $docente, PDO::PARAM_INT);
                $sth->execute();

               $id = $sth->fetch(PDO::FETCH_COLUMN)[0];

            }catch (PDOException $e){

                die("Error ocurred:" . $e->getMessage());
                $estado = false;
            }

            //$bd->cerrar();


            return $id;


        }


    }

    public function getIdHoraiosDocentes($id_docente)
    {

        $db = new Conexion();
        $conect = $db->conectar();

        $sql = "CALL getIdHoraiosDocentes(:id_docente)";
        $sth =$conect->prepare($sql);
        $sth->bindParam(':id_docente', $id_docente,PDO::PARAM_INT );
        $sth->execute();
        $count = $sth->rowCount();

        return $sth->fetch(PDO::FETCH_COLUMN)[0];

    }

}
