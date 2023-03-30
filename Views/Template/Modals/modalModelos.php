<!--MODAL DE USUARIO-->
<div id="modalModelo" class="modal zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
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
                <form method="post" id="formModelo" name="formModelo">
                    <input type="hidden" id="idModelo" name="idModelo" value="">
                    <div class="modal-body">
                        <!--GRUPO 1-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="nombre">Tipo de vehiculo <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" id="tipo" name="tipo">

                                    </select><!-- Fin:Tipo de veh -->
                                </div>

                                <div class="col-sm-6">
                                    <label for="nombre">Marca <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" id="marca" name="marca">

                                    </select><!-- Fin:Marca -->
                                </div>
                            </div>
                        </div><!-- Fin: grupo1 -->
                        <br>

                        <!--GRUPO 4-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                <label for="nombre">Modelo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-border" name="modelo" id="modelo" placeholder="Ingrese un modelo">
                                </div><!--Fin:Modelo-->
                                <div class="col-sm-6">
                                    <div class="formulario__grupo" id="grupo__nombre">
                                        <label for="nombre">Estado <span class="text-danger">*</span></label>
                                        <select class="form-select mb-3" id="lStatus" name="lStatus" required>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div><!--Fin:Estado-->
                                </div>

                            </div>
                        </div><!-- Fin: grupo4 -->
                        <br>

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