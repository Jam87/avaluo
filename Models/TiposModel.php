<?php
 ### CLASE: TiposModel ###
class TiposModel extends Mysql
{
    private $idrol;
    private $nombrerol;
    private $descripcion;
    private $status;

    public function __construct()
    {
        parent::__construct();
    }

    ### MODELO: MOSTRAR TODOS LOS TIPOS DE USUARIOS ###
    public function selectTipo()
    {
        #Sentencia
        $sql = "SELECT * FROM rol WHERE status != 0";

        #Mando a llamar la función(select_all)
        $request = $this->select_all($sql);
        return $request;
    }

    ### MODELO: GUARDAR UN NUEVO TIPO DE USUARIO ###
    public function insertTipo(string $name, string $description, int $status)
    {
        $return = "";
        $this->nombrerol = $name;
        $this->descripcion = $description;
        $this->status = $status;

        #Sentencia
        $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->nombrerol}' ";

        #Mando a llamar la función(select_all)
        $request = $this->select_all($sql);

        /*var_dump($request);
          exit();*/

        if (empty($request)) {

            $sql = "INSERT INTO rol(nombrerol, descripcion, status) VALUE (?,?,?)";

            #arrData: array de información
            $arrData = array($this->nombrerol, $this->descripcion, $this->status);

            #Envio a la funcion insert(sentencia y data)
            $requestInsert = $this->insert($sql, $arrData);

            return $requestInsert;
        } else {
            $return = "existe";
        }
        return $return;
    }

    ### MODELO: ELIMINAR TIPO DE USUARIO ###
    public function deleteTipo(int $intIdTipo)
    {

        #id
        $this->cod_tipo_usuario = $intIdTipo;

        $sql = "UPDATE rol SET status = ? WHERE idrol =  {$this->cod_tipo_usuario}";

        $arrData = array(0);
        $request = $this->update($sql, $arrData);

        if ($request) {
            $request = 'ok';
        } else {
            $request = 'error';
        }
        return $request;
    }

    ### MODELO: EDITAR TIPO DE USUARIO ###
    public function editTipo(int $idUsuario){
        
        //Buscar Tipo de Usuario
        $this->idrol  = $idUsuario;
        $sql = "SELECT * FROM rol WHERE idrol  = '{$this->idrol}'";
        $request = $this->select($sql);
        return $request;
    }

    
    ### MODELO: ACTUALIZAR TIPO DE ROL ###
    public function updateTipo(int $intIdTipo, string $name, string $description, int $status){

        $this->idrol       = $intIdTipo;
        $this->nombrerol   = $name;
        $this->descripcion = $description;
        $this->status      = $status;


        $sql = "SELECT * FROM rol WHERE nombrerol = '$this->nombrerol' AND idrol != $this->idrol";
        $request = $this->select_all($sql);

        if(empty($request))
        {
            $sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->idrol ";
            $arrData = array($this->nombrerol, $this->descripcion, $this->status);
            $request = $this->update($sql,$arrData);
        }else{
            $request = "exist";
        }
        return $request;			
    }

}
