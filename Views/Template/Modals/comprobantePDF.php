<?php
$avaluo = $data['avaluo'];
$cliente = $data['cliente'];
$vehiculo = $data['vehiculo'];
?>
<style>
    /*#encabezado {padding:10px 0; border-top: 1px solid; border-bottom: 1px solid; width:100%;}
#encabezado .fila #col_1 {width: 15%}
#encabezado .fila #col_2 {text-align:center; width: 55%}
#encabezado .fila #col_3 {width: 15%}
#encabezado .fila #col_4 {width: 15%}
 
#encabezado .fila td img {width:50%}
#encabezado .fila #col_2 #span1{font-size: 15px;}
#encabezado .fila #col_2 #span2{font-size: 12px; color: #4d9;}
 
#footer {padding-top:5px 0; border-top: 1px solid; width:100%;}
#footer .fila td {text-align:center; width:100%;}
#footer .fila td span {font-size: 10px; color: #f5a;}*/

    * {
        box-sizing: border-box;
        margin: 0px;
        padding: 0px;
    }

    ul,
    li {
        margin: 0px;
        padding: 0px;
    }

    /* Estilos generales */

    html {
        font-family: Helvetica, Arial, sans-serif;
    }



    .sinBorde td {
        border: 0;
        margin: 0;
        padding-top: 6px
    }


    /* Estilos para las listas de descripciones */

    p {
        font-family: arial;
        letter-spacing: 1px;
        color: #7f7f7f;
    }

    .sp1 {
        margin-top: 40px;
        margin-bottom: 10px;
    }

    .sp10 {
        margin-top: 100px;
    }

    .sp2 {

        margin-top: 20px;
        margin-bottom: 20px;
    }

    .sp3 {

        margin-top: 20px;
    }

    hr {
        border: 0;
        border-top: 1px solid #CCC;
    }

    h1 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #000;
    }

    h2 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #000;
    }

    h3 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #000;
    }

    h4 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: lighter;
        /*color: #000;*/
    }

    .center {
        text-align: center;
    }

    .w20 {
        width: 400px;
        margin: 0 auto;
        text-align: center;
    }

    span {
        font-weight: bold;
    }

    .box {
        /*border: 1px solid darkblue;*/
        width: 720px;
        margin-left: 10px;
        margin-right: 30px;
        line-height: 1.5;
    }

    #contenedorPadre {
        position: relative;
    }

    img {

        margin: auto;
        width: 100%;
    }

    .img-p {
        width: 80px;
        margin-bottom: 50px;
    }

    .border {
        border-bottom: 1px solid #7f7f7f;
    }


    @media all {
        div.saltopagina {
            display: none;
        }
    }

    @media print {
        div.saltopagina {
            display: block;
            page-break-before: always;
        }
    }

    .contenedorPad {
        position: relative;
        width: 500px;
        left: -2px;
        margin-left: 120px;
    }
</style>

<div class="contenedorPad">

    <img src="http://localhost/sistema1/Assets/images/img12.jpg" alt="centered image">
</div>



<p class="center">

<h1 class="sp1">INFORME</h1><br>

<h3 class="sp2">VALORACIÓN A VEHÍCULO <?= strtoupper($vehiculo['tipoVehiculo']) ?> AUTOMÓVIL <br><?= strtoupper($vehiculo['marca']) ?> <?= strtoupper($vehiculo['modelo']) ?>, SEDAN.</h3> <br>

<h3>CLIENTE: <?= strtoupper($cliente['nombreNatural']) ?></h3><br>

<h4 class="sp3">INSPECCIÓN REALIZADA: EN EL ESTACIONAMIENTOS DE MEDCO, <br>
    RESIDENCIAL BOLONIA. MANAGUA.</h4>
</p>


<div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


</div>

<style type="text/css">
    <!--
    table.page_header {
        width: 100%;
        border: none;
        background-color: #DDDDFF;
        border-bottom: solid 1mm #AAAADD;
        padding: 2mm;
    }

    table.page_footer {
        width: 100%;
        border: none;
        background-color: #86CDF2;
    }

    h1 {
        color: #000033
    }

    h2 {
        color: #000055
    }

    h3 {
        color: #000077
    }

    div.standard {
        padding-left: 5mm;
    }
    -->
