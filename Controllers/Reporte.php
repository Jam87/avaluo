<?php
require 'Libraries/html2pdf/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

class Reporte extends Controllers
{
	public function __construct()
	{
		session_start();
		parent::__construct();
	}

	public function generarReporte($idAvaluo)
	{
		#$idpersona: Es el ID de la persona que esta Logueada
		$idpersona = $_SESSION['userData']['idusuario'];
	
		if (is_numeric($idAvaluo)) {
			$idpersona = '';
			#Extraigo toda la información del avaluo, etc
			$data = $this->model->selectAvaluo($idAvaluo, $idpersona);
			
			ob_end_clean(); //Eliminar el buger de salida
			#$data: Es toda la informacion que me esta trayendo el modelo
			$html = getFile("Template/Modals/comprobantePDF", $data);
			$html2pdf = new Html2Pdf('p', 'A4', 'es', 'true', 'UTF-8');
			$html2pdf->writeHTML($html);
			$html2pdf->output();

		

			//dep($data);

		} else {
			//Muestro alguna vista
			echo "Dato no valido";
		}
	}
}
