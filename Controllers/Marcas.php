<?php
### CLASE MARCA  ###
class Marcas extends Controllers
{

    public function __construct()
    {
        session_start(); #Inicio sesion
        /* if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }*/
        parent::__construct();
    }

    ### CONTROLADOR ###
    public function Marcas()
    {
        $data['page_title'] = "Jipsafety | Bancos";
        $data['page_name'] = "Marcas";
        $data['description'] = "";
        $data['breadcrumb-item'] = "Usuarios";
        $data['breadcrumb-activo'] = "Usuario";
        $data['page_functions_js'] = "functions_marcas.js";
        $data['data-sidebar-size'] = 'sm';

        #Data modal
        $data['page_title_modal'] = "Nueva marca";
        $data['page_title_bold'] = "Estimado usuario";
        $data['descrption_modal1'] = "Los campos remarcados con";
        $data['descrption_modal2'] = "son necesarios.";

        #Cargo la vista(tipos). La vista esta en View - Tipos
        $this->views->getView($this, "marcas", $data);
    }


    ### OBTENER INFORMACION COMBOX TIPO VEHICULO ###
    function obtenerTipoVehiculo()
    {

        $arrData = $this->model->comboxTipo();

        if (is_array($arrData) == true) {
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        exit();
    }


    ### CONTROLADOR: MOSTRAR TODAS LAS MARCAS ###
    public function getMarcas()
    {
        #Cargo el modelo(selectBancos) 
        $arrData = $this->model->selectMarcas();

        for ($i = 0; $i < count($arrData); $i++) {

            #Estado
            if ($arrData[$i]['estado'] == 1) {
                $arrData[$i]['estado'] = '<span class="badge rounded-pill bg-success">Activo</span>';
            } else {
                $arrData[$i]['estado'] = '<span class="badge rounded-pill bg-danger">Inactivo</span>';
            }

            #Botones de accion
            $arrData[$i]['options'] = '<div class="text-center">
				<button type="button" class="btn btn-warning btn-sm btnEditBanco" onClick="fntEditMarca(' . $arrData[$i]['idMarca'] . ')" title="Editar"><i class="ri-edit-2-line"></i></button>
				<button type="button" class="btn btn-danger btn-sm btnDelBanco" onClick="fntDelMarca(' . $arrData[$i]['idMarca'] . ')" title="Eliminar"><i class="ri-delete-bin-5-line"></i></button>
				</div>';
        }


        #JSON
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        exit();
    }

    ### CONTROLADOR: GUARDAR NUEVA MARCA ###
    public function setMarca()
    {

        if ($_POST) {

            #Capturo los datos dle modal

            $intIdMarca      = intval($_POST['idMarca']);

            $nomMarca     = ucwords(strClean($_POST['txtName']));
            $tipoVehiculo = intval($_POST['tipo']);
            $intEstado    = intval($_POST['listStatus']);

            if ($intIdMarca == 0) {

                #Crear
                $request_Marca = $this->model->insertMarca($nomMarca, $intEstado, $tipoVehiculo);

                /* dep($request_Tipo);
                  exit();*/

                $option = 1;
            } else {
                #Actualizar
                $request_Marca = $this->model->updateMarca($intIdMarca, $nomMarca, $tipoVehiculo, $intEstado);

                $option = 2;
            }

            #Verificar
            if ($request_Marca > 0) {
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                } else {
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
            } else if ($request_Marca === 'existe') {
                $arrResponse = array('status' => false, 'msg' => '¡Atención! El tipo de usuario ya existe.');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'No es posible almacenar los datos');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    ### CONTROLADOR: ELIMINAR MARCA ###
    public function delMarca()
    {

        if ($_POST) {

            $intIdMarca = intval($_POST['idMarca']);

            $requestDelete = $this->model->deleteMarca($intIdMarca);

            if ($requestDelete) {
                $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la marca');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar la marca.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

            die();
        }
    }

    ### CONTROLADOR: EDITAR MARCA ###    
    public function EditMarca(int $idMarca)
    {
        #id
        $intIdMarca = intval($idMarca);

        if ($intIdMarca  > 0) {
            $arrData = $this->model->editMarca($intIdMarca);

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