</style>
<page backtop="14mm" backbottom="14mm" style="font-size: 12pt">
    <page_header>
        <table class="page_header">
            <tr>
            <tr>
                <td style="text-align: center">Cave-sa<!--<img src="http://localhost/sistema1/Assets/images/logo.jpg" class="img-p" alt="centered image">--></td>
                <td>CONSULTORES EN AVALUOS ESPECIALIZADOS</td>
            </tr>

            </tr>
        </table>
    </page_header>

    <!--FOOTER-->
    <page_footer>
        <table class="page_footer">

            <tr class="sinBorde td">
                <td style="width: 100%; text-align: center;"><b><?= DIRECCION ?></b> </td>
            </tr>
            <tr class="sinBorde td">
                <td style="width: 100%; text-align: center"> <b>Telefax:</b> <?= TELEMPRESA ?>, <b>Cel:</b> (<span>M</span>) <?= CELULARMOV ?> (<span>C</span>) <?= CELULARCLARO ?> </td>
            </tr>
            <tr class="sinBorde td">
                <td style="width: 100%; text-align: center"><b>Correo:</b> <?= EMAIL_EMPRESA ?> <b>Web Site:</b> <?= WEB_EMPRESA ?> </td>
            </tr>

            <tr>
                <td style="width: 100%; text-align: right; border:0; padding-bottom:6px">
                    <span>page [[page_cu]]/[[page_nb]] </span>
                </td>
            </tr>
        </table>
    </page_footer>
    <!--FIN FOOTER-->

</page>


<div class="box">
    <p style="font-weight:bold; color:black; text-align: right; font-size: 14px; margin-top:15px">
        Managua, 03 de octubre del 2022
    </p>
    <p style="font-size:14px; font-weight:bold; color:black; margin-top:70px">
        Lic. Gema Maria Gonzales Rodriguez.<br>
        Técnico en Recuperaciones<br>
        Banco de la Producción.<br>
        Sucursal Montoya.
    </p>
    <p style="font-size:14px; font-weight:bold; color:black; margin-bottom:30px">
        Su despacho.
    </p>
    <p style="font-size:14px; font-weight:400; color:black; margin-bottom:10px; text-align:justify">
        Tengo el agrado de presentar informe de valoración realizado a vehículo <?= strtoupper($vehiculo['tipoVehiculo']) ?>, automóvil marca: <?= strtoupper($vehiculo['marca']) ?>, modelo: <?= strtoupper($vehiculo['modelo']) ?>, tipo: sedán, color: rojo, año: 2019, ubicado en el estacionamiento de MEDCO, residencial Bolonia. Managua. El cual se acompaña con el N° de Expediente: 3787-09-2022.
    </p>
    <p style="font-size:14px; font-weight:400; color:black">
        Luego de un estudio detallado del bien y basado en nuestro criterio de valoración. Obtuvimos como resultado:
    </p>
</div>


