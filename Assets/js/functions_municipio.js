let tableMunicipios;

document.addEventListener('DOMContentLoaded', function(){

  //*** MOSTRAR DATOS EN DATATABLE Y TRADUCCIÓN ***//
	tableMunicipios = $('#table-municipios').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
          "url": " " + base_url + "/Municipios/getMunicipios",
            "dataSrc":""
        },
        "columns":[
          {"data": "descripcion"},
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

 // --- CARGAR SELECT TIPO DE VEHICULO --- //
 
 let comboxDepartamento = document.querySelector('#departamento');

 //Cargo Todos los departamentos que tengo en la BD
function cargarDepartamento (){
  //GET: Porque solo quiero TRAER los datos
  //Data: No envio por ser GET en este caso
  $.ajax({
      type: "GET",
      url: base_url+'/Departamentos/obtenerDepartamento',
     success: function (response){
      //departamentos:Tengo el resultado en objeto
        const obDepatamento = JSON.parse(response);
          let template = '<option class="form-control" selected disabled>-- Seleccione --</option>'

          obDepatamento.forEach(departamento => {
              template += `<option class="form-control" value="${departamento.idDep}">${departamento.descripcion}</option>`;
          })

          comboxDepartamento.innerHTML = template;
      }

  });
}

//Cargo los departamentos
cargarDepartamento()

  //*** GUARDAR NUEVA MARCA ***//
  let formMarca = document.querySelector('#formMarca');
  
  formMarca.addEventListener('submit', function(e){
     e.preventDefault();

      let intIdMarca = document.querySelector('#idMarca').value; //Lo obtengo a la hora que voy a Editar
      let listTipo = document.querySelector('#tipo').value;
      let nombre = document.querySelector('#txtName').value;
      let listStatus = document.querySelector('#listStatus').value;

      if(listTipo == '' || listStatus == '' )
      {
        //Modal error Toast aviso parte superior
            Swal.fire({
              position: 'top-end',
              toast:'true',
              icon: 'warning',
              title: 'Error!',
              text: 'Los campos marca y estado no puede esta vacio',
              icon: 'warning',
              confirmButtonText: 'Aceptar',
              showConfirmButton: false,
              timer: 5000,
              timerProgressBar:true
            }); 
        
            return false;
      }
     
      let request = new XMLHttpRequest();
      let ajaxUrl = base_url + "/Marcas/setMarca";
      let formDta = new FormData(formMarca);
      request.open("POST", ajaxUrl,true)
      request.send(formDta);
 
     request.onload = function (){
          if(request.status == 200){
                  let objData = JSON.parse(request.responseText); 

                  if(objData.status)
                  {
                      $('#modalMarcas').modal('hide');
                      $('#table-marcas').DataTable().ajax.reload();                  
                    
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

    //*** ELIMINAR MARCA ***//
    function fntDelMarca(idMarca){

      Swal.fire({
        title: 'Eliminar Marca',
        text: "¿Realmente quiere eliminar la marca?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          let request =  new XMLHttpRequest();
          let ajaxUrl = base_url+'/Marcas/delMarca';
          let strData = "idMarca="+idMarca;
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
                
                $('#table-marcas').DataTable().ajax.reload();
    
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
    function fntEditMarca(idmarca){

      document.querySelector('.modal-header').classList.replace("bg-pattern", "bg-pattern-2");
      document.querySelector('#titleModal').innerHTML = "Actualizar marcas";
      document.querySelector('.modal-header').classList.replace("headerRegister", "headerEdit", "bg-pattern-2");
      document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
      document.querySelector('#btnText').innerHTML="Actualizar";
      document.querySelector('#formMarca').reset();      
      
      var idmarca =idmarca;
      
      var request = request =  new XMLHttpRequest();
      var ajaxUrl = base_url+'/Marcas/EditMarca/'+idmarca;
      request.open("GET",ajaxUrl,true);
      request.send();
    
     request.onload = function (){
    
          if(request.readyState == 4 && request.status == 200){
              var objData = JSON.parse(request.responseText);
    
              if(objData.status)
              {
                  document.querySelector("#idMarca").value = objData.data.idMarca;             
                  document.querySelector('#tipo').value = objData.data.tipoId; 
                  document.querySelector("#txtName").value = objData.data.marca; 
                  document.querySelector("#listStatus").value = objData.data.estado;

                   //Renderiza los options: Tipo usuario y Estado
                  
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
                  document.querySelector("#listStatus").innerHTML = htmlSelect;
              }
          }
      
          //$('#modalEmpleado').modal('show');
          
        }
        $('#modalMarcas').modal('show');//Mostrar modal Editar
    }

  

  //*** HACER QUE EL DATATABLE FUNCIONES ***//
  $('#table-municipios').DataTable();


  //*** MANDAR A LLAMAR AL MODAL: Agregar una nueva marca ***//
  function openModal(){    
    
    document.querySelector('#idDepartamento').value = "";
    document.querySelector('.modal-header').classList.replace("bg-pattern-2", "bg-pattern");
    document.querySelector('#titleModal').innerHTML = "Nuevo municipio";
    document.querySelector('.modal-header').classList.replace("headerRegister", "bg-pattern-2", "headerEdit");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML="Guardar";
    document.querySelector('#formDepartamento').reset();

	  $('#modalDepartamento').modal('show'); 
  }


