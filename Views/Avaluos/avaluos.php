<?php
#Mando a llamar al modal
//getModal('modalAvaluos', $data);
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="<?= $data['data-sidebar-size']; ?>" data-sidebar-image="none">

<head>
    <title><?= $data['page_title']; ?></title>
    <?php MainHead($data); ?>
</head>

<body>

    <div id="layout-wrapper">

        <!-- ==== Main Headerr ====== -->
        <?php MainHeader($data); ?>

        <!-- ========== App Menu ========== -->
        <?php MainMenu($data); ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0"><?= $data['page_name']; ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Avaluos </a></li>
                                        <li class="breadcrumb-item active">Departamentos</li>
                                    </ol>
                                </div>

                            </div>
                        </div>


                        <div class="col-lg-12">
                            <form role="form" id="formAvaluo" autocomplete="off" class="form-validate-jquery">
                                <!--GRUPO 1:Cliente y Departamentos-->
                                <div style="background:#F2F2F2; color:#404040;">
                                    <br>
                                    <div class="form-grou mx-auto" style="width: 90%;">
                                        <div class="row">
                                            <div class="col-sm-12 ">

                                                <!--GRUPO 1-->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6">

                                                            <label for="nombre">Clientes<span class="text-danger">*</span></label>
                                                            <!-- select cliente -->
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <select class="form-select mb-3" id="sectCliente" name="sectCliente">
                                                                            <!-- cargar con js -->
                                                                        </select><!-- Fin:Tipo de veh -->

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-6">

                                                            <label for="nombre">Departamentos <span class="text-danger">*</span></label>

                                                            <!-- select tipo de equipo -->
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <select class="form-select mb-3" id="selectDepart" name="selectDepart">
                                                                            <!-- cargar con js -->
                                                                        </select><!-- Fin:Tipo de veh -->

                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div><!--Fin grupo1-->

                                    <!--GRUPO 2:Vehiculo y Municipio-->
                                    <div class="form-group  mx-auto" style="width: 90%;">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="formulario__grupo" id="grupo__nombre">
                                                    <!--GRUPO 1-->
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="formulario__grupo" id="grupo__nombre">

                                                                    <label for="nombre">Vehiculo<span class="text-danger">*</span></label>

                                                                    <!-- select tipo de equipo -->
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <select class="form-control" name="selectVeh" id="selectVeh">
                                                                                    <!-- cargar con js -->
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--Mensaje error-->
                                                                    <p class="formulario__input-error">El usuario tiene que ser de 4
                                                                        a
                                                                        16
                                                                        dígitos y solo puede contener numeros, letras y guion bajo.
                                                                    </p>
                                                                </div><!-- Fin: grupo__nombre -->
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="formulario__grupo" id="grupo__apellido">
                                                                    <label for="nombre">Municipio <span class="text-danger">*</span></label>

                                                                    <!-- select tipo de equipo -->
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <select class="form-control" name="selectMunic" id="selectMunic">
                                                                                    <!-- cargar con js -->
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--Mensaje error-->
                                                                    <p class="formulario__input-error">El usuario tiene que ser de 4
                                                                        a
                                                                        16
                                                                        dígitos y solo puede contener numeros, letras y guion bajo.
                                                                    </p>
                                                                </div><!-- Fin: grupo__apellido -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- Fin: grupo__nombre -->
                                            </div><!--Fin col-sm-12-->
                                        </div><!--Fin row-->
                                    </div><!--Fin form-group-->

                                    <br>
                                    <br>
                                    <br>
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="row">
                                                <div class="col-xxl-6">

                                                    <div class="card">
                                                        <div class="card-body">

                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-top-home" role="tab" aria-selected="true">
                                                                        Ficha Técnica
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-profile" role="tab" aria-selected="false">
                                                                        Calculo del valor de reemplazo
                                                                    </a>
                                                                </li>
                                                                <!--<li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab" href="#nav-border-top-messages" role="tab" aria-selected="false">
                                                                    Messages
                                                                </a>
                                                            </li>-->

                                                            </ul>
                                                            <div class="tab-content text-muted">
                                                                <div class="tab-pane active" id="nav-border-top-home" role="tabpanel">
                                                                    <div class="d-flex">

                                                                        <div class="flex-grow-1 ms-2">
                                                                            <!--GRUPO 1-->
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="formulario__grupo" id="grupo__nombre">
                                                                                        <!--GRUPO 1-->
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-6">
                                                                                                    <div class="formulario__grupo" id="grupo__nombre">

                                                                                                        <!-- select tipo de equipo -->
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-12">
                                                                                                                <!--TABLA-->
                                                                                                                <table class="table table-bordered">
                                                                                                                    <thead>
                                                                                                                        <tr>
                                                                                                                            <th style="background-color:#72C1F2"><b>CARROCERIA EXTERIOR:</b></th>
                                                                                                                            <th>B</th>
                                                                                                                            <th>R</th>
                                                                                                                            <th>M</th>
                                                                                                                            <th>NO TIENE</th>
                                                                                                                        </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <!--CORAZA-->
                                                                                                                        <tr>
                                                                                                                            <th>Coraza</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="coraza" value="corazaBueno" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="coraza" value="corazaRegular" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="coraza" value="corazaMalo" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="coraza" value="corazaNoTiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Bumper Delantero-->
                                                                                                                        <tr>
                                                                                                                            <th>Bumper Delantero</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperDel" value="bumperDelB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperDel" value="bumperDelR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperDel" value="bumperDelM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperDel" value="bumperDelNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Bumper Trasero-->
                                                                                                                        <tr>
                                                                                                                            <th>Bumper Trasero</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperTras" value="bumperTrasB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperTras" value="bumperTrasR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperTras" value="bumperTrasM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="bumperTras" value="bumperTrasNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Guardafancos Del.-->
                                                                                                                        <tr>
                                                                                                                            <th>Guardafancos Del.</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoDel" value="guardafangoDelB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoDel" value="guardafangoDelR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoDel" value="guardafangoDelM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoDel" value="guardafangoDelNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Guardafancos Tras.-->
                                                                                                                        <tr>
                                                                                                                            <th>Guardafancos Tras.</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoTras" value="guardafangoTrasB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoTras" value="guardafangoTrasR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoTras" value="guardafangoTrasM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guardafangoTras" value="guardafangoTrasNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Puertas Delanteras-->
                                                                                                                        <tr>
                                                                                                                            <th>Puertas Delanteras.</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaDel" value="puertaDelB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaDel" value="puertaDelR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaDel" value="puertaDelM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaDel" value="puertaDelNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Puertas Traseras-->
                                                                                                                        <tr>
                                                                                                                            <th>Puertas Traseras</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaTras" value="puertaTrasB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaTras" value="puertaTrasR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaTras" value="puertaTrasM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="puertaTras" value="puertaTrasNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>


                                                                                                                        <!--Balijero-->
                                                                                                                        <tr>
                                                                                                                            <th>Balijero</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="balijero" value="balijeroB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="balijero" value="balijeroR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="balijero" value="balijeroM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="balijero" value="balijeroNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Techo-->
                                                                                                                        <tr>
                                                                                                                            <th>Techo</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="techo" value="techoB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="techo" value="techoR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="techo" value="techoM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="techo" value="techoNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Guantera-->
                                                                                                                        <tr>
                                                                                                                            <th>Guantera</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guantera" value="guanteraB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guantera" value="guanteraR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guantera" value="guanteraM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="guantera" value="guanteraNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Cañuelas-->
                                                                                                                        <tr>
                                                                                                                            <th>Cañuelas</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="canuela" value="canuelaB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="canuela" value="canuelaR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="canuela" value="canuelaM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="canuela" value="canuelaNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Pintura-->
                                                                                                                        <tr>
                                                                                                                            <th>Pintura</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="pintura" value="pinturaB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="pintura" value="pinturaR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="pintura" value="pinturaM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="pintura" value="pinturaNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Sist. Escape-->
                                                                                                                        <tr>
                                                                                                                            <th>Sist. Escape</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="sistEscape" value="sistEscapeB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="sistEscape" value="sistEscapeR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="sistEscape" value="sistEscapeM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="sistEscape" value="sistEscapeNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Llantas-->
                                                                                                                        <tr>
                                                                                                                            <th>Llantas</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantas" value="llantasB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantas" value="llantasR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantas" value="llantasM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantas" value="llantasNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                        <!--Llanta de Repto.-->
                                                                                                                        <tr>
                                                                                                                            <th>Llanta de Repto.</th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantaRepto" value="llantaReptoB" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantaRepto" value="llantaReptoR" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantaRepto" value="llantaReptoM" />
                                                                                                                            </th>
                                                                                                                            <th>
                                                                                                                                <input type="radio" name="llantaRepto" value="llantaReptoNotiene" />
                                                                                                                            </th>
                                                                                                                        </tr>

                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                        </div>


                                                                                                    </div><!-- Fin: grupo__nombre -->
                                                                                                </div>

                                                                                                <div class="col-sm-6">
                                                                                                    <div class="formulario__grupo" id="grupo__nombre">

                                                                                                        <!-- select tipo de equipo -->
                                                                                                        <div class="form-group">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-12">
                                                                                                                    <!--TABLA-->
                                                                                                                    <table class="table table-bordered">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th><b>ACCESORIOS INTERNOS:</b></th>
                                                                                                                                <th>B</th>
                                                                                                                                <th>R</th>
                                                                                                                                <th>M</th>
                                                                                                                                <th>NO TIENE</th>
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <!--Pantalla DVD-->
                                                                                                                            <tr>
                                                                                                                                <th>Pantalla DVD</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pantallaDVD" value="pantallaDVDB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pantallaDVD" value="pantallaDVDR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pantallaDVD" value="pantallaDVDM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pantallaDVD" value="pantallaDVDNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Radio cassett-->
                                                                                                                            <tr>
                                                                                                                                <th>Radio cassett</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="radio" value="radioB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="radio" value="radioR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="radio" value="radioM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="radio" value="radioNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--USB-->
                                                                                                                            <tr>
                                                                                                                                <th>USB</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="usb" value="usbB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="usb" value="usbR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="usb" value="usbM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="usb" value="usbNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Parlantes -->
                                                                                                                            <tr>
                                                                                                                                <th>Parlantes</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="parlantes" value="parlantesB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="parlantes" value="parlantesR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="parlantes" value="parlantesM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="parlantes" value="parlantesNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Cenicero-->
                                                                                                                            <tr>
                                                                                                                                <th>Cenicero</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cenicero" value="ceniceroB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cenicero" value="ceniceroR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cenicero" value="ceniceroM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cenicero" value="ceniceroNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Encendedor-->
                                                                                                                            <tr>
                                                                                                                                <th>Encendedor</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="encendedor" value="encendedorB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="encendedor" value="encendedorR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="encendedor" value="encendedorM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="encendedor" value="encendedorNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Espejos-->
                                                                                                                            <tr>
                                                                                                                                <th>Espejos</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="espejo" value="espejoB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="espejo" value="espejoR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="espejo" value="espejoM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="espejo" value="espejoNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Pito-->
                                                                                                                            <tr>
                                                                                                                                <th>Pito</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pito" value="pitoB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pito" value="pitoR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pito" value="pitoM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="pito" value="pitoNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Tricos-->
                                                                                                                            <tr>
                                                                                                                                <th>Tricos</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tricos" value="tricosB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tricos" value="tricosR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tricos" value="tricosM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tricos" value="tricosNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Motor Agua Trico-->
                                                                                                                            <tr>
                                                                                                                                <th>Motor Agua Trico</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="motorAguaTrico" value="motorAguaTricoB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="motorAguaTrico" value="motorAguaTricoR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="motorAguaTrico" value="motorAguaTricoM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="motorAguaTrico" value="motorAguaTricoNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Alarma-->
                                                                                                                            <tr>
                                                                                                                                <th>Alarma</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alarma" value="alarmaB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alarma" value="alarmaR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alarma" value="alarmaM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alarma" value="alarmaNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Antena-->
                                                                                                                            <tr>
                                                                                                                                <th>Antena</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="antena" value="antenaB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="antena" value="antenaR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="antena" value="antenaM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="antena" value="antenaNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Ascensores Del.-->
                                                                                                                            <tr>
                                                                                                                                <th>Ascensores Del.</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresDel" value="ascensoresDelB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresDel" value="ascensoresDelR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresDel" value="ascensoresDelM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresDel" value="ascensoresDelNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Ascensores Tras.-->
                                                                                                                            <tr>
                                                                                                                                <th>Ascensores Tras.</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresTras" value="ascensoresTrasB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresTras" value="ascensoresTrasR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresTras" value="ascensoresTrasM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="ascensoresTras" value="ascensoresTrasNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Cinturones Del.-->
                                                                                                                            <tr>
                                                                                                                                <th>Cinturones Del.</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesDel" value="cinturonesDelB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesDel" value="cinturonesDelR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesDel" value="cinturonesDelM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesDel" value="cinturonesDelNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Cinturones Tras.-->
                                                                                                                            <tr>
                                                                                                                                <th>Cinturones Tras.</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesTrans" value="cinturonesTransB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesTrans" value="cinturonesTransR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesTrans" value="cinturonesTransM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cinturonesTrans" value="cinturonesTransNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div><!-- Fin: grupo__nombre -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div><!-- Fin: grupo__nombre -->
                                                                                </div>

                                                                            </div>
                                                                            <hr>
                                                                            <!--GRUPO 2-->

                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="formulario__grupo" id="grupo__nombre">

                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-6">
                                                                                                    <div class="formulario__grupo" id="grupo__nombre">

                                                                                                        <!-- select tipo de equipo -->
                                                                                                        <div class="form-group">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-12">
                                                                                                                    <!--TABLA-->
                                                                                                                    <table class="table table-bordered">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th><b>INTERIOR:</b></th>
                                                                                                                                <th>B</th>
                                                                                                                                <th>R</th>
                                                                                                                                <th>M</th>
                                                                                                                                <th>NO TIENE</th>
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <!--Material (Cuero)-->
                                                                                                                            <tr>
                                                                                                                                <th>Material (Cuero)</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="material" value="materialB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="material" value="materialR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="material" value="materialM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="material" value="materialNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Asientos-->
                                                                                                                            <tr>
                                                                                                                                <th>Asientos</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="asiento" value="asientoB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="asiento" value="asientoR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="asiento" value="asientoM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="asiento" value="asientoNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Forro Puertas-->
                                                                                                                            <tr>
                                                                                                                                <th>Forro Puertas</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroPuerta" value="forroPuertaB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroPuerta" value="forroPuertaR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroPuerta" value="forroPuertaM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroPuerta" value="forroPuertaNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Alfombra-->
                                                                                                                            <tr>
                                                                                                                                <th>Alfombra</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alfombra" value="alfombraB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alfombra" value="alfombraR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alfombra" value="alfombraM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="alfombra" value="alfombraNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Forro Techo-->
                                                                                                                            <tr>
                                                                                                                                <th>Forro Techo</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroTecho" value="forroTechoB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroTecho" value="forroTechoR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroTecho" value="forroTechoM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="forroTecho" value="forroTechoNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Tapasol-->
                                                                                                                            <tr>
                                                                                                                                <th>Tapasol</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tapasol" value="tapasolB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tapasol" value="tapasolR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tapasol" value="tapasolM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tapasol" value="tapasolNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div><!-- Fin: grupo__nombre -->
                                                                                                </div>

                                                                                                <div class="col-sm-6">
                                                                                                    <div class="formulario__grupo" id="grupo__nombre">

                                                                                                        <!-- select tipo de equipo -->
                                                                                                        <div class="form-group">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-12">
                                                                                                                    <!--TABLA-->
                                                                                                                    <table class="table table-bordered">
                                                                                                                        <thead>
                                                                                                                            <tr>
                                                                                                                                <th><b>MARCADORES:</b></th>
                                                                                                                                <th>B</th>
                                                                                                                                <th>R</th>
                                                                                                                                <th>M</th>
                                                                                                                                <th>NO TIENE</th>
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody>
                                                                                                                            <!--Temperatura-->
                                                                                                                            <tr>
                                                                                                                                <th>Temperatura</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="temperatura" value="temperaturaB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="temperatura" value="temperaturaR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="temperatura" value="temperaturaM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="temperatura" value="temperaturaNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Velocímetro-->
                                                                                                                            <tr>
                                                                                                                                <th>Velocímetro</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="velocimetro" value="velocimetroB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="velocimetro" value="velocimetroR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="velocimetro" value="velocimetroM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="velocimetro" value="velocimetroNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Tacómetro-->
                                                                                                                            <tr>
                                                                                                                                <th>Tacómetro</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tacometro" value="tacometroB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tacometro" value="tacometroR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tacometro" value="tacometroM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="tacometro" value="tacometroNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Aceite-->
                                                                                                                            <tr>
                                                                                                                                <th>Aceite</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="aceite" value="aceiteB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="aceite" value="aceiteR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="aceite" value="aceiteM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="aceite" value="aceiteNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Combustible-->
                                                                                                                            <tr>
                                                                                                                                <th>Combustible</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="combustible" value="combustibleB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="combustible" value="combustibleR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="combustible" value="combustibleM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="combustible" value="combustibleNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                            <!--Carga de Batería-->
                                                                                                                            <tr>
                                                                                                                                <th>Carga de Batería</th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cargaBateria" value="cargaBateriaB" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cargaBateria" value="cargaBateriaR" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cargaBateria" value="cargaBateriaM" />
                                                                                                                                </th>
                                                                                                                                <th>
                                                                                                                                    <input type="radio" name="cargaBateria" value="cargaBateriaNotiene" />
                                                                                                                                </th>
                                                                                                                            </tr>

                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div><!-- Fin: grupo__nombre -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div><!-- Fin: grupo__nombre -->
                                                                                </div>

                                                                            </div>

                                                                            <hr>

                                                                            <!--GRUPO 3-->
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="formulario__grupo" id="grupo__nombre">

                                                                                            <div class="form-group">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-6">
                                                                                                        <div class="formulario__grupo" id="grupo__nombre">

                                                                                                            <!-- select tipo de equipo -->
                                                                                                            <div class="form-group">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <!--TABLA-->
                                                                                                                        <table class="table table-bordered">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th><b>VIDRIO:</b></th>
                                                                                                                                    <th>B</th>
                                                                                                                                    <th>R</th>
                                                                                                                                    <th>M</th>
                                                                                                                                    <th>NO TIENE</th>
                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody>
                                                                                                                                <!--Delantero-->
                                                                                                                                <tr>
                                                                                                                                    <th>Delantero</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioDelantero" value="vidrioDelanteroB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioDelantero" value="vidrioDelanteroR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioDelantero" value="vidrioDelanteroM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioDelantero" value="vidrioDelanteroNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Trasero-->
                                                                                                                                <tr>
                                                                                                                                    <th>Trasero</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioTrasero" value="vidrioTraseroB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioTrasero" value="vidrioTraseroR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioTrasero" value="vidrioTraseroM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="vidrioTrasero" value="vidrioTraseroNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Ventanillas-->
                                                                                                                                <tr>
                                                                                                                                    <th>Ventanillas</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="ventanilla" value="ventanillaB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="ventanilla" value="ventanillaR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="ventanilla" value="ventanillaM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="ventanilla" value="ventanillaNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                        <hr>

                                                                                                                        <!--AIRE ACONDICIONADO:-->
                                                                                                                        <table class="table table-bordered">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th><b>AIRE ACONDICIONADO:</b></th>
                                                                                                                                    <th>B</th>
                                                                                                                                    <th>R</th>
                                                                                                                                    <th>M</th>
                                                                                                                                    <th>NO TIENE</th>
                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody>
                                                                                                                                <!--Compresor-->
                                                                                                                                <tr>
                                                                                                                                    <th>Compresor</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="compresor" value="compresorB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="compresor" value="compresorR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="compresor" value="compresorM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="compresor" value="compresorNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Evaporador-->
                                                                                                                                <tr>
                                                                                                                                    <th>Evaporador</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="evaporador" value="evaporadorB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="evaporador" value="evaporadorR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="evaporador" value="evaporadorM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="evaporador" value="evaporadorNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Abanico-->
                                                                                                                                <tr>
                                                                                                                                    <th>Abanico</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="abanico" value="abanicoB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="abanico" value="abanicoR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="abanico" value="abanicoM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="abanico" value="abanicoNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                        <hr>

                                                                                                                        <!--EXTRAS:-->
                                                                                                                        <table class="table table-bordered">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th><b>EXTRAS:</b></th>
                                                                                                                                    <th>B</th>
                                                                                                                                    <th>R</th>
                                                                                                                                    <th>M</th>
                                                                                                                                    <th>NO TIENE</th>
                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody>
                                                                                                                                <!--Pescantes-->
                                                                                                                                <tr>
                                                                                                                                    <th>Pescantes</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pescantes" value="pescantesB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pescantes" value="pescantesR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pescantes" value="pescantesM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pescantes" value="pescantesNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Mata Burro-->
                                                                                                                                <tr>
                                                                                                                                    <th>Mata Burro</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="mataBurro" value="mataBurroB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="mataBurro" value="mataBurroR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="mataBurro" value="mataBurroM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="mataBurro" value="mataBurroNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Halógenos-->
                                                                                                                                <tr>
                                                                                                                                    <th>Halógenos</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="halogeno" value="halogenoB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="halogeno" value="halogenoR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="halogeno" value="halogenoM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="halogeno" value="halogenoNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Rines sencillos-->
                                                                                                                                <tr>
                                                                                                                                    <th>Rines sencillos</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesSencillos" value="rinesSencillosB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesSencillos" value="rinesSencillosR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesSencillos" value="rinesSencillosM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesSencillos" value="rinesSencillosNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Rines de lujos-->
                                                                                                                                <tr>
                                                                                                                                    <th>Rines de lujos</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesLujo" value="rinesLujoB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesLujo" value="rinesLujoR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesLujo" value="rinesLujoM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="rinesLujo" value="rinesLujoNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>



                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div><!-- Fin: grupo__nombre -->
                                                                                                    </div>

                                                                                                    <div class="col-sm-6">
                                                                                                        <div class="formulario__grupo" id="grupo__nombre">

                                                                                                            <!-- select tipo de equipo -->
                                                                                                            <div class="form-group">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-12">
                                                                                                                        <!--TABLA-->
                                                                                                                        <table class="table table-bordered">
                                                                                                                            <thead>
                                                                                                                                <tr>
                                                                                                                                    <th><b>SISTEMA ELECTRICO:</b></th>
                                                                                                                                    <th>B</th>
                                                                                                                                    <th>R</th>
                                                                                                                                    <th>M</th>
                                                                                                                                    <th>NO TIENE</th>
                                                                                                                                </tr>
                                                                                                                            </thead>
                                                                                                                            <tbody>
                                                                                                                                <!--Luz de Techo-->
                                                                                                                                <tr>
                                                                                                                                    <th>Luz de Techo</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzTecho" value="luzTechoB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzTecho" value="luzTechoR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzTecho" value="luzTechoM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzTecho" value="luzTechoNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Luz de Panel-->
                                                                                                                                <tr>
                                                                                                                                    <th>Luz de Panel</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPanel" value="luzPanelB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPanel" value="luzPanelR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPanel" value="luzPanelM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPanel" value="luzPanelNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Faros-->
                                                                                                                                <tr>
                                                                                                                                    <th>Faros</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="faros" value="farosB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="faros" value="farosR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="faros" value="farosM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="faros" value="farosNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Pidevías Del.-->
                                                                                                                                <tr>
                                                                                                                                    <th>Pidevías Del.</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaDel" value="pideviaDel" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaDel" value="pideviaDel" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaDel" value="pideviaDel" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaDel" value="pideviaDel" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Laterales Del.-->
                                                                                                                                <tr>
                                                                                                                                    <th>Laterales Del.</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesDel" value="lateralesDelB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesDel" value="lateralesDelR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesDel" value="lateralesDelM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesDel" value="lateralesDelNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Luz de Stop-->
                                                                                                                                <tr>
                                                                                                                                    <th>Luz de Stop</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzStop" value="luzStopB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzStop" value="luzStopR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzStop" value="luzStopM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzStop" value="luzStopNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Luz de Retroceso-->
                                                                                                                                <tr>
                                                                                                                                    <th>Luz de Retroceso</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzRetro" value="luzRetroB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzRetro" value="luzRetroR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzRetro" value="luzRetroM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzRetro" value="luzRetroNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Laterales Tras.-->
                                                                                                                                <tr>
                                                                                                                                    <th>Laterales Tras.</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesTras" value="lateralesTrasB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesTras" value="lateralesTrasR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesTras" value="lateralesTrasM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="lateralesTras" value="lateralesTrasNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Pidevías Tras.-->
                                                                                                                                <tr>
                                                                                                                                    <th>Pidevías Tras.</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaTras" value="pideviaTrasB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaTras" value="pideviaTrasR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaTras" value="pideviaTrasM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="pideviaTras" value="pideviaTrasNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Estado Fis. Stop-->
                                                                                                                                <tr>
                                                                                                                                    <th>Estado Fis. Stop</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisStop" value="estadoFisStopB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisStop" value="estadoFisStopR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisStop" value="estadoFisStopM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisStop" value="estadoFisStopNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Estado Fis. P/Vías-->
                                                                                                                                <tr>
                                                                                                                                    <th>Estado Fis. P/Vías</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisPVia" value="estadoFisPViaB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisPVia" value="estadoFisPViaR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisPVia" value="estadoFisPViaM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="estadoFisPVia" value="estadoFisPViaNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Luz de Placa-->
                                                                                                                                <tr>
                                                                                                                                    <th>Luz de Placa</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPlaca" value="luzPlacaB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPlaca" value="luzPlacaR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPlaca" value="luzPlacaM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzPlaca" value="luzPlacaNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                                <!--Luz de Parqueo-->
                                                                                                                                <tr>
                                                                                                                                    <th>Luz de Parqueo</th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzParqueo" value="luzParqueoB" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzParqueo" value="luzParqueoR" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzParqueo" value="luzParqueoM" />
                                                                                                                                    </th>
                                                                                                                                    <th>
                                                                                                                                        <input type="radio" name="luzParqueo" value="luzParqueoNotiene" />
                                                                                                                                    </th>
                                                                                                                                </tr>

                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div><!-- Fin: grupo__nombre -->
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div><!-- Fin: grupo__nombre -->
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div><!-- Fin Info: Ficha tecnica -->


                                                                <!--INFO: CALCULO DE REEMPLAZO-->
                                                                <div class="tab-pane" id="nav-border-top-profile" role="tabpanel">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1 ms-2">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">

                                                                                    <!--TABLA-->
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                            <tr class="col-md-12">
                                                                                                <th class="" style="background-color:#72C1F2"><b>DATOS DE
                                                                                                        PARTIDA DEL VEHÍCULO</b></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <!--Valor de reemplazamiento-->
                                                                                            <tr>
                                                                                                <th>Vr:Valor de reemplazamiento o valor a nuevo(U$):
                                                                                                    :</th>
                                                                                                <th>
                                                                                                    <input class="text-center" type="text" id="vaRemplazo" name="vaRemplazo" />
                                                                                                </th>

                                                                                            </tr>

                                                                                            <!--Año de fabricación-->
                                                                                            <tr>
                                                                                                <th>Af:Año de fabricación o compra:</th>
                                                                                                <th>
                                                                                                    <input class="text-center" type="number" name="anoFabricacion" />
                                                                                                </th>

                                                                                                </th>
                                                                                            </tr>

                                                                                            <!--Año actual-->
                                                                                            <tr>
                                                                                                <th>Ac:Año actual:</th>
                                                                                                <th>
                                                                                                    <input class="text-center" type="number" name="anoActual" />

                                                                                                </th>
                                                                                            </tr>

                                                                                            <!--Antigüedad ajustada-->
                                                                                            <tr>
                                                                                                <th>Acir:Antigüedad ajustada, segùn circulación:</th>
                                                                                                <th>
                                                                                                    <input class="text-center" type="number" name="antigAjustada" />
                                                                                                </th>
                                                                                            </tr>

                                                                                            <!--Vida útil estimada-->
                                                                                            <tr>
                                                                                                <th>Vu:Vida útil estimada en años:</th>
                                                                                                <th>
                                                                                                    <input class="text-center" type="number" name="vidaUtil" />
                                                                                                </th>
                                                                                            </tr>

                                                                                        </tbody>
                                                                                    </table>
                                                                                    <hr>
                                                                                    <hr>

                                                                                    <!--ESCALA DEL ESTADO FISICO-->
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th colspan="2" style="background-color:#72C1F2;">
                                                                                                    <p style="margin-top:10px;">ESCALA DEL ESTADO FÍSICO</p>
                                                                                                </th>
                                                                                                <th scope="col">COMPONENTES DEL VEHICULO</th>
                                                                                                <th scope="col">COEFICIENTE %</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td scope="row" width="20%">
                                                                                                    <input class="align-middle" type="radio" name="estado" value="estadoFisExcelente" /><b>EXCELENTE</b>
                                                                                                </td>
                                                                                                <td>0.76 a 1.00</td>
                                                                                                <td width="25%"><b>Motor:</b></td>
                                                                                                <td class=""><input type="text" name="coeficienteMotor"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td scope="row"><b><input class="align-middle" type="radio" name="estado" value="estadoFisBueno" />BUENO</b></td>
                                                                                                <td>0.61 a 0.89</td>
                                                                                                <td><b>Carroceria interior:</b></td>
                                                                                                <td class=""><input type="text" name="coeficienteCarroceriaInterior"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td scope="row"><b><input class="align-middle" type="radio" name="estado" value="estadoFisRegular" />REGULAR</b></td>
                                                                                                <td>0.36 a 0.60</td>
                                                                                                <td><b>Carroceria exterior:</b></td>
                                                                                                <td class=""><input type="text" name="coeficenteCarroceriaExterior"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td scope="row"><b><input class="align-middle" type="radio" name="estado" value="estadoFisMalo" />MALO</b></td>
                                                                                                <td>0.00 a 0.35</td>
                                                                                                <td><b>Sistema eléctrico:</b></td>
                                                                                                <td class=""><input type="text" name="sistemaElectrico"></td>
                                                                                            </tr>

                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr>
                                                                                                <td colspan="3"><strong>ESTADO FÍSICO DEL VEHICULO ( Ef ) :
                                                                                                    </strong></td>
                                                                                                <td><input type="text" name="estadoFisVehiculo"></td>
                                                                                            </tr>
                                                                                            <tr>

                                                                                            </tr>

                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <hr>
                                                                                    <hr>

                                                                                    <!---CALCULAR COEFICIENTE--->
                                                                                    <table class="table table-bordered table-sm">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <!--<th colspan="2" style="background-color:#72C1F2;">
                                  <p style="margin-top:10px;">ESCALA DEL ESTADO FÍSICO</p> </th>-->
                                                                                                <th scope="col" colspan="2" style="background-color:#72C1F2;">
                                                                                                    VEHICULO</th>
                                                                                                <th scope="col">COEF.DEPREC.TECNOLOGICO</th>
                                                                                                <th scope="col">COEF. DESECHO O SALVAMENTO</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>EQUIPO</b></td>
                                                                                                <td class="" width="25%"><input type="text" name="equipCoefTecnolo"></td>
                                                                                                <td><input type="text" name="equipCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>MARCA</b></td>
                                                                                                <td class=""><input type="text" name="marcaCoefTecnolo"></td>
                                                                                                <td><input type="text" name="marcaCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>MODELO</b></td>
                                                                                                <td class=""><input type="text" name="modeloCoefTecnolo"></td>
                                                                                                <td><input type="text" name="modeloCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>AÑO</b></td>
                                                                                                <td class=""><input type="text" name="anoCoefTecnolo"></td>
                                                                                                <td><input type="text" name="anoCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>TIPO</b></td>
                                                                                                <td class=""><input type="text" name="tipoCoefTecnolo"></td>
                                                                                                <td><input type="text" name="marcaCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>TRASMISIÓN</b></td>
                                                                                                <td class=""><input type="text" name="trasmisionCoefTecnolo"></td>
                                                                                                <td><input type="text" name="marcaCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>RODAMIENTO</b></td>
                                                                                                <td class=""><input type="text" name="rodamientoCoefTecnolo"></td>
                                                                                                <td><input type="text" name="rodamientoCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2"><b>ESTADO</b></td>
                                                                                                <td class=""><input type="text" name="estadoCoefTecnolo"></td>
                                                                                                <td><input type="text" name="estadoCoefSalvamento"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2" style="background-color:#D5E5F2;"><b>COEFICIENTE
                                                                                                        RESULTANTE</b></td>
                                                                                                <td class=""><input type="text" name="coef-ResultTecnolo"></td>
                                                                                                <td><input type="text" name="coefResultSalvamento"></td>
                                                                                            </tr>
                                                                                        </tbody>


                                                                                    </table>

                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="nav-border-top-messages" role="tabpanel">
                                                                    <div class="d-flex">
                                                                        <div class="flex-shrink-0">
                                                                            <i class="ri-checkbox-circle-line text-success"></i>
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-2">
                                                                            Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                                                            <div class="mt-2">
                                                                                <a href="javascript:void(0);" class="btn btn-link">Read More <i class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div><!-- end card-body -->
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <div class="modal-footer">
                                                    <button id="btnGuardar" type="submit" class="btn btn-primary"><span id="btnText">Guardar</span></button>
                                                    <button type="button" class="btn btn-default" id="reset" class="btn btn-link" onclick="reset();">Reset</button>
                                                    <input type="button" value="Reset data" onClick="fun()" />
                                                </div>

                            </form>


                            <!--end col-->
                        </div>


                        <div class="card-body">
                            <!-- Tabla de Tipo de usuario -->
                            <table id="table-avaluos" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <?php MainFooter($data); ?>
    </div>

    </div>

    <!-- JAVASCRIPT -->
    <?php MainJs($data); ?>
</body>

</html>