<page pageset="old">
    <bookmark title="Chapter 2" level="0"></bookmark>
    <h1>1. INTRODUCCIÓN</h1>

    <div class="box">

        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            La presente valoración, fue realizada 28/09/2022 al vehículo liviano, marca Hyundai, modelo Grand I-10, color rojo, año 2019, propiedad de la Sra. Marbeli Elieth Morales Zamora.
        </p>

        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            Disclaimer: La información y determinación de los valores presentados en este informe de avalúo, se amparan en la fecha de inspección del vehículo, de la persona que atendió al momento de inspección
            y de las condiciones del estado físico del bien, de forma que, cualquier hecho u omisión de las condiciones físicas y/o naturales del entorno del bien, son de exclusiva responsabilidad del cliente y/o dueño del bien.
        </p>

        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            El resultado de este informe, descansa sobre la realización de inspección visual y del estado físico del bien, se ha utilizado la documentación e información que ha sido suministrada por el cliente, el cual se presupone libre de cargas,
            gravámenes o cualquier otro tipo de vicios ocultos que puedan recaer sobre el bien a la fecha de su emisión, además en cumplimiento de los enfoques, criterios generales y requerimientos mínimos de contenido establecidos en las Guías Metodológicas
            contenidas en los Anexos Nº 5, 6 y 7, los cuales son parte integral de la presente Norma <br><span style="color:#2e74b5">(Resolución N° CD-SIBOIF 868-1-DIC10-2014).</span>
        </p>
        <h3>2.OBJETIVOS</h3>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">Describir de manera detallada el vehículo inspeccionado.</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Obtener el valor de Reemplazamiento o valor a nuevo del vehículo.</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Determinar el Valor Actual, aplicando Metodología Internacionalmente aceptada</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Determinar el Valor de Mercado, a través de tabla econométrica de comparación.</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Ajustar Valores de acuerdo al estado de conservación del vehículo.</li>
        </ul>

        <h3>3.METODOLOGÍA</h3>
        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify;">
            La valoración se realizará por el <span>método del Valor Actual y método de Comparación de Mercado.</span>
        </p>
        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify;">
            Los métodos de valuación a desarrollar comprenden una descripción de los elementos que benefician
            o perjudican al bien objeto de valoración, al día que se realiza la visita de campo e inspección in situ.
        </p>
        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify;">
            Para el cálculo del Valor Actual del Automóvil, se han contemplado los siguientes parámetros técnicos:
        </p>
        <p style=" display: inline-block; margin-left:40px; color:black">
            1. Valor de Adquisición del Vehículo (incluye transporte, impuestos, fletes e instalación)
        </p><br>
        <p style=" display: inline-block; margin-left:40px; color:black">
            2. Antigüedad y Vida Útil estimada del Vehículo.
        </p><br>
        <p style=" display: inline-block; margin-left:40px; color:black">
            3. Amortización Técnica Anual Producida.
        </p><br>
        <p style=" display: inline-block; margin-left:40px; color:black">
            4. Depreciación Tecnológica por obsolescencia.
        </p><br>
        <p style="display: inline-block; margin-left:40px; color:black">
            5. Valor de Desecho o Rescate de acuerdo a características Técnicas.
        </p><br>
        <p style="display: inline-block; margin-left:40px; color:black">
            6. Se considera el Ajuste Correspondiente al estado del Vehículo.
        </p><br>



    </div>
</page>
<!--Salto-de-pagina-->

