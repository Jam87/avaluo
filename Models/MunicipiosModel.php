<?php
 ### CLASE: MunicipiosModel ###
class MunicipiosModel extends Mysql
{
    private $idMun;
    private $nombre;
    private $depId ;
    private $estado;


    public function __construct()
    {
        parent::__construct();
    }

    ### COMBOX:TIPO DE DEPARTAMENTO ###
    public function comboxDepat(){

        /* "SELECT p.codproducto, p.descripcion, p.precio, pr.codproveedor, pr.proveedor 
        FROM producto p 
        INNER JOIN proveedor pr 
        ON p.proveedor = pr.codproveedor 
        WHERE p.codproducto = $id_producto";*/

        $sql = "SELECT * FROM municipio";   
        
        $request = $this->select_all($sql);
        return $request;
    }

    ### MODELO: MOSTRAR TODOS LOS MUNICIPIOS ###
    public function selectMunicipios()
    {
        #Sentencia
        /*$sql = "SELECT m.idMarca, t.descripcion, m.marca, m.estado
               FROM marca m
               INNER JOIN tipo_vehiculo t
               ON m.tipoId = t.id 
               WHERE m.estado != 0";*/

         /* $sql = "SELECT m.idMun, m.nombre, m.estado, d.nombre
          FROM municipio m
          INNER JOIN departamentos d
          ON m.depId = d.idDep
                 ";  */
          $sql = "SELECT m.idMun, d.descripcion, m.nombre, m.estado
          FROM municipio m
          INNER JOIN departamentos d
          ON m.depId = d.idDep";           

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
