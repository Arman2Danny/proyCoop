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

/*document.getElementById("fecha").addEventListener('change', function(){
    alert("funciona");
    displayData();
   });*/

   document.addEventListener('DOMContentLoaded',function(){

  
    displayDataAsistencia();
   
  console.log("si sirve");
   
  })

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
 
  $.ajax({
      url: "Asistencia/displayAsistencia",
      type:"post",
      data:{
          displaySend: displayData
      },
      success: function(data,status){
          $('#displayDataTableAsist').html(data);
         
         
      }
  })

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
    //const estado = parseInt(est);
    
    
    if(evento.value == "" || nombre.value == "" || apellido.value== ""  || estado.value == "" || multa.value =="" || fecha.value == "" ){
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
                 displayData();
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
                  displayData();
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

