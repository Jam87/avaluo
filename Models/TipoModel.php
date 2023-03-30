<?php
 ### CLASE: TipoModel ###
class TipoModel extends Mysql
{
    private $id;
    private $descripcion;
    private $fecha_ing;
    private $estado;


    public function __construct()
    {
        parent::__construct();
    }

    ### MODELO: MOSTRAR TODOS LOS TIPOS DE VEHICULO ###
    public function selectTipo()
    {
        #Sentencia
        $sql = "SELECT * FROM  tipo_vehiculo WHERE estado != 0";

        #Mando a llamar la función(select_all)
        $request = $this->select_all($sql);
        return $request;
    }

    ### MODELO: GUARDAR UNA NUEVO TIPO DE VEHICULO ###
    public function insertTipoVeh(string $descripcion, int $status)
    {
        $return = "";
        $this->descripcion   = $descripcion;
        /*$this->date_registro  = gmdate('Y-m-d H:i:s');*/
        $this->estado         = $status;

        #Sentencia
        $sql = "SELECT * FROM tipo_vehiculo WHERE descripcion = '{$this->descripcion}' ";
        
        #Mando a llamar la función(select_all)
        $request = $this->select_all($sql);        

        /*var_dump($request);
          exit();*/

        if (empty($request)) {

            $sql = "INSERT INTO tipo_vehiculo(descripcion, estado) VALUE (?,?)";

            #arrData: array de información
            $arrData = array($this->descripcion, $this->estado);

            #Envio a la funcion insert(sentencia y data)
            $requestInsert = $this->insert($sql, $arrData);

            return $requestInsert;
        } else {
            $return = "existe";
        }
        return $return;
    }


    ### MODELO: ELIMINAR TIPO DE VEHICULO ###
    public function deleteTipoVeh(int $intIdTipoVeh)
    {

        #id
        $this->id = $intIdTipoVeh;

        $sql = "UPDATE tipo_vehiculo SET estado = ? WHERE id = $this->id";
      
        $arrData = array(0);
        $request = $this->update($sql, $arrData);

        if ($request) {
            $request = 'ok';
        } else {
            $request = 'error';
        }
        return $request;
    }
 

    ### MODELO: EDITAR MONEDA ###
   /* public function editMoneda(int $idMoneda){
        
        //Buscar Moneda
        $this->cod_moneda = $idMoneda;
        $sql = "SELECT * FROM cat_moneda WHERE cod_moneda = {$this->cod_moneda}";
        $request = $this->select($sql);
        return $request;
    }*/

   
    ### MODELO: ACTUALIZAR MONEDA ###
    /*public function updateMoneda(int $intIdMoneda, string $nombre, $listLocal, int $status){

        #Recojo Data
        $this->cod_moneda    = $intIdMoneda;
        $this->nombre_moneda = $nombre;
        $this->es_local      = $listLocal;
        $this->date_registro = gmdate('Y-m-d H:i:s');
        $this->activo        = $status;


        $sql = "SELECT * FROM cat_moneda WHERE nombre_moneda = '$this->nombre_moneda' AND cod_moneda != $this->cod_moneda";
        $request = $this->select_all($sql);

        if(empty($request))
        {
            $sql = "UPDATE cat_moneda SET nombre_moneda = ?, es_local = ?, date_registro = ?, activo = ? WHERE cod_moneda = $this->cod_moneda";
            $arrData = array($this->nombre_moneda, $this->es_local, $this->date_registro, $this->activo);
            $request = $this->update($sql,$arrData);
        }else{
            $request = "exist";
        }
        return $request;			
    }*/
   
}
