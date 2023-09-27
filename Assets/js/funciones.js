let tblSocios;
document.addEventListener('DOMContentLoaded',function(){
    tblSocios = $('#tblSocios').DataTable( {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        responsive: true,
        scrollX: true,
      
        ajax: {
            url: base_url + 'Socios/listar',
            
            dataSrc: ''
        },
        columns: [{
            'data' : 'idsocio'
        },
        {
            'data' : 'nombresocio'
        },
        {
          'data'  : 'apellidosocio'
        },
        
        {
            'data' : 'direccion'
            
        },
        {
            'data' : 'telefono'
            
        },
        {
            'data' : 'correo'
            
        },
        {
            'data' : 'estado'
        },
        {
            'data': 'tiposocio'
        },
        {
            'data' :'acciones'
        }

        ]
    } );

    
})




function frmSocio(){
    document.getElementById("title").innerHTML="Registrar Socio";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-registered" aria-hidden="true"></i>egistrar';
    document.getElementById("btnAccion").classList.replace("btn-success","btn-primary");
    document.getElementById("frmSocio").reset()
    document.getElementById('oculto').classList.replace("d-block","d-none");
    $("#nuevo_socio").modal("show");
    document.getElementById("idsocio").value= "";
}

function registrarSocio(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const direccion = document.getElementById("direccion")
    const telefono = document.getElementById("telefono")
    const clave = document.getElementById("password");
    const cedula = document.getElementById("cedula")
    const email = document.getElementById("email");
    const est= document.getElementById("estado");
    const permiso = document.getElementById("permiso");
    const frm = document.getElementById("frmSocio");
    const estado = parseInt(est);
    
    
    if(nombre.value == "" || apellido.value == ""  || direccion.value == "" || telefono.value == "" || email.value == "" || clave.value== ""  || permiso == ""){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Socios/registrar";
        const frm= document.getElementById("frmSocio");
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
                    title: 'Socio registrado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_socio").modal("hide");
                 
                  tblSocios.ajax.reload();
               
               }else if(res == "modificado"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Socio modificado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_socio").modal("hide");
                
                  tblSocios.ajax.reload();
                
                 
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

function btnEditarSocio(id){
 
    document.getElementById("title").innerHTML="Actualizar Socio";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-refresh" aria-hidden="true"></i> Actualizar';
    document.getElementById("btnAccion").classList.replace("btn-primary","btn-success");
    document.getElementById('oculto').classList.replace("d-none","d-block");
    document.getElementById('estado').setAttribute("type","text");
    console.log(id);
    const url = base_url + "Socios/editar/"+id; 
    const http= new  XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
         console.log(this.responseText);
      const res =JSON.parse(this.responseText);
        document.getElementById("idsocio").value = res.idsocio;
         document.getElementById("nombre").value = res.nombresocio;
         document.getElementById("apellido").value = res.apellidosocio;
         document.getElementById("direccion").value = res.direccion
         document.getElementById("telefono").value = res.telefono
            document.getElementById("password").value = res.passw;
            document.getElementById("cedula").value = res.cedula
         document.getElementById("email").value = res.correo;
         document.getElementById("estado").value= res.estado;
         document.getElementById("permiso").value= res.id_permiso;         
         $("#nuevo_socio").modal("show");
          
    }
   
}

}

function btnEliminarSocio(id){
    Swal.fire({
        title: 'Esta seguro de Eliminar?',
        text: "El socio no se eliminara de forma permanente solo se cambiara el estado a inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Socios/eliminar/"+id; 
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
                        'Socio Eliminado con exito.',
                        'success'
                      )
                      tblSocios.ajax.reload();
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

function alertas(mensaje, icono){
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    })
}

function registrarPermisos(e){
    e.preventDefault();
    const url = base_url+ "Socios/registrarPermiso";
    const frm = document.getElementById('formulario');
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
           // console.log(this.responseText);
           const resp = JSON.parse(this.responseText);
          // console.log(resp);
        if(resp != ''){
            alertas(resp.msg, resp.icono);

           }else{
            alertas('Error no identicado', 'error');
           }

        }
    }

}

