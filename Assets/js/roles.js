let tblRoles;
document.addEventListener('DOMContentLoaded',function(){
    tblRoles = $('#tblRoles').DataTable( {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        responsive: true,
        scrollX: true,
      
        ajax: {
            url: base_url + 'Roles/listar', 
            dataSrc: ''
        },
        columns: [{
            'data' : 'tipopermiso'
        },
        {
            'data' : 'tiposocio'
        },
        
        {
            'data' :'acciones'
        }

        ]
    } );
})

function frmRoles(){
document.getElementById("title").innerHTML="Registrar Roles";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-registered" aria-hidden="true"></i>egistrar';
    document.getElementById("btnAccion").classList.replace("btn-success","btn-primary");
    document.getElementById("frmRoles").reset()
   // document.getElementById('oculto').classList.replace("d-block","d-none");
    $("#nuevo_roles").modal("show");
    document.getElementById("tipopermiso").value= "";
}

function registrarRoles(e){
    e.preventDefault();
    const tiposocio = document.getElementById("tiposocio");
    
    const frm = document.getElementById("frmRoles");
   // const estado = parseInt(est);
    
    
    if(tiposocio.value == "" ){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Roles/registrar";
        const frm= document.getElementById("frmRoles");
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
                    title: 'Roles registrado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_roles").modal("hide");
                 
                  tblRoles.ajax.reload();
               
               }else if(res == "modificado"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Roles modificado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_roles").modal("hide");
                
                  tblRoles.ajax.reload();
                
                 
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
//editar roles
function btnEditarRoles(id){
 
    document.getElementById("title").innerHTML="Actualizar Roles";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-refresh" aria-hidden="true"></i> Actualizar';
    document.getElementById("btnAccion").classList.replace("btn-primary","btn-success");
   // document.getElementById('oculto').classList.replace("d-none","d-block");
   // document.getElementById('estado').setAttribute("type","text");
    console.log(id);
    const url = base_url + "Roles/editar/"+id; 
    const http= new  XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
         console.log(this.responseText);
      const res =JSON.parse(this.responseText);
        document.getElementById("tipopermiso").value = res.tipopermiso;
         document.getElementById("tiposocio").value = res.tiposocio;
                     
         $("#nuevo_roles").modal("show");
          
    }
   
}

}

//Eliminar roles

function btnEliminarRoles(id){
    Swal.fire({
        title: 'Esta seguro de Eliminar?',
        text: "El Rol se eliminara de forma permanente desea continuar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Roles/eliminar/"+id; 
            const http= new  XMLHttpRequest();
            http.open("GET", url, true );
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState==4 && this.status==200){
                   // console.log(this.responseText);
                   const res = JSON.parse(this.responseText);
                   if(res == "ok"){
                    Swal.fire(
                        'Mensaje!',
                        'Roles Eliminado con exito.',
                        'success'
                      )
                      tblRoles.ajax.reload();
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



