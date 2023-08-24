


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

function frmAsistencia(){
  var fecha = document.getElementById("fecha").value;
  if(fecha == ""){
    document.getElementById("badge").style.display = "inline";
    setTimeout(function(){
      document.getElementById("badge").style.display = "none";
  }, 2000);
   
  

  }else{
    document.getElementById("title").innerHTML="Registrar Asistencia";
    $("#nuevo_asistencia").modal("show");
  }



}
