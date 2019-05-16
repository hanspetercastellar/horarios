<?php
class admin_model{

    //creamos las propiedades para inicializarlas con la instancia de la coneccion
    protected $db;
    protected $conect;

    public function __construct()
    {
        //instanciamos la coneccion para que este disponible en toda la clase
        $this->db = new Conexion();
        $this->conect = $this->db->conectar();
    }


}
