<?php
### CLASE MODELOS  ###
class Vehiculos extends Controllers{
    public function __construct()
    {
        parent::__construct();
        session_start();
        /*if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'/login');
        }*/
    }

    ### CONTROLADOR ###
    public function Vehiculos()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Vehiculos";
			$data['page_title'] = "Listado de vehiculo";
			$data['page_name'] = "vehiculo";
			$data['page_title_modal'] = "Ingreso de modelo";
			$data['page_functions_js'] = "functions_vehiculos.js";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
            $data['data-sidebar-size'] = 'sm';
			$this->views->getView($this,"vehiculos",$data);

            #Data modal
            $data['descrption_modal1'] = "Nueva moneda";
            $data['page_title_bold'] = "Estimado usuario";
            $data['descrption_modal1'] = "Los campos remarcados con";
            $data['descrption_modal2'] = "son necesarios.";
		}


    ### OBTENER INFORMACION COMBOX TIPO VEHICULO ###
		function obtenerTipoVehiculo(){
   
			$arrData = $this->model->comboxTipo();			

			if(is_array($arrData) == true ){				
				
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			exit();
		  }

     ### OBTENER DATA MARCA ###
     function obtenerMarcaV()
     {
 
         if ($_POST) {
             $intIdTipoVehiculo = intval($_POST['marcaId']);
 
             $arrData = $this->model->comboxMarcaVehId($intIdTipoVehiculo);
 
             echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
         }
         die();
     }      


    ### CONTROLADOR: MOSTRAR TODOS LOS MODELOS ###
    public function getVehiculo()
    {
        #Cargo el modelo(selectBancos) 
        $arrData = $this->model->selectVehiculos();

        for ($i = 0; $i < count($arrData); $i++) {
         
            #Estado
            if ($arrData[$i]['estado'] == 1) {
                $arrData[$i]['estado'] = '<span class="badge rounded-pill bg-success">Activo</span>';
            } else {
                $arrData[$i]['estado'] = '<span class="badge rounded-pill bg-danger">Inactivo</span>';
            }

            #Botones de accion
            $arrData[$i]['options'] = '<div class="text-center">
				<button type="button" class="btn btn-warning btn-sm" onClick="fntEditVeh(' . $arrData[$i]['idVehiculo'] . ')" title="Editar"><i class="ri-edit-2-line"></i></button>
				<button type="button" class="btn btn-danger btn-sm" onClick="fntDelVeh(' . $arrData[$i]['idVehiculo'] . ')" title="Eliminar"><i class="ri-delete-bin-5-line"></i></button>
				</div>';
            
        }


        #JSON
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        exit();
    }

    ### CONTROLADOR: GUARDAR NUEVO MODELO ###
    public function setModelo(){

        if($_POST){

            #Capturo los datos dle modal
            
            $intIdModelo    = intval($_POST['idModelo']);  

            $selectVehiculo = intval($_POST['tveh']);
            $selectMarca    = intval($_POST['marca']);
            $modelo         = strClean($_POST['modelo']);          
            $intEstado      = intval($_POST['lStatus']);

            if ($intIdModelo == 0) {
                
                #Crear
                $request_Modelo = $this->model->insertModelo($selectVehiculo, $selectMarca, $modelo, $intEstado);
               
               /* dep($request_Tipo);
                  exit();*/

                $option = 1;
            } else {
                #Actualizar
                $request_Modelo = $this->model->updateMarca($intIdMarca, $nomMarca, $tipoVehiculo, $intEstado);

                $option = 2;
            }

            #Verificar
            if ($request_Modelo > 0) {
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                } else {
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
            } else if ($request_Modelo === 'existe') {
                $arrResponse = array('status' => false, 'msg' => '¡Atención! El tipo de usuario ya existe.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'No es posible almacenar los datos');
            }

            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    ### CONTROLADOR: ELIMINAR MODELOS ###
    public function delModelos()
    {

        if ($_POST) {

            $intIdModelo = intval($_POST['idModelo']);

            $requestDelete = $this->model->deleteModelo($intIdModelo);

            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el modelo');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el modelo.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            die();
        }
    }

    ### CONTROLADOR: EDITAR MODELO ###    
    public function EditModelo(int $idModelo)
    {
        #id
        $intIdModelo = intval($idModelo);

        if ($intIdModelo > 0) {
            $arrData = $this->model->editModelo($intIdModelo);

            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
