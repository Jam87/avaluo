<?php
### CLASE: UsuariosModel ###
class UsuariosModel extends Mysql
{
    private $idusuario;
    private $nombre;
    private $apellido;
    private $username;
    private $telefono;
    private $email;
    private $descripcion;
    private $password;
    private $fecha;
    private $rolid ;
    private $estado;


    public function __construct()
    {
        parent::__construct();
    }

    /***** COMBOX:TIPO DE USUARIO *****/
    #Mostrar info en el Combox
    public function comboxTipoUsuario()
    {
        $sql = "SELECT * FROM rol";

        $request = $this->select_all($sql);
        return $request;
    }

    ### MODELO: MOSTRAR TODOS LOS TIPOS DE USUARIOS ###
    public function selectUsuario()
    {
       $sql = "SELECT 
                  u.idusuario,
                  CONCAT(u.nombre, ' ', u.apellido) nombre,
                  u.email,
                  r.nombrerol,
                  u.estado
                
                 FROM usuario u 
                 INNER JOIN rol r
                 ON u.rolid = r.idrol
                 WHERE u.estado != 0";
        $request = $this->select_all($sql);
        return $request;
    }


    ### MODELO: GUARDAR UN NUEVO TIPO DE USUARIO ###
    public function insertUsuario(
        $nombre,
        $apellido,
        $correo,
        $username,
        $telefono,
        $txtDescription,
        $strPassword,
        $lStatus,
        $Tusuario
    ) {
        
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $correo;
        $this->username = $username;
        $this->telefono = $telefono;
        $this->descripcion = $txtDescription;
        $this->password = $strPassword;
       /* $this->date_registro = date('Y-m-d');*/
        $this->rolid = $Tusuario;
        $this->estado = $lStatus;

        $sql = "INSERT INTO usuario(nombre, apellido, email, username, telefono, descripcion, password, 
                                    rolid, estado)

                VALUE (?,?,?,?,?,?,?,?,?)";

        $arrData = array(
            $this->nombre, $this->apellido, $this->email, $this->username, $this->telefono, $this->descripcion, 
            $this->password, $this->rolid, $this->estado
        );

        $requestInsert = $this->insert($sql, $arrData);

        if (empty($requestInsert)) {
            $requestInsert = 'ok';
        }

        return $requestInsert;
    }

    ### MODELO: ELIMINAR EL USUARIO ###
    public function delUsuario(int $intIdUsuario)
    {
        $this->idusuario = $intIdUsuario;

        $sql = "UPDATE usuario SET estado = ? WHERE idusuario =  {$this->idusuario}";

        $arrData = array(0);
        $request = $this->update($sql, $arrData);

        if ($request) {
            $request = 'ok';
        } else {
            $request = 'error';
        }
        return $request;
    }

    ### MODELO: EDITAR USUARIO ###
    public function editUsuario(int $idUsuario)
    {
        //Buscar Usuario
        $this->cod_usuario = $idUsuario;
        $sql = "SELECT * FROM usuario WHERE idusuario = {$this->cod_usuario}";
        $request = $this->select($sql);
        return $request;
    }

    ### MODELO: ACTUALIZAR TIPO DE USUARIO ###
    public function updateUsuario(
        $intIdUsuario,
        $nombre,
        $apellido,
        $correo,
        $username,
        $telefono,
        $txtDescription,
        $strPassword,
        $lStatus,
        $Tusuario
    ) {

        $this->idusuario   = $intIdUsuario;
        $this->nombre      = $nombre;
        $this->apellido    = $apellido;
        $this->email       = $correo;
        $this->username    = $username;
        $this->telefono    = $telefono;
        $this->descripcion = $txtDescription;
        $this->password    = $strPassword;
        $this->estado      = $lStatus;
        $this->rolid       = $Tusuario;

        /*$this->date_registro = date('Y-m-d');*/

        $sql = "UPDATE usuario 
        SET idusuario = ?, nombre = ?, apellido = ?, email= ?, username = ?, telefono = ?, descripcion = ?,
            password = ?, estado = ?, rolid = ?

        WHERE idusuario = $this->idusuario";

        $arrData = array(
            $this->idusuario, $this->nombre, $this->apellido, $this->email, $this->username, $this->telefono,
            $this->descripcion, $this->password, $this->estado, $this->rolid  
        );

        $request = $this->update($sql, $arrData);

        return $request;
    }
}
