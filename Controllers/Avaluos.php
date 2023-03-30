<?php

class Avaluos extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
	}

	public function Avaluos()
	{
		$data['page_id'] = 1;
		$data['page_tag'] = "Avaluos";
		$data['page_title'] = "Listado de avaluos";
		$data['page_name'] = "avaluo";
		$data['page_title_modal'] = "Ingreso de avaluo";
		$data['page_functions_js'] = "functions_avaluos.js";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit..";
		$data['data-sidebar-size'] = 'lg';
		$this->views->getView($this, "avaluos", $data);
	}

	#######################################
	# OBTENER INFORMACION COMBOX CLIENTE #
	#######################################
	function obtenerClientes()
	{

		$arrData = $this->model->comboxCliente();

		if (is_array($arrData) == true) {
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		exit;
	}

	###########################################
	# OBTENER INFORMACION COMBOX DEPARTAMENTO #
	###########################################
	function obtenerDepartamento()
	{

		$arrData = $this->model->comboxDepa();

		if (is_array($arrData) == true) {
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		exit;
	}

	###########################################
	# OBTENER INFORMACION COMBOX VEHICULO #
	###########################################
	function obtenerVehiculo()
	{

		$arrData = $this->model->comboxVeh();

		if (is_array($arrData) == true) {
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		exit;
	}

	###########################################
	# OBTENER INFORMACION COMBOX MUNICIPIO #
	###########################################
	function obtenerMunicipios()
	{

		if ($_POST) {
			$intIdDepartamento = intval($_POST['municipioId']);

			$arrData = $this->model->comboxMunicId($intIdDepartamento);

			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	###########################################
	#  MOSTRAR LISTA DE AVALUO   #
	###########################################	

	public function getAvaluos()
	{
		#Hago el llamado al metodo: - selectEmpleado() - Del Modelo de este CONTROLADOR
		$arrData = $this->model->selectAvaluos();

		//dep($arrData);


		#For:Recorro todas las variables
		for ($i = 0; $i < count($arrData); $i++) {


			$arrData[$i]['options'] = '<div class="text-center">
				<button type="button" class="btn btn-warning btn-sm btnEditBanco" onClick="fntEditMarca(' . $arrData[$i]['idAvaluo'] . ')" title="Editar"><i class="ri-edit-2-line"></i></button>
				<button type="button" class="btn btn-danger btn-sm btnDelBanco" onClick="fntDelMarca(' . $arrData[$i]['idAvaluo'] . ')" title="Eliminar"><i class="ri-delete-bin-5-line"></i></button>
                <a title="Generar PDF" href="' . base_url() . '/reporte/generarReporte/' . $arrData[$i]['idAvaluo'] . '" target="_blanck" class="btn btn-info btn-sm"> <i class="las la-file-pdf"></i> </a>
				</div>';
		}

		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		exit();
	}

	###########################################
	#   GUARDAR NUEVO AVALUO   #
	###########################################		
	public function setAvaluos()
	{

		if ($_POST) {

			#Recojo los datos
			$sectCliente                   =  isset($_POST['sectCliente']) ? $_POST['sectCliente'] : "";
			$selectDepart                  =  isset($_POST['selectDepart']) ? $_POST['selectDepart'] : "";
			$selectVeh                     =  isset($_POST['selectVeh']) ? $_POST['selectVeh'] : "";
			$selectMunic                   =  isset($_POST['selectMunic']) ? $_POST['selectMunic'] : "";
			$coraza                        =  isset($_POST['coraza']) ? $_POST['coraza'] : "";

			$bumperDel                     =  isset($_POST['bumperDel']) ? $_POST['bumperDel'] : "";
			$bumperTras                    =  isset($_POST['bumperTras']) ? $_POST['bumperTras'] : "";
			$guardafangoDel                =  isset($_POST['guardafangoDel']) ? $_POST['guardafangoDel'] : "";
			$guardafangoTras               =  isset($_POST['guardafangoTras']) ? $_POST['guardafangoTras'] : "";
			$puertaDel                     =  isset($_POST['puertaDel']) ? $_POST['puertaDel'] : "";

			$puertaTras                    =  isset($_POST['puertaTras']) ? $_POST['puertaTras'] : "";
			$balijero                      =  isset($_POST['balijero']) ? $_POST['balijero'] : "";
			$guantera                      =  isset($_POST['guantera']) ? $_POST['guantera'] : "";
			$canuela                       =  isset($_POST['canuela']) ? $_POST['canuela'] : "";
			$pintura                       =  isset($_POST['pintura']) ? $_POST['pintura'] : "";

			$sistEscape                    =  isset($_POST['sistEscape']) ? $_POST['sistEscape'] : "";
			$llantas                       =  isset($_POST['llantas']) ? $_POST['llantas'] : "";
			$llantaRepto                   =  isset($_POST['llantaRepto']) ? $_POST['llantaRepto'] : "";
			$radio                         =  isset($_POST['radio']) ? $_POST['radio'] : "";
			$usb                           =  isset($_POST['usb']) ? $_POST['usb'] : "";
			$parlantes                     =  isset($_POST['parlantes']) ? $_POST['parlantes'] : "";
			$encendedor                    =  isset($_POST['encendedor']) ? $_POST['encendedor'] : "";
			$espejo                        =  isset($_POST['espejo']) ? $_POST['espejo'] : "";
			$pito                          =  isset($_POST['pito']) ? $_POST['pito'] : "";
			$tricos                        =  isset($_POST['tricos']) ? $_POST['tricos'] : "";
			$motorAguaTrico                =  isset($_POST['motorAguaTrico']) ? $_POST['motorAguaTrico'] : "";
			$alarma                        =  isset($_POST['alarma']) ? $_POST['alarma'] : "";

			$antena                        =  isset($_POST['antena']) ? $_POST['antena'] : "";
			$ascensoresDel                 =  isset($_POST['ascensoresDel']) ? $_POST['ascensoresDel'] : "";
			$ascensoresTras                =  isset($_POST['ascensoresTras']) ? $_POST['ascensoresTras'] : "";
			$cinturonesDel                 =  isset($_POST['cinturonesDel']) ? $_POST['cinturonesDel'] : "";
			$cinturonesTrans               =  isset($_POST['cinturonesTrans']) ? $_POST['cinturonesTrans'] : "";
			$material                      =  isset($_POST['material']) ? $_POST['material'] : "";
			$asiento                       =  isset($_POST['asiento']) ? $_POST['asiento'] : "";

			$forroPuerta                   =  isset($_POST['forroPuerta']) ? $_POST['forroPuerta'] : "";
			$alfombra                      =  isset($_POST['alfombra']) ? $_POST['alfombra'] : "";
			$tapasol                       =  isset($_POST['tapasol']) ? $_POST['tapasol'] : "";
			$velocimetro                   =  isset($_POST['velocimetro']) ? $_POST['velocimetro'] : "";
			$tacometro                     =  isset($_POST['tacometro']) ? $_POST['tacometro'] : "";
			$aceite                        =  isset($_POST['aceite']) ? $_POST['aceite'] : "";
			$combustible                   =  isset($_POST['combustible']) ? $_POST['combustible'] : "";
			$cargaBateria                  =  isset($_POST['cargaBateria']) ? $_POST['cargaBateria'] : "";
			$vidrioDelantero               =  isset($_POST['vidrioDelantero']) ? $_POST['vidrioDelantero'] : "";
			$vidrioTrasero                 =  isset($_POST['vidrioTrasero']) ? $_POST['vidrioTrasero'] : "";
			$ventanilla                    =  isset($_POST['ventanilla']) ? $_POST['ventanilla'] : "";

			$evaporador                    =  isset($_POST['evaporador']) ? $_POST['evaporador'] : "";
			$abanico                       =  isset($_POST['abanico']) ? $_POST['abanico'] : "";
			$pescantes                     =  isset($_POST['pescantes']) ? $_POST['pescantes'] : "";
			$mataBurro                     =  isset($_POST['mataBurro']) ? $_POST['mataBurro'] : "";
			$halogeno                      =  isset($_POST['halogeno']) ? $_POST['halogeno'] : "";
			$rinesSencillos                =  isset($_POST['rinesSencillos']) ? $_POST['rinesSencillos'] : "";
			$rinesLujo                     =  isset($_POST['rinesLujo']) ? $_POST['rinesLujo'] : "";
			$luzPanel                      =  isset($_POST['luzPanel']) ? $_POST['luzPanel'] : "";
			$faros                         =  isset($_POST['faros']) ? $_POST['faros'] : "";
			$luzStop                       =  isset($_POST['luzStop']) ? $_POST['luzStop'] : "";
			$luzRetro                      =  isset($_POST['luzRetro']) ? $_POST['luzRetro'] : "";
			$lateralesTras                 =  isset($_POST['lateralesTras']) ? $_POST['lateralesTras'] : "";
			$pideviaTras                   =  isset($_POST['pideviaTras']) ? $_POST['pideviaTras'] : "";
			$estadoFisStop                 =  isset($_POST['estadoFisStop']) ? $_POST['estadoFisStop'] : "";
			$estadoFisPVia                 =  isset($_POST['estadoFisPVia']) ? $_POST['estadoFisPVia'] : "";

			$luzPlaca                      =  isset($_POST['luzPlaca']) ? $_POST['luzPlaca'] : "";
			$luzParqueo                    =  isset($_POST['luzParqueo']) ? $_POST['luzParqueo'] : "";
			$vaRemplazo                    =  isset($_POST['vaRemplazo']) ? $_POST['vaRemplazo'] : "";
			$anoFabricacion                =  isset($_POST['anoFabricacion']) ? $_POST['anoFabricacion'] : "";
			$anoActual                     =  isset($_POST['anoActual']) ? $_POST['anoActual'] : "";
			$antigAjustada                 =  isset($_POST['antigAjustada']) ? $_POST['antigAjustada'] : "";
			$vidaUtil                      =  isset($_POST['vidaUtil']) ? $_POST['vidaUtil'] : "";

			$estado                        =  isset($_POST['estado']) ? $_POST['estado'] : "";
			$coeficienteMotor              =  isset($_POST['coeficienteMotor']) ? $_POST['coeficienteMotor'] : "";
			$coeficienteCarroceriaInterior =  isset($_POST['coeficienteCarroceriaInterior']) ? $_POST['coeficienteCarroceriaInterior'] : "";
			$coeficenteCarroceriaExterior  =  isset($_POST['coeficenteCarroceriaExterior']) ? $_POST['coeficenteCarroceriaExterior'] : "";
			$sistemaElectrico              =  isset($_POST['sistemaElectrico']) ? $_POST['sistemaElectrico'] : "";
			$estadoFisVehiculo             =  isset($_POST['estadoFisVehiculo']) ? $_POST['estadoFisVehiculo'] : "";

			$equipCoefTecnolo              =  isset($_POST['equipCoefTecnolo']) ? $_POST['equipCoefTecnolo'] : "";
			$equipCoefSalvamento           =  isset($_POST['equipCoefSalvamento']) ? $_POST['equipCoefSalvamento'] : "";
			$marcaCoefTecnolo              =  isset($_POST['marcaCoefTecnolo']) ? $_POST['marcaCoefTecnolo'] : "";
			//$marcaCoefSalvamento         =  isset($_POST['marcaCoefSalvamento']) ? $_POST['marcaCoefSalvamento'] : "";
			$modeloCoefTecnolo             =  isset($_POST['modeloCoefTecnolo']) ? $_POST['modeloCoefTecnolo'] : "";
			$modeloCoefSalvamento          =  isset($_POST['modeloCoefSalvamento']) ? $_POST['modeloCoefSalvamento'] : "";
			$anoCoefTecnolo                =  isset($_POST['anoCoefTecnolo']) ? $_POST['anoCoefTecnolo'] : "";

			$anoCoefSalvamento             =  isset($_POST['anoCoefSalvamento']) ? $_POST['anoCoefSalvamento'] : "";
			$tipoCoefTecnolo               =  isset($_POST['tipoCoefTecnolo']) ? $_POST['tipoCoefTecnolo'] : "";
			$coefResultSalvamento          =  isset($_POST['coefResultSalvamento']) ? $_POST['coefResultSalvamento'] : "";

			$estadoCoefTecnolo             =  isset($_POST['estadoCoefTecnolo']) ? $_POST['estadoCoefTecnolo'] : "";
			$estadoCoefSalvamento          =  isset($_POST['estadoCoefSalvamento']) ? $_POST['estadoCoefSalvamento'] : "";
			$rodamientoCoefTecnolo         =  isset($_POST['rodamientoCoefTecnolo']) ? $_POST['rodamientoCoefTecnolo'] : "";
			$rodamientoCoefSalvamento      =  isset($_POST['rodamientoCoefSalvamento']) ? $_POST['rodamientoCoefSalvamento'] : "";


			#Envio los datos al modelo
			$request_Avaluo = $this->model->insertAvaluo(
				$sectCliente,
				$selectDepart,
				$selectVeh,
				$selectMunic,
				$coraza,

				$bumperDel,
				$bumperTras,
				$guardafangoDel,
				$guardafangoTras,
				$puertaDel,

				$puertaTras,
				$balijero,
				$guantera,
				$canuela,
				$pintura,

				$sistEscape,
				$llantas,
				$llantaRepto,
				$radio,
				$usb,
				$parlantes,
				$encendedor,
				$espejo,
				$pito,
				$tricos,
				$motorAguaTrico,
				$alarma,

				$antena,
				$ascensoresDel,
				$ascensoresTras,
				$cinturonesDel,
				$cinturonesTrans,
				$material,
				$asiento,

				$forroPuerta,
				$alfombra,
				$tapasol,
				$velocimetro,
				$tacometro,
				$aceite,
				$combustible,
				$cargaBateria,
				$vidrioDelantero,
				$vidrioTrasero,
				$ventanilla,

				$evaporador,
				$abanico,
				$pescantes,
				$mataBurro,
				$halogeno,
				$rinesSencillos,
				$rinesLujo,
				$luzPanel,
				$faros,
				$luzStop,
				$luzRetro,
				$lateralesTras,
				$pideviaTras,
				$estadoFisStop,
				$estadoFisPVia,

				$luzPlaca,
				$luzParqueo,
				$vaRemplazo,
				$anoFabricacion,
				$anoActual,
				$antigAjustada,
				$vidaUtil,

				$estado,
				$coeficienteMotor,
				$coeficienteCarroceriaInterior,
				$coeficenteCarroceriaExterior,
				$sistemaElectrico,
				$estadoFisVehiculo,

				$equipCoefTecnolo,
				$equipCoefSalvamento,
				$marcaCoefTecnolo,
				//$marcaCoefSalvamento 
				$modeloCoefTecnolo,
				$modeloCoefSalvamento,
				$anoCoefTecnolo,
				$anoCoefSalvamento,
				$tipoCoefTecnolo,

				$coefResultSalvamento,
				$estadoCoefTecnolo,
				$estadoCoefSalvamento,
				$rodamientoCoefTecnolo,
				$rodamientoCoefSalvamento



			);

			#Verifico
			if ($request_Avaluo > 0) {
				$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}
