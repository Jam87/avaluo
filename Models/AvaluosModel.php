<?php

class AvaluosModel extends Mysql
{

    #BD
    private $clienteId;
    private $departamentoId;
    private $vehiculoId;
    private $municipioId;
    private $coraza;

    private $bumperDel;
    private $bumperTras;
    private $guardafangoDel;
    private $guardafangoTras;
    private $puertaDel;

    private $puertaTras;
    private $balijero;
    private $guantera;
    private $canuela;
    private $pintura;

    private $sistEscape;
    private $llantas;
    private $llantaRepto;
    private $radio;
    private $usb;
    private $parlantes;
    private $encendedor;
    private $espejo;
    private $pito;
    private $tricos;
    private $motorAguaTrico;
    private $alarma;

    private $antena;
    private $ascensoresDel;
    private $ascensoresTras;
    private $cinturonesDel;
    private $cinturonesTrans;
    private $material;
    private $asiento;

    private $forroPuerta;
    private $alfombra;
    private $tapasol;
    private $velocimetro;
    private $tacometro;
    private $aceite;
    private $combustible;
    private $cargaBateria;
    private $vidrioDelantero;
    private $vidrioTrasero;
    private $ventanilla;

    private $evaporador;
    private $abanico;
    private $pescantes;
    private $mataBurro;
    private $halogeno;
    private $rinesSencillos;
    private $rinesLujo;
    private $luzPanel;
    private $faros;
    private $luzStop;
    private $luzRetro;
    private $lateralesTras;
    private $pideviaTras;
    private $estadoFisStop;
    private $estadoFisPVia;

    private $luzPlaca;
    private $luzParqueo;
    private $vaRemplazo;
    private $anoFabricacion;
    private $anoActual;
    private $antigAjustada;
    private $vidaUtil;

    private $estado;
    private $coeficienteMotor;
    private $coeficienteCarroceriaInterior;
    private $coeficenteCarroceriaExterior;
    private $sistemaElectrico;
    private $estadoFisVehiculo;

    private $equipCoefTecnolo;
    private $equipCoefSalvamento;
    private $marcaCoefTecnolo;
    //private $marcaCoefSalvamento;  
    private $modeloCoefTecnolo;
    private $modeloCoefSalvamento;
    private $anoCoefTecnolo;
    private $anoCoefSalvamento;
    private $tipoCoefTecnolo;

    private $coefResultSalvamento;
    private $estadoCoefTecnolo;
    private $estadoCoefSalvamento;
    private $rodamientoCoefTecnolo;
    private $rodamientoCoefSalvamento;


    public function __construct()
    {
        parent::__construct();
    }



    /***************************/
    /* COMBOX:CLIENTES */
    /***************************/

    public function comboxCliente()
    {

        /* "SELECT p.codproducto, p.descripcion, p.precio, pr.codproveedor, pr.proveedor 
     FROM producto p 
     INNER JOIN proveedor pr 
     ON p.proveedor = pr.codproveedor 
     WHERE p.codproducto = $id_producto";*/

        $sql = "SELECT * FROM clientes";

        $request = $this->select_all($sql);
        return $request;
    }

    /***************************/
    /* COMBOX:DEPARTAMENTO */
    /***************************/

    public function comboxDepa()
    {

        /* "SELECT p.codproducto, p.descripcion, p.precio, pr.codproveedor, pr.proveedor 
     FROM producto p 
     INNER JOIN proveedor pr 
     ON p.proveedor = pr.codproveedor 
     WHERE p.codproducto = $id_producto";*/

        $sql = "SELECT * FROM departamentos";

        $request = $this->select_all($sql);
        return $request;
    }

    /***************************/
    /* COMBOX:VEHICULO */
    /***************************/

    public function comboxVeh()
    {

        /* "SELECT p.codproducto, p.descripcion, p.precio, pr.codproveedor, pr.proveedor 
     FROM producto p 
     INNER JOIN proveedor pr 
     ON p.proveedor = pr.codproveedor 
     WHERE p.codproducto = $id_producto";*/


        //Tipo-Vehiculo - Marca - Modelo -Trasmicion - ano

        $sql = "SELECT v.idVehiculo, v.trasmision, t.descripcion, m.marca, ma.nombre,v.ano 
              FROM vehiculos v
              INNER JOIN tipo_vehiculo t
              ON v.tipoId = t.id
              INNER JOIN marca m 
              ON v.marcaId = m.idMarca
              LEFT JOIN modelos ma
              ON v.modeloId = ma.idmodelo";


        //$sql = "SELECT * FROM vehiculos";  

        $request = $this->select_all($sql);
        return $request;
    }

