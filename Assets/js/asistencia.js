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