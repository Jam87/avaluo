let tableVehiculo;

document.addEventListener('DOMContentLoaded', function(){

	tableVehiculo = $('#table-vehiculos').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
          "url": " " + base_url + "/Vehiculos/getVehiculo",
            "dataSrc":""
        },
        "columns":[
          {"width": "5%", "data": "marca" },
          {"width": "5%", "data": "nombre" },
          {"width": "5%", "data": "trasmision" },
          {"width": "5%", "data": "tipo" },
          {"width": "5%", "data": "noPlaca" },
          {"width": "5%", "data": "rodamiento" },
          {"width": "5%", "data": "ano" },
          {"width": "5%", "data": "estado" },
          {"width": "5%", "data": "options" }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

////////////////////////////////////////////////
//////// CARGAR SELECT TIPO DE VEHICULO ////////
////////////////////////////////////////////////

function cargarTipoVehiculo (){
    let formVehiculo = document.querySelector("#formVeh"); //Todo el formulario
    let tipoVeh = document.querySelector("#tveh"); //Select tipo vehiculo

    let request =  new XMLHttpRequest();
        let ajaxUrl =  base_url+'/Vehiculos/obtenerTipoVehiculo'; 
        let formData = new FormData(formVehiculo);
      
        request.open("POST",ajaxUrl,true);
        //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(formData);
        //console.log(request)
    
        request.onload = function (){
            if(request.status == 200){
                
              let objData = JSON.parse(this.response);
              console.log(objData)
    
               let template = '<option class="form-control" selected disabled>- Select -</option>'
                
              
               objData.forEach(tipo => {
                    template += `<option class="form-control" value="${tipo.id}">${tipo.descripcion}</option>`;
                })
    
               tipoVeh.innerHTML = template;

               
               //$('#lista1').change(function(){
                $('#tveh').change(function(){
                     let id = this.id;
                     let idTipoVehiculo = $("#"+id).val();
                     listar_marcas(idTipoVehiculo);
                });
                  
             }
         
        }
}


 //////////////////////////////
 //////// COMBOX MARCA ////////
 /////////////////////////////

 function listar_marcas(idTipoVehiculo){

        let comboxMarca = document.querySelector("#marca"); //Select Marca
  
        let request =  new XMLHttpRequest();
        let ajaxUrl = base_url+'/Vehiculos/obtenerMarcaV';
        let strData = "marcaId="+idTipoVehiculo;
    
        request.open("POST",ajaxUrl,true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(strData); //Envio el Id
    
        request.onload = function (){
            
            if(request.status == 200){
              let objData = JSON.parse(this.response);
    
              let template = '<option class="form-control" selected disabled>-Select-</option>'
                //let template = '';
                objData.forEach(tipo => {
                        template += `<option class="form-control" value="${tipo.idMarca}">${tipo.marca}</option>`;
                })        
                
                comboxMarca.innerHTML = template;

                $('#marca').change(function(){
                    let id = this.id; //marca
                  
                    let idMarca = $("#"+id).val();//id(value)
                    listar_modelos(idMarca);
               });
              
            }   
   
        }    
 }

 ////////////////////////////////
 //////// COMBOX MODELO ////////
 //////////////////////////////

 function listar_modelos(idMarca){
    
  let comboxModel = document.querySelector("#modelo"); //Select Marca  
  
  let request =  new XMLHttpRequest();
  let ajaxUrl = base_url+'/Vehiculos/obtenerModelo';
  let strData = "modeloId="+idMarca;
  console.log(strData)

  
  request.open("POST",ajaxUrl,true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(strData); //Envio el Id
  
  request.onload = function (){
          
    if(request.status == 200){
        let objData = JSON.parse(this.response);  
        console.log(objData)   

        let template = '<option class="form-control" selected disabled>-- Seleccione --</option>'
          //let template = '';
          objData.forEach(tipo => {          
                  template += `<option class="form-control" value="${tipo.idmodelo}">${tipo.nombre}</option>`;
          })        
          
          comboxModel.innerHTML = template;      
      } 
   }
 }  

//Llamo a la funcion
cargarTipoVehiculo();


 /////////////////////////////////////////////////
 //////// GUARDAR LOS DATOS VEHICULO ////////
 ////////////////////////////////////////////////

    let formVehiculo = document.querySelector("#formVeh"); //Capturo todo el formulario
   
    //let modelo = document.querySelector("#model"); //Select modelo    
    
    formVehiculo.onsubmit = function(e) {
        e.preventDefault();
        
        //Recojo los datos         

        //Ajax
        let request = new XMLHttpRequest();
        let ajaxUrl = base_url + "/Vehiculos/setVehiculo";
        let formDta = new FormData(formVehiculo);
        request.open("POST", ajaxUrl,true)
        request.send(formDta);
        request.onload = function (){
          
            if(request.status == 200){
              var objData = JSON.parse(request.responseText);
                         
                  if(objData.status)
                  {
                    $('#modalVehiculo').modal('hide');
                    $('#table-vehiculos').DataTable().ajax.reload();
                    
                  
                    Swal.fire({
                      position: 'top-end',
                      toast:'true',
                      icon: 'success',
                      title: 'Correcto!',
                      text: objData.msg,
                      icon: 'success',
                      confirmButtonText: 'Aceptar',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar:true
                  });
                    
                  }else{
                      swal("Error", objData.msg , "error");
                  }
            }        
          } 
    }

});



//*** HACER QUE EL DATATABLE FUNCIONES ***//
$('#table-vehiculos').DataTable();


//*** MANDAR A LLAMAR AL MODAL: Agregar una nueva marca ***//
function openModal(){    
  
  document.querySelector("#idVeh").value = "";
  document
    .querySelector(".modal-header")
    .classList.replace("bg-pattern-2", "bg-pattern");
  document.querySelector("#titleModal").innerHTML = "Nuevo Vehiculo";
  document
    .querySelector(".modal-header")
    .classList.replace("headerRegister", "bg-pattern-2", "headerEdit");
  document
    .querySelector("#btnActionForm")
    .classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Guardar";
  document.querySelector("#formVeh").reset();


	$('#modalVehiculo').modal('show'); 
}