    /***************************/
    /* COMBOX:MUNICIPIOS */
    /***************************/

    public function comboxMunicId(int $intIdDepartamento)
    {

        $this->municipioId = $intIdDepartamento;

        $sql = "SELECT idMun, nombre FROM municipio WHERE depId = $this->municipioId";

        /*INNER JOIN proveedor pr 
     ON p.proveedor = pr.codproveedor 
     WHERE p.codproducto = $id_producto";*/

        //$sql = "SELECT * FROM tipo_vehiculo";   

        $request = $this->select_all($sql);
        return $request;
    }

    #######################################
    #  MOSTRAR TODO EL AVALUO  # 
    #######################################
    public function selectAvaluos()
    {

        $sql = "SELECT c.idCliente, c.nombreNatural, c.ruc, a.idAvaluo, a.activo, a.vehiculoId, v.trasmision,
                       v.tipo, m.marca, mo.nombre
                 FROM avaluos a
                 INNER JOIN clientes c
                 ON a.clienteId = c.idCliente
                 INNER JOIN vehiculos v
                 ON a.vehiculoId  = v.idVehiculo
                 INNER JOIN marca m
                 ON v.marcaId = m.idMarca
                 INNER JOIN modelos mo
                 ON v.modeloId = mo.idmodelo
                 
                 ";
        $request = $this->select_all($sql);
        return $request;

        #INNER JOIN tipo_vehiculo t ON m.tipoId = t.id
    }


    ##############################################################
    #  MUESTRA 1 PEDIDO COMPLETO(pedido, cliente y producto)  # 
    ##############################################################

    //MUESTRA 1 PEDIDO COMPLETO(pedido, cliente y producto)
    public function selectAvaluo(int $idpedido, $idpersona = NULL)
    {
        $busqueda = "";
        if ($idpersona != NULL) {
            $busqueda = " AND p.personaid =" . $idpersona;
        }
        $request = array();
        $sql = "SELECT p.idpedido,
							p.referenciacobro,
							p.idtransaccionpaypal,
							p.personaid,
							DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
							p.costo_envio,
							p.monto,
							p.tipopagoid,
							t.tipopago,
							p.direccion_envio,
							p.status
					FROM pedido as p
					INNER JOIN tipopago t
					ON p.tipopagoid = t.idtipopago
					WHERE p.idpedido =  $idpedido " . $busqueda;
        $requestPedido = $this->select($sql);
        if (!empty($requestPedido)) {
            $idpersona = $requestPedido['personaid'];
            $sql_cliente = "SELECT idpersona,
										nombres,
										apellidos,
										telefono,
										email_user,
										nit,
										nombrefiscal,
										direccionfiscal 
								FROM persona WHERE idpersona = $idpersona ";
            $requestcliente = $this->select($sql_cliente);
            $sql_detalle = "SELECT p.idproducto,
											p.nombre as producto,
											d.precio,
											d.cantidad
									FROM detalle_pedido d
									INNER JOIN producto p
									ON d.productoid = p.idproducto
									WHERE d.pedidoid = $idpedido";
            $requestProductos = $this->select_all($sql_detalle);
            $request = array(
                'cliente' => $requestcliente,
                'orden' => $requestPedido,
                'detalle' => $requestProductos
            );
        }
        return $request;
    }



    #######################################
    #  INSERTAR AVALUO  # string
    #######################################

