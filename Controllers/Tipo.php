<?php
### CLASE TIPO VEHICULO  ###
class Tipo extends Controllers
{

    public function __construct()
    {
        session_start(); #Inicio sesion
        /*if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }*/
        parent::__construct();
    }

    ### CONTROLADOR ###
    public function Tipo()
    {
        $data['page_title'] = "Jipsafety | Moneda";
        $data['page_name'] = "Tipo de vehiculo";
        $data['description'] = "";
        $data['breadcrumb-item'] = "Usuarios";
        $data['breadcrumb-activo'] = "Usuario";
        $data['page_functions_js'] = "functions_tipo.js";
        $data['data-sidebar-size'] = 'sm';

        #Data modal
        $data['page_title_modal'] = "Nueva moneda";
        $data['page_title_bold'] = "Estimado usuario";
        $data['descrption_modal1'] = "Los campos remarcados con";
        $data['descrption_modal2'] = "son necesarios.";

        #Cargo la vista(tipos). La vista esta en View - Tipos
        $this->views->getView($this, "tipo", $data);
    }

    ### CONTROLADOR: MOSTRAR TODAS LOS TIPOS DE VEHICULO ###
    public function getTipo()
    {
        #Cargo el modelo(selectBancos) 
        $arrData = $this->model->selectTipo();

        for ($i = 0; $i < count($arrData); $i++) {

            #Estado
            if ($arrData[$i]['estado'] == 1) {
                $arrData[$i]['estado'] = '<span class="badge rounded-pill bg-success">Activo</span>';
            } else {
                $arrData[$i]['estado'] = '<span class="badge rounded-pill bg-danger">Inactivo</span>';
            }

            #Botones de accion
            $arrData[$i]['options'] = '<div class="text-center">
				<button type="button" class="btn btn-warning btn-sm btnEditBanco" onClick="fntEditTipo('. $arrData[$i]['id'] . ')" title="Editar"><i class="ri-edit-2-line"></i></button>
				<button type="button" class="btn btn-danger btn-sm btnDelBanco" onClick="fntDelTipo('. $arrData[$i]['id'] . ')" title="Eliminar"><i class="ri-delete-bin-5-line"></i></button>
				</div>';
        }


        #JSON
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        exit();
    }

    ### CONTROLADOR: GUARDAR NUEVO TIPO DE USUARIO ###
    public function setTipo()
    {

        if ($_POST) {

            /*dep($_POST);
            exit();*/

            #Capturo los datos
            $intIdTipoVeh = intval($_POST['idTipoVeh']);
            $descripcion  = strClean($_POST['txtName']);
            $status       = intval($_POST['listStatus']);

            
            #Si no viene ningun ID - Estoy creando 1 nuevo
            if ($intIdTipoVeh == 0) {
                
                #Crear
                $request_Tipo = $this->model->insertTipoVeh($descripcion, $status);
               
               /* dep($request_Tipo);
                  exit();*/

                $option = 1;
            } else {
                #Actualizar
                $request_Tipo = $this->model->updateMoneda($intIdMoneda, $nombre, $listLocal, $status);
                $option = 2;
            }

            #Verificar
            if ($request_Tipo > 0) {
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                } else {
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
            } else if ($request_Tipo === 'existe') {
                $arrResponse = array('status' => false, 'msg' => '¡Atención! El tipo de usuario ya existe.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'No es posible almacenar los datos');
            }

            #Convierto .json
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    ### CONTROLADOR: ELIMINAR TIPO DE VEHICULO ###
    public function delTipo()
    {
        if ($_POST) {

            $intIdTipo = intval($_POST['cod_tipo_vehiculo']);
         
            $requestDelete = $this->model->deleteTipoVeh($intIdTipo);

            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el tipo de vehiculo');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar tipo de vehiculo.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            die();
        }
    }

    ### CONTROLADOR: EDITAR MONEDA ###    
    public function EditMoneda(int $idMoneda)
    {
        #id
        $intIdMoneda = intval($idMoneda);

        if ($intIdMoneda > 0) {
            $arrData = $this->model->editMoneda($intIdMoneda);

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
