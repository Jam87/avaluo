<!--MODAL TIPO VEHICULO-->
<div id="modalTipoVeh" class="modal zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-header bg-pattern p-3 headerRegister">
                <h4 class="card-title mb-0" id="titleModal"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alert alert-warning  rounded-0 mb-0">
                <i class="ri-alert-line me-3 align-middle"></i><b><?= $data['page_title_bold']; ?></b>
                <?= $data['descrption_modal1']; ?><span class="text-danger"> * </span><?= $data['descrption_modal2']; ?>
            </div>
            <div class="modal-body">
                <form method="post" id="formTipoVeh" name="formTipoVeh">

                    <input type="hidden" id="idTipoVeh" name="idTipoVeh" value="">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Tipo de vehiculo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Escriba el tipo de vehiculo" required>
                    </div><!--Fin nombre-->
                    <div class="mb-3">
                        <label for="exampleSelect1">Estado <span class="text-danger">*</span></label>
                        <select class="form-select mb-3" id="listStatus" name="listStatus" required>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div> <!--Fin Select-->
                    <div class="text-end">
                        <button id="btnActionForm" class="btn-primary" type="submit" class="btn btn-form"><span id="btnText">Guardar</span></button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->