    public function insertAvaluo(
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



    ) {

        $this->clienteId = $sectCliente;
        $this->departamentoId = $selectDepart;
        $this->vehiculoId = $selectVeh;
        $this->municipioId = $selectMunic;
        $this->coraza = $coraza;

        $this->bumperDel = $bumperDel;
        $this->bumperTras = $bumperTras;
        $this->guardafangoDel = $guardafangoDel;
        $this->guardafangoTras = $guardafangoTras;
        $this->puertaDel = $puertaDel;

        $this->puertaTras = $puertaTras;
        $this->balijero = $balijero;
        $this->guantera = $guantera;
        $this->canuela = $canuela;
        $this->pintura = $pintura;

        $this->sistEscape = $sistEscape;
        $this->llantas = $llantas;
        $this->llantaRepto = $llantaRepto;
        $this->radio = $radio;
        $this->usb = $usb;
        $this->parlantes = $parlantes;
        $this->encendedor = $encendedor;
        $this->espejo                        = $espejo;
        $this->pito                          = $pito;
        $this->tricos                        = $tricos;
        $this->motorAguaTrico                = $motorAguaTrico;
        $this->alarma                        = $alarma;

        $this->antena                        = $antena;
        $this->ascensoresDel                 = $ascensoresDel;
        $this->ascensoresTras                = $ascensoresTras;
        $this->cinturonesDel                 = $cinturonesDel;
        $this->cinturonesTrans               = $cinturonesTrans;
        $this->material                      = $material;
        $this->asiento                       = $asiento;

        $this->forroPuerta                   = $forroPuerta;
        $this->alfombra                      = $alfombra;
        $this->tapasol                       = $tapasol;
        $this->velocimetro                   = $velocimetro;
        $this->tacometro                     = $tacometro;
        $this->aceite                        = $aceite;
        $this->combustible                   = $combustible;
        $this->cargaBateria                  = $cargaBateria;
        $this->vidrioDelantero               = $vidrioDelantero;
        $this->vidrioTrasero                 = $vidrioTrasero;
        $this->ventanilla                    = $ventanilla;

        $this->evaporador                    = $evaporador;
        $this->abanico                       = $abanico;
        $this->pescantes                     = $pescantes;
        $this->mataBurro                     = $mataBurro;
        $this->halogeno                      = $halogeno;
        $this->rinesSencillos                = $rinesSencillos;
        $this->rinesLujo                     = $rinesLujo;
        $this->luzPanel                      = $luzPanel;
        $this->faros                         = $faros;
        $this->luzStop                       = $luzStop;
        $this->luzRetro                      = $luzRetro;
        $this->lateralesTras                 = $lateralesTras;
        $this->pideviaTras                   = $pideviaTras;
        $this->estadoFisStop                 = $estadoFisStop;
        $this->estadoFisPVia                 = $estadoFisPVia;

        $this->luzPlaca                      = $luzPlaca;
        $this->luzParqueo                    = $luzParqueo;
        $this->vaRemplazo                    = $vaRemplazo;
        $this->anoFabricacion                = $anoFabricacion;
        $this->anoActual                     = $anoActual;
        $this->antigAjustada                 = $antigAjustada;
        $this->vidaUtil                      = $vidaUtil;

        $this->estado                        = $estado;
        $this->coeficienteMotor              = $coeficienteMotor;
        $this->coeficienteCarroceriaInterior = $coeficienteCarroceriaInterior;
        $this->coeficenteCarroceriaExterior  = $coeficenteCarroceriaExterior;
        $this->sistemaElectrico              = $sistemaElectrico;
        $this->estadoFisVehiculo             = $estadoFisVehiculo;

        $this->equipCoefTecnolo              = $equipCoefTecnolo;
        $this->equipCoefSalvamento           = $equipCoefSalvamento;
        $this->marcaCoefTecnolo              = $marcaCoefTecnolo;
        //$this->marcaCoefSalvamento         = $marcaCoefSalvamento; 
        $this->modeloCoefTecnolo             = $modeloCoefTecnolo;
        $this->modeloCoefSalvamento          = $modeloCoefSalvamento;
        $this->anoCoefTecnolo                = $anoCoefTecnolo;
        $this->anoCoefSalvamento             = $anoCoefSalvamento;
        $this->tipoCoefTecnolo               = $tipoCoefTecnolo;

        $this->coefResultSalvamento          = $coefResultSalvamento;
        $this->estadoCoefTecnolo             = $estadoCoefTecnolo;
        $this->estadoCoefSalvamento          = $estadoCoefSalvamento;
        $this->rodamientoCoefTecnolo         = $rodamientoCoefTecnolo;
        $this->rodamientoCoefSalvamento      = $rodamientoCoefSalvamento;





        $sql = "INSERT INTO avaluos(
            clienteId, 
            departamentoId, 
            vehiculoId, 
            municipioId, 
            coraza,

            bumperDel,
            bumperTras,
            guardafangoDel,
            guardafangoTras,
            puertaDel,

            puertaTras,
            balijero,
            guantera,
            canuela,
            pintura,

            sistEscape,
            llantas,
            llantaRepto,
            radio,
            usb,

            parlantes,
            encendedor,
            espejo,
            pito,
            tricos,

            motorAguaTrico,
            alarma,

            antena,
			ascensoresDel,
			ascensoresTras,
			cinturonesDel,
			cinturonesTrans,
			material,
			asiento,

            forroPuerta,
            alfombra,
            tapasol,
            velocimetro,
            tacometro,
            aceite,
            combustible,
            cargaBateria,
            vidrioDelantero,
            vidrioTrasero,
            ventanilla,

            evaporador,
		    abanico,
		    pescantes,
		    mataBurro,
		    halogeno,
		    rinesSencillos,
		    rinesLujo,
		    luzPanel,
		    faros,
		    luzStop,
		    luzRetro,
		    lateralesTras,
		    pideviaTras,
		    estadoFisStop,
		    estadoFisPVia,

            luzPlaca,
            luzParqueo,
            vaRemplazo,
            anoFabricacion,
            anoActual,
            antigAjustada,
            vidaUtil,

            estado,
            coeficienteMotor,
            coeficienteCarroceriaInterior,

            coeficenteCarroceriaExterior,
            sistemaElectrico,
            estadoFisVehiculo,

            equipCoefTecnolo,
            equipCoefSalvamento,
            marcaCoefTecnolo,
            modeloCoefTecnolo,
            modeloCoefSalvamento,
            anoCoefTecnolo,
            anoCoefSalvamento,
            tipoCoefTecnolo,
            
            coefResultSalvamento,
            estadoCoefTecnolo,
            estadoCoefSalvamento,
            rodamientoCoefTecnolo,
            rodamientoCoefSalvamento 
       


            ) VALUES(
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,
            ?,?,?,?,
            ?,?,?,?,
            ?,?,?,?,
            ?,?,?,?,
            ?

            )";



