<!--MODAL DE VEHICULO-->
<div id="modalVehiculo" class="modal zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-header bg-pattern p-3 headerRegister">
                <h4 class="card-title mb-0" id="titleModal">Nuevo usuario</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alert alert-warning  rounded-0 mb-0">
                <i class="ri-alert-line me-3 align-middle"></i><b>Estimado usuario</b>
                Los campos remarcados con <span class="text-danger"> * </span>son necesarios
            </div>
            <div class="modal-body">
                <!-- TODO: Formulario de Mantenimiento -->
                <form method="post" id="formVeh" name="formVeh">
                    <input type="hidden" id="idVeh" name="idVeh" value="">
                    <div class="modal-body">
                        <!--GRUPO 1-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="nombre">Tipo de vehiculo <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" id="tveh" name="tveh">

                                    </select>
                                </div><!-- Fin:Tipo de veh -->

                                <div class="col-sm-4">
                                    <label for="nombre">Marca <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" id="marca" name="marca">

                                    </select>
                                </div><!-- Fin:Marca -->

                                <div class="col-sm-4">
                                    <label for="nombre">Modelo <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" id="modelo" name="modelo">

                                    </select>
                                </div><!-- Fin:Modelo -->
                            </div>
                        </div><!-- Fin: grupo1 -->

                        <!--GRUPO 2-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="nombre">Trasmisión <span class="text-danger">*</span></label>
                                    <input type="text" class="form-border" name="trasmicion" id="trasmicion" placeholder="EJ. MECANICO">
                                </div><!-- Fin:Tipo de veh -->

                                <div class="col-sm-4">
                                    <label for="nombre">Tipo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-border" name="tipo" id="tipo" placeholder="EJ. SEDAN">
                                </div><!-- Fin:Marca -->

                                <div class="col-sm-4">
                                    <label for="nombre">N° de placa<span class="text-danger">*</span></label>
                                    <input type="text" class="form-border" name="placa" id="placa" placeholder="EJ. M 2611">
                                </div><!-- Fin:Modelo -->
                            </div>
                        </div><!-- Fin: grupo1 -->

                        <br>
                        <!--GRUPO 3-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="nombre">Rodamiento <span class="text-danger">*</span></label>
                                    <input type="text" class="form-border" name="rodamiento" id="rodamiento" placeholder="EJ. 50.60">
                                </div><!-- Fin:Tipo de veh -->

                                <div class="col-sm-4">
                                    <label for="nombre">Año <span class="text-danger">*</span></label>
                                    <input type="number" class="form-border" name="ano" id="ano" placeholder="EJ. 2000">
                                </div><!-- Fin:Marca -->

                                <div class="col-sm-4">
                                    <label for="nombre">Estado <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" id="lStatus" name="lStatus" required>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </div><!-- Fin:Modelo -->
                            </div>
                        </div><!-- Fin: grupo1 -->
                                    
                       
                    </div><!-- Fin: grupo4 -->
               
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnActionForm" name="action" value="add" class="btn btn-primary "><span id="btnText">Guardar</span></button>
            </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->