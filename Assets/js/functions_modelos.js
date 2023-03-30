let tableModelos;

document.addEventListener('DOMContentLoaded', function(){

  //*** MOSTRAR DATOS EN DATATABLE Y TRADUCCIÓN ***//
	tableModelos = $('#table-modelos').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
          "url": " " + base_url + "/Modelos/getModelos",
            "dataSrc":""
        },
        "columns":[
          {"data": "descripcion"},
          {"data": "marca"},
          {"data": "nombre"},
          {"data": "estado"},
          {"data": "options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

});


////////////////////////////////////////////////
//////// CARGAR SELECT TIPO DE VEHICULO ////////
////////////////////////////////////////////////

function cargarTipoVehiculo (){
  let tipoVeh = document.querySelector("#tveh"); //Selec tipo vehiculo
  let formModelo = document.querySelector("#formModelo");  
    
  let request =  new XMLHttpRequest();
  let ajaxUrl =  base_url+'/Modelos/obtenerTipoVehiculo'; 
  let formData = new FormData(formModelo);
      
  request.open("POST",ajaxUrl,true);
  //request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(formData);
  //console.log(request)
    
  request.onload = function (){
  if(request.status == 200){
               
     let objData = JSON.parse(this.response);
    
     let template = '<option class="form-control" selected disabled>-- Seleccione --</option>'           
              
     objData.forEach(tipo => {
         template += `<option class="form-control" value="${tipo.id}">${tipo.descripcion}</option>`;
     })
    
     tipoVeh.innerHTML = template;
      
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
 function listar_marcas(idTipoV){

        let comboxMarca = document.querySelector("#marca"); //Select Marca
       
        let request =  new XMLHttpRequest();
        let ajaxUrl = base_url+'/Modelos/obtenerMarcaV';
        let strData = "marcaId="+idTipoV;

        request.open("POST",ajaxUrl,true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(strData); //Envio el Id
    
        request.onload = function (){
            
            if(request.status == 200){
              let objData = JSON.parse(this.response);
          
              let template = '<option class="form-control" selected disabled>-- Seleccione --</option>'
               
                objData.forEach(marca => {
                        template += `<option class="form-control" value="${marca.idMarca}">${marca.marca}</option>`;
                })        
                
                comboxMarca.innerHTML = template;
              
            }   
   
        }    
    }

//Llamo a la funcion
cargarTipoVehiculo();

  //*** GUARDAR NUEVA MARCA ***//
  let formModelo = document.querySelector('#formModelo');
  
  formModelo.addEventListener('submit', function(e){
     e.preventDefault();

      let intIdModelo = document.querySelector('#idModelo').value; //Lo obtengo a la hora que voy a Editar
      let listTipoVeh = document.querySelector('#tveh').value;
      let listTipoMarca = document.querySelector('#marca').value;
      let nombre = document.querySelector('#modelo').value;
      let listStatus = document.querySelector('#lStatus').value;

      if(listTipoVeh == '' || listTipoMarca == '' || nombre == '' || listStatus == '' )
      {
        //Modal error Toast aviso parte superior
            Swal.fire({
              position: 'top-end',
              toast:'true',
              icon: 'warning',
              title: 'Error!',
              text: 'Los campos tipo de vehiculo, marca, modelo y estado no puede esta vacio',
              icon: 'warning',
              confirmButtonText: 'Aceptar',
              showConfirmButton: false,
              timer: 5000,
              timerProgressBar:true
            }); 
        
            return false;
      }
     
      let request = new XMLHttpRequest();
      let ajaxUrl = base_url + "/Modelos/setModelo";
      let formDta = new FormData(formModelo);
      request.open("POST", ajaxUrl,true)
      request.send(formDta);
 
     request.onload = function (){
          if(request.status == 200){
                  let objData = JSON.parse(request.responseText); 

                  if(objData.status)
                  {
                      $('#modalModelo').modal('hide');
                      $('#table-modelos').DataTable().ajax.reload();                  
                    
                      //Modal exito Toast aviso parte superior

                      Swal.fire({
                        position: 'top-end',
                        toast:'true',
                        icon: 'success',
                        title: 'Correcto!',
                        text: objData.msg,
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar:true
                  });
                    
                  }else{
                    //Modal error Toast aviso parte superior
                    
                      Swal.fire({
                        position: 'top-end',
                        toast:'true',
                        icon: 'warning',
                        title: 'Error!',
                        text: objData.msg,
                        icon: 'warning',
                        confirmButtonText: 'Aceptar',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar:true
                  });                    
                }
             }       
          }
    })

    //*** ELIMINAR MAODELO ***//
    function fntDelModelo(idModelo){

      Swal.fire({
        title: 'Eliminar Modelo',
        text: "¿Realmente quiere eliminar el modelo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          let request =  new XMLHttpRequest();
          let ajaxUrl = base_url+'/Modelos/delModelos';
          let strData = "idModelo="+idModelo;
          request.open("POST",ajaxUrl,true);
          request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          request.send(strData);
          request.onload = function (){
            
            if(request.status == 200){
              let objData = JSON.parse(request.responseText);
              
              //objData.status: Valido si es verdadero. 
              //Va a mostrar el mensaje 
              if(objData.status)
              {
                
                $('#table-modelos').DataTable().ajax.reload();
    
                Swal.fire({
                  position: 'top-end',
                  toast:'true',
                  icon: 'success',
                  title: 'Eliminar!',
                  text: objData.msg,
                  icon: 'success',
                  confirmButtonText: 'Aceptar',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar:true
              });
    
              }else{
                    swal("Atención!", objData.msg , "error");
              }
    
            }
    
             
          }      
          
        }
    
      })
    
    }


    //*** EDITAR TIPO DE USUARIO ***//  
    /**
     * 
     * 1.Cambio estilo del modal
     * 2.Traigo los datos
     * 3.Muestro los datos en el modal de acuerdo al ID
     */
    function fntEditModelo(idmodelo){
      
      document.querySelector('.modal-header').classList.replace("bg-pattern", "bg-pattern-2");
      document.querySelector('#titleModal').innerHTML = "Actualizar modelo";
      document.querySelector('.modal-header').classList.replace("headerRegister", "headerEdit", "bg-pattern-2");
      document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
      document.querySelector('#btnText').innerHTML="Actualizar";
      document.querySelector('#formModelo').reset();      
      
      var idmodelo = idmodelo;
      
      var request = request =  new XMLHttpRequest();
      var ajaxUrl = base_url+'/Modelos/EditModelo/'+idmodelo;
      request.open("GET",ajaxUrl,true);
      request.send();
    
     request.onload = function (){
    
          if(request.readyState == 4 && request.status == 200){
              var objData = JSON.parse(request.responseText);
    
              console.log(objData);
              if(objData.status)
              {
                  document.querySelector("#idModelo").value = objData.data.idmodelo;             
                  document.querySelector('#tipo').value = objData.data.tipoId; 
                  document.querySelector("#marca").value = objData.data.marcaId; 
                  document.querySelector("#modelo").value = objData.data.nombre; 
                  document.querySelector("#lStatus").value = objData.data.estado;
             

                   //Renderiza los options: Tipo usuario y Estado
                   // $("#tveh").selectpicker("render");
                    //$("#lStatus").selectpicker("render");
                                 
                  //Pongo por defaul el activo que es
                  if(objData.data.estado == 1)
                  {
                      var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                  }else{
                      var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                  }
                  var htmlSelect = `${optionSelect}
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                  `;
                  document.querySelector("#lStatus").innerHTML = htmlSelect;
              }
          }
      
          //$('#modalEmpleado').modal('show');
          
        }
        $('#modalModelo').modal('show');//Mostrar modal Editar
    }

  

  //*** HACER QUE EL DATATABLE FUNCIONES ***//
  $('#table-modelos').DataTable();


  //*** MANDAR A LLAMAR AL MODAL: Agregar un nuevo modelo ***//
  function openModal(){    
    
    document.querySelector('#idModelo').value = "";
    document.querySelector('.modal-header').classList.replace("bg-pattern-2", "bg-pattern");
    document.querySelector('#titleModal').innerHTML = "Nuevo modelo";
    document.querySelector('.modal-header').classList.replace("headerRegister", "bg-pattern-2", "headerEdit");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML="Guardar";
    document.querySelector('#formModelo').reset();

	  $('#modalModelo').modal('show'); 
  }


