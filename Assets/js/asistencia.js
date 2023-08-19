//creacion lista de apellidos para socio conectado con asistencia.php
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

document.getElementById("fecha").addEventListener('change', function(){

    displayDataAsistencia();
    
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

function displayDataAsistencia(){
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
       
         
         
      }
  })
}else{
    $('#displayDataTableAsist').html('');
}

}

function registrarAsistencia(e){
  e.preventDefault();
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const estado = document.getElementById("estado");
    const multa= document.getElementById("multa");
    const evento = document.getElementById("evento");
    const fecha = document.getElementById("fecha");
    //const idsocio = document.getElementById("idsocio");
    const frm = document.getElementById("frmAsistencia");
    var result= formatDate(fecha)
    //const estado = parseInt(est);
 

    
    if(evento.value == "" || nombre.value == "" || apellido.value== ""  || estado.value == "" ||  fecha.value == "" ){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Asistencia/insertarAsistencia";
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
                    title: 'Asistencia registrado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                 // $("#nuevo_ticket").modal("hide");
                 displayDataAsistencia();
                 // tblTicket.ajax.reload();
               
               }else if(res == "modificado"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Asistencia modificado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                 // $("#nuevo_ticket").modal("hide");
                  displayDataAsistencia();
                  //tblTicket.ajax.reload();
                
                 
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

function editarAsistencia(id){
    console.log(id);
    const url = base_url + "Asistencia/editar/"+id; 
    const http= new  XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
         console.log(this.responseText);
      const res =JSON.parse(this.responseText);
      
         //document.getElementById("idsocio").value= res.id_socio;  
         
         document.getElementById("editarnombre").value = res.idasistencia;
         document.getElementById("editarapellido").value = res.apellidosocio;
            document.getElementById("editarestado").value = res.estado;
         document.getElementById("editarmulta").value = res.monto_multa;
         document.getElementById("editarevento").value = res.id_evento;
        // $("#nuevo_ticket").modal("show");
          
    }
   
  }
}

$("#editarnombre").change(function(){
   
  
    $("#editarnombre option:selected").each(function(){
      var id_nombre=$(this).val();
      console.log(id_nombre);
      
      $.post("Asistencia/editarNombre",{id_nombre:id_nombre},
      function(data){
        console.log(data);
       $("#editarapellido").val(data);
      }
      )
  //desahabilitar opciones
  
  
  
    })
  
  });

  $("#editarestado").change(function(){
    $("#editarestado option:selected").each(function(){
      var vestado= $(this).val();
      $.post("Asistencia/multa",{vestado:vestado},
      function(data){
        console.log(data);
        $("#editarmulta").val(data);
      }
      
      )
  
    })
  });

