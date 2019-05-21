<?php
class docente_model{

    //creamos las propiedades para inicializarlas con la instancia de la coneccion


    public function __construct()
    {


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

}
