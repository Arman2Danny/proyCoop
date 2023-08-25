


var fecha;

document.addEventListener('DOMContentLoaded',function(){
  document.getElementById('badge').style.display = "none";
})

document.getElementById("fecha").addEventListener('change', function(){

  displayAsistencia();
  
  
 });


 function formatDate(date) {
  var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

  if (month.length < 2) 
      month = '0' + month;
  if (day.length < 2) 
      day = '0' + day;

  return [year, month, day].join('-');
}



function displayAsistencia(){
  var displayData = "true";
  var fecha = new Date();
  var fechaAdd = $('#fecha').val();
  
  
var result=formatDate(fecha);
if(fechaAdd == result){
$.ajax({
    url: "Asistencia/displayAsistencia",
    type:"post",
    data:{
        displaySend: displayData,
        resultSend: result 
    },
    success: function(data,status){
        $('#displayDataTableAsist').html(data);
     
        $('#displayDataTableAsist').ajax.reload();
       
    }
})
}else{
  $('#displayDataTableAsist').html('');
}



}
$(document).ready(function(){
  
  $('#nombre').change(function(){
   $("#nombre option:selected").each(function(){
      var id_nombre=$(this).val();
      $.post("Asistencia/listapellido",{id_nombre:id_nombre},
      function (data){
          console.log(data);
          $("#apellido").val(data);
          
      })
  })
  
  })
  
  });
  
  
 

function frmAsistencia(){
   fecha = document.getElementById("fecha").value;
  if(fecha == ""){
    document.getElementById("badge").style.display = "inline";
    setTimeout(function(){
      document.getElementById("badge").style.display = "none";
  }, 2000);
   
  

  }else{
    document.getElementById("title").innerHTML="Registrar Asistencia";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-registered" aria-hidden="true"></i>egistrar';
    document.getElementById("btnAccion").classList.replace("btn-success","btn-primary");
    document.getElementById("frmAsistencia").reset();
    var datofecha = document.getElementById("fecha").value;
    document.getElementById("fechafrm").value = datofecha;
    $("#nuevo_asistencia").modal("show");
    document.getElementById("codigoasistencia").value= "";

  }
}

function registrarAsistencia(e){
  e.preventDefault();
  const nombre = document.getElementById("nombre").value;
  const apellido = document.getElementById("apellido").value;
  const estado = document.getElementById("estado").value;

  const fecha = document.getElementById("fechafrm").value;
  const multa = document.getElementById("multa").value;
  const evento = document.getElementById("evento").value;
  const frm = document.getElementById("frmAsistencia").value;


 if(apellido == "" || multa == "" ){
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Todos los campos son obligatorios',
    showConfirmButton: false,
    timer: 2500
  });
 }else{
  const url = base_url + "Asistencia/registrarAsist";
  const frm= document.getElementById("frmAsistencia");
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
        title: 'La Asistencia registrado con exito',
        showConfirmButton: false,
        timer: 3500
      })
      frm.reset();
      $("#nuevo_Asistencia").modal("hide");
      displayAsistencia();
      $('#displayDataTableAsist').ajax.reload();
     
     
   
   }else if(res == "modificado"){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Socio modificado con exito',
        showConfirmButton: false,
        timer: 3500
      })
      frm.reset();
      $("#nuevo_vehiculo").modal("hide");
    
      tblVehiculo.ajax.reload();
    
     
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

}

function btnEditarAsistencia(id, fecha){
  document.getElementById("title").innerHTML="Actualizar Asistencia";
  document.getElementById("btnAccion").innerHTML='<i class="fa fa-refresh" aria-hidden="true"></i> Actualizar';
  document.getElementById("btnAccion").classList.replace("btn-primary","btn-success");
  console.log(id);
  console.log(fecha);
  const url = base_url + "Asistencia/editarAsist/"+id+"&"+fecha; 
  console.log(url);

}