<!--Comienza-pagina-nueva-->
<page pageset="old">
    <bookmark title="Chapter 2" level="0"></bookmark>
    <h1>4.CONCEPTOS</h1>

    <div class="box">
        <br>
        <p style=" display: inline-block; margin-left:40px; color:black">
            7. Cotizaciones de Vehículos Usados y Nuevos, con Similares características al bien que se valora.
        </p>
        <br>

        <h4 style="font-weight:400; font-size:13px"><b>4.1.Valor de mercado</b></h4>

        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            Es el precio al que podría venderse el bien mueble, mediante contrato privado entre un vendedor voluntario y un comprador independiente, en la fecha supuesta de que el bien se hubiere ofrecido públicamente en el mercado, que las condiciones del mercado permitieren disponer del mismo de manera ordenada y que se dispusiere de un plazo normal, habida cuenta de la naturaleza del bien mueble, para negociar la venta, considerándose:
        </p>

        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                Que entre vendedor y comprador no exista vinculación previa alguna, y que ninguno de los dos tiene Un interés personal o profesional en la transacción ajena a la causa del contrato.</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                Que la oferta pública al mercado conlleva tanto la realización de una comercialización adecuada al tipo de bien de que se trate, como la ausencia de información privilegiada en cualquiera de las Partes involucradas..</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                Que el precio del bien es consecuente con la oferta pública citada y que refleja en una estimación razonable el precio más probable que se obtendría en las condiciones del mercado existentes en la fecha de la tasación.</li>
        </ul>

        <h4 style="font-weight:400; font-size:13px"><b>4.2.Valor Mínimo de Realización</b></h4>
        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            Es el valor más probable de venta rápida del bien.
        </p>

        <h4 style="font-weight:400; font-size:13px"><b>4.4.Valor Actual</b></h4>
        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            Corresponde al valor calculado, ya aplicando las depreciaciones correspondientes.
        </p>

        <h4 style="font-weight:400; font-size:13px"><b>4.5.Amortización Técnica</b></h4>
        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            La amortización productiva o técnica es la imputación o asignación de la depreciación de los elementos de activo fijo (a excepción de los terrenos) al coste de la producción. Se materializa en la acumulación de un fondo, ejercicio tras ejercicio, de forma que cuando sea necesario sustituir un bien productivo (maquinaria, elemento de transporte, etc.) la empresa disponga de recursos suficientes para hacerlo.
        </p>

        <h4 style="font-weight:400; font-size:13px"><b>4.6.Depreciación Tecnológica</b></h4>
        <p style="font-size:14px; font-weight:400; color:black; margin:10px 0; text-align:justify">
            Corresponde a la Pérdida de valor de las máquinas, equipos y vehículos en general, como consecuencia del progreso tecnológico, las variaciones de la demanda o la alteración del precio de coste relativo de los factores productivos: trabajo y capital. Máquinas completamente nuevas, apenas habiendo comenzado a funcionar, quedan anticuadas al no poder competir con otras máquinas más perfeccionadas; un equipo industrial puede no ser ya el más idóneo para un nivel de demanda superior o inferior al inicialmente previsto; en una coyuntura económica de mano de obra cara y dinero barato, a la empresa le interesa utilizar procesos productivos intensivos en capital, y viceversa, cuando las condiciones económicas son las contrarias.
        </p>

        <h4 style="font-weight:400; font-size:13px"><b>4.7.Valor de Desecho</b></h4><br>
        <p style="font-size:14px; font-weight:400; color:black; text-align:justify">
            O Valor de Salvamento, es el valor estimado de intercambio o de mercado al final de la vida útil del activo. El valor de salvamento, VS, expresado como una cantidad en dólares estimada o como un porcentaje del costo inicial, puede ser positivo, cero, o negativo debido a los costos de desmantelamiento y de remoción.
        </p><br>





    </div>
</page>

<!--Comienza-pagina-nueva-->
<page pageset="old">

    <div class="box">
        <h3>5.INFORMACIÓN GENERAL</h3><br>

        <h4 style="font-weight:400; font-size:13px"><b>5.1.Solicitante del avalúo</b></h4>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">Entidad solicitante: Banco de la Producción (BANPRO).</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Dirección de la entidad solicitante: Sucursal Montoya, Km 3 ½ carretera Sur.</li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Ejecutivo solicitante: Lic. Gema Maria Gonzales Rodriguez.</li>
            <li>Teléfono de la entidad solicitante: (+505) 2255-9595.</li>
        </ul>

        <h4 style="font-weight:400; font-size:13px"><b>5.2.Valuador</b></h4>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">Persona jurídica: Consultores en Avalúos Especializados (C.A.V.E, S.A.).
                Registro de la Persona Jurídica REPEV: NIPEV: 175.
                RUC: J0310000208298
            </li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Perito valuador: Ing. Armando J. Gómez Saballos.
                Registro de la persona natural REPEV: NIPEV: 111.
                Cédula de Identidad: 569-050880-0000Y
            </li>
            <li style=" display: inline-block; padding:0 0 3px 7px">Ejecutiva de Operaciones: Lic. Angie Vanessa C. Gómez.
                Cédula de Identidad: 007-130502-1000J
            </li>
        </ul>
        <h4 style="font-weight:400; font-size:13px"><b>5.3.Fecha del avalúo</b></h4>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                Fecha de inspección: 28 de septiembre del año 2022.
            </li>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                Persona que mostró el bien: Marbeli Elieth Morales Zamora.
            </li>
        </ul>

        <h4 style="font-weight:400; font-size:13px"><b> 5.4.Maquinaria y Equipo que se valúa</b></h4>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                El bien corresponde a un Automóvil tipo Sedan.
            </li>
        </ul>

        <h4 style="font-weight:400; font-size:13px"><b>5.5.Propietario del bien</b></h4>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                Marbeli Elieth Morales Zamora.
            </li>
        </ul>

        <h4 style="font-weight:400; font-size:13px"><b>5.6.Objeto del avalúo</b></h4>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                La presente valuación tiene como objetivo determinar los valores mediante el análisis de enfoques de costo y análisis de comparación de mercado, para determinar los siguientes valores:
            </li>
        </ul>
        <p style=" display: inline-block; margin-left:40px; color:black">
            - Valor de Comparación de Mercado.
        </p><br>
        <p style=" display: inline-block; margin-left:40px; color:black">
            - Valor de Realización.
        </p><br>
        <p style=" display: inline-block; margin-left:40px; color:black">
            - Valor de Reemplazamiento.
        </p><br>
        <p style=" display: inline-block; margin-left:40px; color:black">
            - Valor Actual.
        </p><br>


    </div>
