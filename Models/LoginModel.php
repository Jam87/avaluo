<?php
### CLASE: LoginModel  ###
#Heredo Mysql(funciones y conexion)
class LoginModel extends Mysql
{

    private $intIdUsuario;
    private $email;
    private $password;
    //private $token;

    public function __construct()
    {
        parent::__construct();
    }

    ### MODELO: LOGIN ###
    public function loginUser(string $correo, string $password)
    {
        #Data
        $this->email     = $correo;
        $this->password  = $password;

        #Sentencia
        $sql = "SELECT idusuario , estado
                FROM usuario                
                WHERE email = '$this->email' AND password = '$this->password' and estado!= 0";

        #Mando a llamar a la funcion(select) 
        $request = $this->select($sql);
        return $request;
    }
}
