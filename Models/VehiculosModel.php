<?php

class VehiculosModel extends Mysql
	{
        private $idVehiculo;
        private $trasmision;
        private $tipo;
        private $noPlaca;
        private $rodamiento;
        private $ano;
        private $fecha;
        private $tipoId;
        private $marcaId;
        private $modeloId;
        private $descripcion;
        private $estado;
        private $valorMarca;


		public function __construct()
		{
			parent::__construct();
		}



 /***** COMBOX:TIPO DE VEHICULO *****/

public function comboxTipo(){

    $sql = "SELECT *
            FROM tipo_vehiculo"; 
            //INNER JOIN tipo_vehiculo t";
           

     /*INNER JOIN proveedor pr 
     ON p.proveedor = pr.codproveedor 
     WHERE p.codproducto = $id_producto";*/

    //$sql = "SELECT * FROM tipo_vehiculo";   
    
    $request = $this->select_all($sql);
    return $request;
}

 /***** COMBOX:MARCA DE VEHICULO *****/

 public function comboxMarcaVehId(int $intIdTipoVehiculo){

    $this->marcaId = $intIdTipoVehiculo;
   
    $sql = "SELECT idMarca, marca
            FROM marca 
            WHERE tipoId = $this->marcaId";

     /*INNER JOIN proveedor pr 
     ON p.proveedor = pr.codproveedor 
     WHERE p.codproducto = $id_producto";*/

    //$sql = "SELECT * FROM tipo_vehiculo";   
    
    $request = $this->select_all($sql);
    return $request;
}

 /***** COMBOX:MODELO DE VEHICULO *****/
 public function comboxModeloVehId(int $intIdMarca){

    $this->modeloId = $intIdMarca;
   

    $sql = "SELECT idmodelo, nombre
            FROM modelos 
            WHERE marcaId = $this->modeloId";
    
    $request = $this->select_all($sql);
    return $request;
}



/**
 ***** MOSTRAR TODOS LOS VEHICULOS *****
 */
    public function selectVehiculos(){
        
        /*$sql = "SELECT v.idVehiculo, v.tipoId, v.marcaId, v.modeloId, v.trasmision, 
                       v.tipo, v.no_placa, v.rodamiento, v.año, v.estado */ 

        $sql = "SELECT v.idVehiculo, m.marca, md.nombre, v.trasmision, 
                       v.tipo, v.noPlaca, v.rodamiento, v.ano, v.estado 
                FROM vehiculos v
                INNER JOIN marca m
                ON v.marcaId = m.idMarca 
                INNER JOIN modelos md
                ON v.modeloId = md.idmodelo
                ";


       /*$sql = "SELECT m.idmodelo, t.descripcion, ma.marca, m.nombre, m.estado 
       FROM modelos m
       INNER JOIN tipo_vehiculo t
       ON m.tipoId = t.id
       INNER JOIN marca ma
       ON m.marcaId = ma.idMarca";  */

       //$sql = "SELECT * FROM marca WHERE estado != 0";
        //$sql = "SELECT m.idmarca, t.descripcion, m.marca, m.estado
        //        FROM marca m
        //        INNER JOIN tipo_vehiculo t ON m.tipoId = t.id";

		$request = $this->select_all($sql);
		return $request;

    }

    

/**
 ***** SELECCIONAR 1 MARCA *****
 */
public function selectMarcaId(int $idmarca){

    $this->idmarca = $idmarca;

    #Me va mostrar todos los que este activos   
    $sql = "SELECT m.idMarca, m.marca, t.descripcion, m.tipoId
            FROM marca m, tipo_vehiculo t
            WHERE idMarca = $this->idmarca";

    $request = $this->select($sql);
    return $request;;

}   
    

 /**
 ***** INSERTA UN NUEVO VEHICULO *****
 */

 public function insertVehiculo(int $selectVehiculo, int $selectMarca, int $modelo, string $trasmicion, string $tipo, string $placa, string $rodamiento, int $ano, int $estado){
              
    //Captura datos                           
    $this->tipoId      = $selectVehiculo;
    $this->marcaId     = $selectMarca;
    $this->modeloId    = $modelo;
    $this->trasmision  = $trasmicion;
    $this->tipo        = $tipo;
    $this->noPlaca     = $placa;
    $this->rodamiento  = $rodamiento;
    $this->ano         = $ano;
    //$this->fecha       = DATE("Y-m-d H:i:s");
    //$this->descripcion = $descripcion;
    $this->estado      = $estado; 


     #Consulta
     $sql ="INSERT INTO vehiculos(tipoId, marcaId, modeloId, trasmision, tipo, noPlaca, rodamiento, ano, estado) VALUES(?,?,?,?,?,?,?,?,?)";
         
     $arrData = array($this->tipoId, $this->marcaId, $this->modeloId, $this->trasmision, $this->tipo, $this->noPlaca, $this->rodamiento, $this->ano, $this->estado); 
      /*echo "<pre>";                
      print_r($arrData);
      echo "</pre>"; 
      exit(); */              
             
     $requestInsert = $this->insert($sql,$arrData);
     return $requestInsert;                 

 }


 /**
 ***** ACTUALIZAR UN EMPLEADO *****
 */          
public function updateEmpleado(int $idempleado, string $strNombre, string $strApellido, string $strTel, string $strEmail, int $intEstado){

    $this->idempleado = $idempleado;
	$this->nombre_empleado = $strNombre;
    $this->apellido_empleado = $strApellido;
    $this->telefono_empleado = $strTel;
    $this->email_empleado = $strEmail;
    $this->estado = $intEstado;

     #Verifico si Identificacion o Email ya existe
    $sql = "SELECT * FROM empleado WHERE (email_empleado = '{$this->email_empleado}' AND idempleado != $this->idempleado)";
	$request = $this->select_all($sql);		
    //var_dump($request);
    //exit();

    #Verifica si no existe(si no esta obteniendo datos): No existe el registro
    #Si no esta vacio: Quiere decir que si existe
    if(empty($request)){
        $sql = "UPDATE empleado SET nombre_empleado = ?, apellido_empleado= ?, telefono_empleado = ?, email_empleado = ?,
                                    estado = ?
                WHERE idempleado = $this->idempleado";

		$arrData = array($this->nombre_empleado, $this->apellido_empleado, $this->telefono_empleado, $this->email_empleado, $this->estado);
		$request = $this->update($sql,$arrData);
        
    }else{
        $request = "exist";
    }
    return $request;
}

 /**
 ***** ELIMINAR 1 MARCA *****
 */

    public function deleteMarca(int $intIdMarca)
    {
        $this->idmarca = $intIdMarca;

        $sql = "UPDATE marca SET estado = ? WHERE idMarca = $this->idmarca";

        $arrData = array(0);
        $request = $this->update($sql,$arrData);
        
        if($request){
            $request = 'ok';

        }else{
            $request = 'error';
        }
        return $request;
    }

 
}
