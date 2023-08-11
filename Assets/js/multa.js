//creacion de multa para socio conectado con asistencia.php

$(document).ready(function(){
$("#estado").change(function(){
    $("#estado option:selected").each(function(){
        var vestado=$(this).val();
        $.post("Asistencia/multa",{vestado:vestado},
        function (data){
            console.log(data);
            $("#multa").val(data);
            
        }
        
        )
    })
})
})