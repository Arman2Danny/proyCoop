let tblEvent;
document.addEventListener('DOMContentLoaded',function(){
    tblEvent = $('#tablaEvento').DataTable( {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        responsive: true,
        scrollX: true,
      
        ajax: {
            url: base_url + 'Evento/listar',
            
            dataSrc: ''
        },
        columns: [{
            'data' : 'idevento'
        },
        {
            'data' : 'nombre_evento'
        },
        {
          'data'  : 'Descripcion'
        },
        {
            'data' : 'fecha'
            
        },
        {
            'data' : 'hora'
        },
        {
            'data': 'ordendia'
        }

        ]
    } );

  
    

    
})

function frmEvento(){
    document.getElementById("title").innerHTML="Registrar Evento";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-registered" aria-hidden="true"></i>egistrar';
    document.getElementById("btnAccion").classList.replace("btn-success","btn-primary");
    document.getElementById("frmEvento").reset()
   // document.getElementById('oculto').classList.replace("d-block","d-none");
    $("#nuevo_evento").modal("show");
    document.getElementById("idevento").value= "";
}

function registrarEvento(e){
    e.preventDefault();
    const evento = document.getElementById("nombre_evento");
    const descripcion = document.getElementById("descripcion");
    const fecha = document.getElementById("fecha");
    const hora = document.getElementById("hora");
    const orden= document.getElementById("orden");
    const frm = document.getElementById("frmEvento");
    const id = document.getElementById("idevento");

    
    
    if(evento.value == "" || descripcion.value == "" || fecha.value == "" || hora.value== ""  || orden == ""){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Evento/registrar";
        const frm= document.getElementById("frmEvento");
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
                    title: 'Evento registrado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_evento").modal("hide");
                 
                  tblEvent.ajax.reload();
               
               }else if(res == "modificado"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Evento modificado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_evento").modal("hide");
                
                  tblEvent.ajax.reload();
                
                 
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

function btnEditarEvento(id){
 
    document.getElementById("title").innerHTML="Actualizar Evento";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-refresh" aria-hidden="true"></i> Actualizar';
    document.getElementById("btnAccion").classList.replace("btn-primary","btn-success");
   //document.getElementById('oculto').classList.replace("d-none","d-block");
    //document.getElementById('estado').setAttribute("type","text");
    console.log(id);
    const url = base_url + "Evento/editar/"+id; 
    const http= new  XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
         console.log(this.responseText);
      const res =JSON.parse(this.responseText);
        document.getElementById("idevento").value = res.idevento;
         document.getElementById("nombre_evento").value = res.nombre_evento;
         document.getElementById("descripcion").value = res.Descripcion;
            document.getElementById("fecha").value = res.fecha;
         document.getElementById("hora").value = res.hora;
         document.getElementById("orden").value= res.ordendia;
               
         $("#nuevo_evento").modal("show");
          
    }
   
}

}

function btnEliminarEvento(id){
    Swal.fire({
        title: 'Esta seguro de Eliminar?',
        text: "El evento se eliminara de forma permanente desea continuar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Evento/eliminar/"+id; 
            const http= new  XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState==4 && this.status==200){
                  console.log(this.responseText);
                   const res = JSON.parse(this.responseText);
                   if(res == "ok"){
                    Swal.fire(
                        'Mensaje!',
                        'Evento Eliminado con exito.',
                        'success'
                      )
                      tblEvent.ajax.reload();
                   }else{
                    Swal.fire(
                        'Mensaje!',
                         res,
                        'error'
                      )

                   }           
            }  
        } 
        }
      })

}

function btnReporteEvento(id){
   // console.log(id);
  const url = base_url + "Evento/dato";
  console.log(url);
  const http= new  XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState==4 && this.status==200){
                 console.log(this.responseText);

                }
}
}