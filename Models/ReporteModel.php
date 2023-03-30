<?php 
	class ReporteModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectAvaluo(int $idAvaluo, $idpersona = NULL){
			
			if(is_numeric($idAvaluo) && !empty($idAvaluo)){
				 				
				 $request = array();
				 
				 #DATA AVALUO
				 $sql = "SELECT *
						 FROM avaluos 
						 WHERE idAvaluo = $idAvaluo";
	 
				 $request_avaluo = $this->select($sql);
			 
				 #DATA CLIENTE
				 if(!empty($request_avaluo)){
					 
					$sql = "SELECT a.idAvaluo, a.clienteId, c.nombreNatural
					FROM avaluos a
					INNER JOIN clientes c
					ON a.clienteId = c.idCliente 
					WHERE a.idAvaluo = $idAvaluo";

							 
					 $request_cliente = $this->select($sql);
		 
					 #DATA VEHICULO
					$sql = "SELECT a.idAvaluo, a.vehiculoId, v.trasmision, t.descripcion AS tipoVehiculo, m.marca, d.nombre AS modelo
					FROM avaluos a
					INNER JOIN vehiculos v
					ON a.vehiculoId = v.idVehiculo
					INNER JOIN tipo_vehiculo t
					ON v.tipoId = t.id
					INNER JOIN marca m
					ON v.marcaId = m.idMarca 
					INNER JOIN modelos d
					ON v.modeloId = d.idmodelo
					WHERE a.idAvaluo = $idAvaluo";

					 $request_vehiculo = $this->select($sql);
		 
					 $request = array('avaluo'   => $request_avaluo,
									  'cliente'  => $request_cliente, 
									  'vehiculo' => $request_vehiculo
									 );
				 }else{
					 header('Location: '.base_url().'/avaluos');
				 }
			}


		
	


			/*$busqueda = "";
			if($idpersona != NULL){
				$busqueda = " AND p.personaid =".$idpersona;
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
					WHERE p.idpedido =  $idpedido ".$busqueda;
			/*$requestPedido = $this->select($sql);
			if(!empty($requestPedido)){
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
				$request = array('cliente' => $requestcliente,
								'orden' => $requestPedido,
								'detalle' => $requestProductos
								 );
			}*/
			return $request;
		}

		

	}
 ?>