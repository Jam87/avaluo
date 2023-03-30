<?php
 ### CLASE: AvaluoModel. ###
class AvaluoModel extends Mysql
{
    private $id_tavaluo;
    private $descripcion;
    private $estado;
    private $tipoId ;


    public function __construct()
    {
        parent::__construct();
    }

    ### COMBOX:TIPO DE VEHICULO ###
    public function comboxTipo(){

        /* "SELECT p.codproducto, p.descripcion, p.precio, pr.codproveedor, pr.proveedor 
        FROM producto p 
        INNER JOIN proveedor pr 
        ON p.proveedor = pr.codproveedor 
        WHERE p.codproducto = $id_producto";*/

        $sql = "SELECT * FROM tipo_vehiculo";   
        
        $request = $this->select_all($sql);
        return $request;
    }

    ### MODELO: MOSTRAR TODOS LOS TIPOS DE AVALUO ###
    public function selectTavaluo()
    {
        #Sentencia
        $sql = "SELECT *
               FROM tvaluo              
               WHERE estado != 0";

        #Mando a llamar la función(select_all)
        $request = $this->select_all($sql);
        return $request;
    }

    ### MODELO: GUARDAR UN NUEVO TIPO DE USUARIO ###
    public function insertMarca(string $marca, int $estado, int $tipoV){
   
        $this->marca  = $marca;
        $this->estado = $estado;  
        $this->tipoId = $tipoV;
   
        #Consulta
        $sql ="INSERT INTO marca(marca, estado, tipoId) VALUES(?,?,?)";
        
        $arrData = array($this->marca, $this->estado, $this->tipoId);  
                        
        $requestInsert = $this->insert($sql,$arrData);
        return $requestInsert;                 
   
    }


    ### MODELO: ELIMINAR MARCA ###
    public function deleteMarca(int $intIdMarca)
    {

        #id
        $this->idMarca = $intIdMarca;

        $sql = "UPDATE marca SET estado = ? WHERE idMarca = {$this->idMarca}";

        $arrData = array(0);
        $request = $this->update($sql, $arrData);

        if ($request) {
            $request = 'ok';
        } else {
            $request = 'error';
        }
        return $request;
    }
 

    ### MODELO: EDITAR MARCA ###
    public function editMarca(int $idMarca){
        
        //Buscar Tipo de Usuario
        $this->idMarca = $idMarca;
        $sql = "SELECT * FROM marca WHERE idMarca = {$this->idMarca}";
        $request = $this->select($sql);
        return $request;
    }

   
    ### MODELO: ACTUALIZAR MARCA ###
    public function updateMarca(int $intIdMarca, string $nomMarca, int $tipoVehiculo, int $intEstado){

        $this->idMarca = $intIdMarca;
        $this->marca   = $nomMarca;
        $this->estado  = $intEstado;
        $this->tipoId  = $tipoVehiculo;

        $sql = "SELECT * FROM marca WHERE marca = '{$this->marca}' AND idMarca != $this->idMarca";

        $request = $this->select_all($sql);

        if(empty($request))
        {
            $sql = "UPDATE marca SET marca = ?, estado = ?, tipoId = ? WHERE idMarca = $this->idMarca";
            $arrData = array($this->marca, $this->estado, $this->tipoId);
          
            $request = $this->update($sql,$arrData);
        }else{
            $request = "exist";
        }
        return $request;			
    }
   
}
