let tableTipoVeh;

document.addEventListener('DOMContentLoaded', function(){

  //*** MOSTRAR DATOS EN DATATABLE Y TRADUCCIÓN ***//
	tableTipoVeh = $('#table-tipoVeh').dataTable( {
		"aProcessing":true,
		"aServerSide":true,
        "language": {
        	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
          "url": " " + base_url + "/Tipo/getTipo",
            "dataSrc":""
        },
        "columns":[
          {"data": "descripcion"},
          {"data": "estado"},
          {"data": "options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

});

  //*** GUARDAR NUEVO TIPO DE VEHICULO ***//
  let formTipoVeh = document.querySelector('#formTipoVeh');
  
  formTipoVeh.addEventListener('submit', function(e){
     e.preventDefault();

      let intIdTipoVeh = document.querySelector('#idTipoVeh').value; //Lo obtengo a la hora que voy a Editar
      let nombre = document.querySelector('#txtName').value;
      let listStatus = document.querySelector('#listStatus').value;

      if(nombre == '' || listStatus == '' )
      {
        //Modal error Toast aviso parte superior
            Swal.fire({
              position: 'top-end',
              toast:'true',
              icon: 'warning',
              title: 'Error!',
              text: 'Los campos Tipo de vehiculo, y estado no puede esta vacio',
              icon: 'warning',
              confirmButtonText: 'Aceptar',
              showConfirmButton: false,
              timer: 5000,
              timerProgressBar:true
            }); 
        
            return false;
      }
     
      let request = new XMLHttpRequest();
      let ajaxUrl = base_url + "/Tipo/setTipo";
      let formDta = new FormData(formTipoVeh);
      request.open("POST", ajaxUrl,true)
      request.send(formDta);
 
     request.onload = function (){
          if(request.status == 200){
                  let objData = JSON.parse(request.responseText); 

                  if(objData.status)
                  {
                      $('#modalTipoVeh').modal('hide');
                      $('#table-tipoVeh').DataTable().ajax.reload();                  
                    
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

    //*** ELIMINAR TIPO DE VEHICULO ***//
    function fntDelTipo(idtipo){
                
      Swal.fire({
        title: 'Eliminar tipo de vehiculo',
        text: "¿Realmente quiere eliminar el tipo de vehiculo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
            let request =  new XMLHttpRequest();

            let ajaxUrl = base_url+'/Tipo/delTipo';
            let strData = "cod_tipo_vehiculo="+idtipo;
                     
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            console.log(request);
    
            request.onload = function (){
              
              if(request.status == 200){
                let objData = JSON.parse(request.responseText);

                 //objData.status: Valido si es verdadero. 
                //Va a mostrar el mensaje 
                if(objData.status)                {
                  
                    $('#table-tipoVeh').DataTable().ajax.reload();
      
                    Swal.fire({
                      position: 'top-end',
                      toast:'true',
                      icon: 'success',
                      title: 'Eliminar!',
                      text: objData.msg,
                      icon: 'success',
                      confirmButtonText: 'Aceptar',
                      showConfirmButton: false,
                      timer: 5000,
                      timerProgressBar:true
                  });
    
                }else{
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
        }
    
      })
    }


    //*** EDITAR MONEDA ***//  
    /**
     * 
     * 1.Cambio estilo del modal
     * 2.Traigo los datos
     * 3.Muestro los datos en el modal de acuerdo al ID
     */
   function fntEditMoneda(idmoneda){

      var idmoneda = idmoneda;

       //Cambio estilos al modal
      document.querySelector('.modal-header').classList.replace("bg-pattern", "bg-pattern-2");
      document.querySelector('#titleModal').innerHTML = "Actualizar Pais";
      document.querySelector('.modal-header').classList.replace("headerRegister", "headerEdit", "bg-pattern-2");
      document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
      document.querySelector('#btnText').innerHTML="Actualizar";
      document.querySelector('#formMoneda').reset();
      
      var request = request =  new XMLHttpRequest();
      var ajaxUrl = base_url+'/Moneda/EditMoneda/'+idmoneda;

      request.open("GET",ajaxUrl,true);
      request.send();

      request.onload = function (){

        if(request.readyState == 4 && request.status == 200){
                 
           //Convierto a un objeto el formato .JSON que recibo desde Ajax
           var objData = JSON.parse(request.responseText);
        
           //status = true
           if(objData.status){

            //Muestro los datos en modal edit
            document.querySelector('#idMoneda').value = objData.data.cod_moneda;
            document.querySelector('#txtName').value = objData.data.nombre_moneda;
            document.querySelector('#listLocal').value = objData.data.listLocal;
            document.querySelector('#listStatus').value = objData.data.listStatus;

            //Localidad
            if(objData.data.es_local == 1)
              {
                  var optionSelect = '<option value="1" selected class="notBlock">Nacional</option>';
              }else{
                  var optionSelect = '<option value="2" selected class="notBlock">Internacional</option>';
              }
              var htmlSelect = `${optionSelect}
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                              `;
              document.querySelector("#listLocal").innerHTML = htmlSelect;

            //Estado
            if(objData.data.activo == 1)
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
              $('#modalMoneda').modal('show');

           }else{
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
  
    }

  

  //*** HACER QUE EL DATATABLE FUNCIONES ***//
  $('#table-tipoVeh').DataTable();


  //*** MANDAR A LLAMAR AL MODAL: Agregar una nueva marca ***//
  function openModal(){    
    
    document.querySelector('#idTipoVeh').value = "";
    document.querySelector('.modal-header').classList.replace("bg-pattern-2", "bg-pattern");
    document.querySelector('#titleModal').innerHTML = "Nuevo tipo de vehiculo";
    document.querySelector('.modal-header').classList.replace("headerRegister", "bg-pattern-2", "headerEdit");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML="Guardar";
    document.querySelector('#formTipoVeh').reset();

	  $('#modalTipoVeh').modal('show'); 
  }


