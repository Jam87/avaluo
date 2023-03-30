<?php
### CLASE: ModeloModel ###
class ModelosModel extends Mysql
{
    private $idmodelo;
    private $nombre;
    private $estado;
    private $tipoId;
    private $marcaId;
   

    public function __construct()
    {
        parent::__construct();
    }


    ### COMBOX:TIPO DE VEHICULO ###
    public function comboxTipo()
    {

        /* "SELECT p.codproducto, p.descripcion, p.precio, pr.codproveedor, pr.proveedor 
        FROM producto p 
        INNER JOIN proveedor pr 
        ON p.proveedor = pr.codproveedor 
        WHERE p.codproducto = $id_producto";*/

        $sql = "SELECT * FROM tipo_vehiculo";

        $request = $this->select_all($sql);
        return $request;
    }

    ### COMBOX:OBTENER MARCA ###
    public function comboxMarcaVehId(int $intIdTipoVehiculo){

        $this->marcaId = $intIdTipoVehiculo;
       
        $sql = "SELECT idMarca, marca FROM marca WHERE tipoId = $this->marcaId";
         
         /*INNER JOIN proveedor pr 
         ON p.proveedor = pr.codproveedor 
         WHERE p.codproducto = $id_producto";*/
    
        //$sql = "SELECT * FROM tipo_vehiculo";   
        
        $request = $this->select_all($sql);
        return $request;
    }
    


    ### MODELO: MOSTRAR TODOS LOS MODELOS ###
    public function selectModelos()
    {
        #Sentencia

        $sql = "SELECT m.idmodelo, t.descripcion, ma.marca, m.nombre, m.estado 
                FROM modelos m
                INNER JOIN tipo_vehiculo t
                ON m.tipoId = t.id
                INNER JOIN marca ma
                ON m.marcaId = ma.idMarca
                WHERE m.estado != 0";

        #Mando a llamar la función(select_all)
        $request = $this->select_all($sql);
        return $request;
    }

    ### MODELO: GUARDAR UN NUEVO MODELO###
    public function insertModelo(int $selectVehiculo, int $selectMarca, string $modelo, int $intEstado)
    {
       
        $this->tipoId  = $selectVehiculo;
        $this->marcaId = $selectMarca;
        $this->nombre  = $modelo;
        $this->estado  = $intEstado;
   
        #Consulta
        $sql = "INSERT INTO modelos(nombre, tipoId, marcaId, estado) VALUES(?,?,?,?)";

        $arrData = array( $this->nombre, $this->tipoId, $this->marcaId, $this->estado);

        $requestInsert = $this->insert($sql, $arrData);
        return $requestInsert;
    }


    ### MODELO: ELIMINAR MODELOS ###
    public function deleteModelo(int $intIdModelo)
    {

        #id
        $this->idmodelo = $intIdModelo;

        $sql = "UPDATE modelos SET estado = ? WHERE idmodelo = {$this->idmodelo}";

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
    public function editModelo(int $idModelo)
    {

        //Buscar Tipo de Usuario
        $this->idmodelo = $idModelo;
        $sql = "SELECT * FROM modelos WHERE idmodelo = {$this->idmodelo}";
        $request = $this->select($sql);
        return $request;
    }


    ### MODELO: ACTUALIZAR MODELO ###
    public function updateMarca(int $intIdMarca, string $nomMarca, int $tipoVehiculo, int $intEstado)
    {

        $this->idMarca = $intIdMarca;
        $this->marca   = $nomMarca;
        $this->estado  = $intEstado;
        $this->tipoId  = $tipoVehiculo;

        $sql = "SELECT * FROM marca WHERE marca = '{$this->marca}' AND idMarca != $this->idMarca";

        $request = $this->select_all($sql);

        if (empty($request)) {
            $sql = "UPDATE marca SET marca = ?, estado = ?, tipoId = ? WHERE idMarca = $this->idMarca";
            $arrData = array($this->marca, $this->estado, $this->tipoId);

            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }
}