        $arrData = array(
            $this->clienteId,
            $this->departamentoId,
            $this->vehiculoId,
            $this->municipioId,
            $this->coraza,

            $this->bumperDel,
            $this->bumperTras,
            $this->guardafangoDel,
            $this->guardafangoTras,
            $this->puertaDel,

            $this->puertaTras,
            $this->balijero,
            $this->guantera,
            $this->canuela,
            $this->pintura,

            $this->sistEscape,
            $this->llantas,
            $this->llantaRepto,
            $this->radio,
            $this->usb,

            $this->parlantes,
            $this->encendedor,
            $this->espejo,
            $this->pito,
            $this->tricos,

            $this->motorAguaTrico,
            $this->alarma,

            $this->antena,
            $this->ascensoresDel,
            $this->ascensoresTras,
            $this->cinturonesDel,
            $this->cinturonesTrans,
            $this->material,
            $this->asiento,

            $this->forroPuerta,
            $this->alfombra,
            $this->tapasol,
            $this->velocimetro,
            $this->tacometro,
            $this->aceite,
            $this->combustible,
            $this->cargaBateria,
            $this->vidrioDelantero,
            $this->vidrioTrasero,
            $this->ventanilla,

            $this->evaporador,
            $this->abanico,
            $this->pescantes,
            $this->mataBurro,
            $this->halogeno,
            $this->rinesSencillos,
            $this->rinesLujo,
            $this->luzPanel,
            $this->faros,
            $this->luzStop,
            $this->luzRetro,
            $this->lateralesTras,
            $this->pideviaTras,
            $this->estadoFisStop,
            $this->estadoFisPVia,

            $this->luzPlaca,
            $this->luzParqueo,
            $this->vaRemplazo,
            $this->anoFabricacion,
            $this->anoActual,
            $this->antigAjustada,
            $this->vidaUtil,

            $this->estado,
            $this->coeficienteMotor,

            $this->coeficienteCarroceriaInterior,
            $this->coeficenteCarroceriaExterior,
            $this->sistemaElectrico,
            $this->estadoFisVehiculo,

            $this->equipCoefTecnolo,
            $this->equipCoefSalvamento,
            $this->marcaCoefTecnolo,
            //$this->marcaCoefSalvamento
            $this->modeloCoefTecnolo,
            $this->modeloCoefSalvamento,
            $this->anoCoefTecnolo,
            $this->anoCoefSalvamento,
            $this->tipoCoefTecnolo,
            $this->coefResultSalvamento,

            $this->estadoCoefTecnolo,
            $this->estadoCoefSalvamento,
            $this->rodamientoCoefTecnolo,
            $this->rodamientoCoefSalvamento

        );


        $requestInsert = $this->insert($sql, $arrData);
        return $requestInsert;
    }
}
