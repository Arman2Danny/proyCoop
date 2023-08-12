
document.addEventListener('DOMContentLoaded',function(){
  displayData();
  /*$.ajax({
    url: 'Ticket/listar',
    type: 'get',
    success: function(data, status){
      console.log(data);
       
      

    }
  })*/
 
})


function displayData(){
  var displayData = "true";
  $.ajax({
      url: "Ticket/displayTicket",
      type:"post",
      data:{
          displaySend: displayData
      },
      success: function(data,status){
          $('#displayDataTable').html(data);
         
      }
  })

}



function frmTicket(){

    document.getElementById("title").innerHTML="Registrar Ticket";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-registered" aria-hidden="true"></i>egistrar';
    document.getElementById("btnAccion").classList.replace("btn-success","btn-primary");
    document.getElementById("frmTicket").reset()
   // document.getElementById('oculto').classList.replace("d-block","d-none");
    $("#nuevo_ticket").modal("show");
    document.getElementById("idticket").value= "";
    $.ajax({
        url: 'Ticket/datosTicket',
        type: 'get',
        success: function(data, status){
          console.log(data);
          $numero = 'No: '+ data;
          $("#ticket").val($numero);
    
        }
      })
}



//registrar ticket
function registrarTicket(e){
    e.preventDefault();
    const ticket = document.getElementById("ticket");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const valor= document.getElementById("valor");
    const detalle = document.getElementById("detalle");
    const fecha = document.getElementById("fecha");
    //const idsocio = document.getElementById("idsocio");
    const frm = document.getElementById("frmTicket");
    //const estado = parseInt(est);
    
    
    if(ticket.value == "" || nombre.value == "" || apellido.value== ""  || valor.value == "" || detalle.value =="" || fecha == "" ){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Ticket/registrar";
        const frm= document.getElementById("frmTicket");
        const http= new  XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                console.log(this.responseText);
             const res =  this.responseText;
          
              if(res=="si"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Ticket registrado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_ticket").modal("hide");
                 
                  tblTicket.ajax.reload();
               
               }else if(res == "modificado"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Ticket modificado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_ticket").modal("hide");
                
                  tblTicket.ajax.reload();
                
                 
               }else{
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 2500
                  });
               }    
        }

    }
}

function btnEditarTicket(id){
 
  document.getElementById("title").innerHTML="Actualizar Vehiculo";
  document.getElementById("btnAccion").innerHTML='<i class="fa fa-refresh" aria-hidden="true"></i> Actualizar';
  document.getElementById("btnAccion").classList.replace("btn-primary","btn-success");
  //document.getElementById('oculto').classList.replace("d-none","d-block");
 // document.getElementById('estado').setAttribute("type","text");
  console.log(id);
  const url = base_url + "Vehiculos/editar/"+id; 
  const http= new  XMLHttpRequest();
  http.open("GET", url, true );
  http.send();
  http.onreadystatechange = function(){
      if(this.readyState==4 && this.status==200){
       console.log(this.responseText);
    const res =JSON.parse(this.responseText);
      document.getElementById("idvehiculo").value = res.idvehiculo;
       document.getElementById("unidad").value = res.num_unidad;
          document.getElementById("placa").value = res.placa;
       document.getElementById("chasis").value = res.num_chasis;
       document.getElementById("marca").value = res.marca;
       document.getElementById("fecha").value = res.fecha_fabricacion;
       document.getElementById("habilitacion").value= res.num_habilitacion;
       document.getElementById("idsocio").value= res.id_socio;         
       $("#nuevo_vehiculo").modal("show");
        
  }
 
}

}

    
}