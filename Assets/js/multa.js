//creacion de multa para socio conectado con asistencia.php
$(document).ready(function() {
    displayDataMulta();
   
    });

    //formato de fecha
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() ),
            day = '' + (d.getDate() + 1 ),
            year = d.getFullYear();
    
        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;
    
        return [year, month, day].join('-');
    }

    function displayDataMulta(){
        var displayData = "true";

        document.getElementById("buscar").addEventListener("click", function(){
            var fechainicio= document.getElementById("fecha_inicio").value;
            var fechafinal = document.getElementById("fecha_final").value;
            var fecha1 = formatDate(fechainicio);
            var fecha2 = formatDate(fechafinal);
            if(fecha1 == "NaN-NaN-NaN" || fecha2 == "NaN-NaN-NaN"){
               
                alert("Las fechas estan vacias");
            }else{
                document.getElementById("refresh").style="block";
                console.log(fecha1);
                console.log(fecha2);
                $.ajax({
                    url: "Multa/displayMulta/",
                    type: "post",
                    data: {
                        fechainicial : fecha1,
                        fechafinal : fecha2
                    },
                    success: function(data, status){
                        console.log(data);
                        $('#displayDataTableMulta').html(data);
                    }
                })

            }
           

            
        })
    }



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