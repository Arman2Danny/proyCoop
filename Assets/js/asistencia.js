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
    alert("bien");
    displayData();
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

function displayData(){
    var displayData = "true";
    var fecha = new Date();
    var fechaAdd = $('#fecha').val();
    
  var result=formatDate(fecha);


    if(fechaAdd == result ){
    $.ajax({
        url: "Asistencia/displayAsistencia",
        type:"post",
        data:{
            displaySend: displayData,
            resultSend: result,
        },
        success: function(data,status){
        
            $('#displayDataTableAsistencia').html(data);
        }
    });
  }else{
    $('#displayDataTableAsistencia').html('');
  }

}