</page>
<!--Fin-de-pagina-->



<!--Comienza-pagina-nueva-->
<page pageset="old">

    <div class="standard">
        <h4 style="font-weight:400; font-size:13px"><b>5.7. Propósito del avalúo</b></h4>
        <ul>
            <li style=" display: inline-block; padding:0 0 3px 7px">
                Reestructuración de crédito.
            </li>
        </ul>

        <h3>6.DESCRIPCIÓN GENERAL DEL VEHÍCULO.</h3><br>
        <p>6.1.DATOS DE LA TARJETA DE CIRCULACIÓN</p><br>

        <table border="1px">
            <thead bgcolor="red">
                <tr class="sinBorde border">
                    <td> Propietario del Vehículo: </td>
                    <td> Marbeli Elieth Morales Zamora. </td>
                </tr>
            </thead>

            <tbody bgcolor="yellow">
                <tr class="sinBorde td">
                    <td> N° de Circulación: </td>
                    <td> B 3669900 </td>
                </tr>

                <tr class="sinBorde td">
                    <td> Fecha de Emisión: </td>
                    <td> 23/03/2020 </td>
                </tr>

                <tr class="sinBorde td">
                    <td> Número de Placa: </td>
                    <td> M 323024 </td>
                </tr>
            </tbody>
            <tfoot bgcolor="blue">
                <tr class="sinBorde td">
                    <td> Marca:</td>
                    <td> Hyundai</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Modelo:</td>
                    <td> Grand I-10</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Tipo de Vehículo:</td>
                    <td> Sedan</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Año:</td>
                    <td> 2019</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Número de Motor:</td>
                    <td> G4LAJM859706.</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Número de Chasis:</td>
                    <td> MALA741CAKM315405..</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Color del Vehículo:</td>
                    <td> Rojo.</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Número de Cilindros:</td>
                    <td> 04</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Número de Pasajeros:</td>
                    <td> 05</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Tipo de Combustible:</td>
                    <td> Gasolina.</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Uso:</td>
                    <td> Particular.</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Servicio:</td>
                    <td> Privado.</td>
                </tr>
                <tr class="sinBorde td">
                    <td> Gravamen:</td>
                    <td> Banpro.</td>
                </tr>
            </tfoot>

        </table>


    </div>
</page>
<!--Fin-de-pagina-->

<!--Comienza-pagina-nueva-->
<page pageset="old">
    <bookmark title="Chapter 3" level="0"></bookmark>
    <h1>Chapter 3</h1>
    <div class="standard">
        Intro to Chapter 3
        <bookmark title="Chapter 3.1" level="1"></bookmark>
        <h2>Chapter 3.1</h2>
        <div class="standard">
            Contents of Chapter 3.1
        </div>
        <bookmark title="Chapter 3.2" level="1"></bookmark>
        <h2>Chapter 3.2</h2>
        <div class="standard">
            Intro to Chapter 3.2
            <bookmark title="Chapter 3.2.1" level="2"></bookmark>
            <h3>Chapter 3.2.1</h3>
            <div class="standard">
                Contents of Chapter 3.2.1
            </div>
            <bookmark title="Chapter 3.2.2" level="2"></bookmark>
            <h3>Chapter 3.2.2</h3>
            <div class="standard">
                Contents of Chapter 3.2.2
            </div>
        </div>
    </div>
</page>
<!--Fin-de-pagina-->