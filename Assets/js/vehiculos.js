//funciones Vehiculos

let tblVehiculo;
document.addEventListener('DOMContentLoaded',function(){
    tblVehiculo = $('#tblVehiculo').DataTable( {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        responsive: true,
        scrollX: true,
      
        ajax: {
            url: base_url + 'Vehiculos/listar',
            
            dataSrc: ''
        },
        columns: [{
            'data' : 'idvehiculo'
        },
        {
            'data' : 'num_unidad'
        },
        {
            'data' : 'nombresocio'
            
        },
        {
            'data' : 'placa'
        },
        {
            'data': 'marca'
        },
        {
            'data': 'num_habilitacion'
        },
        {
            'data' :'acciones'
        }

        ]
    } );
})

function frmVehiculo(){

    document.getElementById("title").innerHTML="Registrar Vehiculo";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-registered" aria-hidden="true"></i>egistrar';
    document.getElementById("btnAccion").classList.replace("btn-success","btn-primary");
    document.getElementById("frmVehiculo").reset()
   // document.getElementById('oculto').classList.replace("d-block","d-none");
    $("#nuevo_vehiculo").modal("show");
    document.getElementById("idvehiculo").value= "";
}
//registrar vehiculo
function registrarVehiculo(e){
    e.preventDefault();
    const unidad = document.getElementById("unidad");
    const placa = document.getElementById("placa");
    const chasis = document.getElementById("chasis");
    const marca= document.getElementById("marca");
    const fecha = document.getElementById("fecha");
    const habilitacion = document.getElementById("habilitacion");
    const idsocio = document.getElementById("idsocio");
    const frm = document.getElementById("frmVehiculo");
    //const estado = parseInt(est);
    
    
    if(unidad.value == "" || placa.value == "" || chasis.value== ""  || marca.value == "" || fecha.value =="" || habilitacion == "" || idsocio.value== ""){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Vehiculos/registrar";
        const frm= document.getElementById("frmVehiculo");
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
                    title: 'Vehiculo registrado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_vehiculo").modal("hide");
                 
                  tblVehiculo.ajax.reload();
               
               }else if(res == "modificado"){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Socio modificado con exito',
                    showConfirmButton: false,
                    timer: 3500
                  })
                  frm.reset();
                  $("#nuevo_vehiculo").modal("hide");
                
                  tblVehiculo.ajax.reload();
                
                 
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
function btnEditarVehiculo(id){
 
    document.getElementById("title").innerHTML="Actualizar Vehiculo";
    document.getElementById("btnAccion").innerHTML='<i class="fa fa-refresh" aria-hidden="true"></i> Actualizar';
    document.getElementById("btnAccion").classList.replace("btn-primary","btn-success");
    //document.getElementById('oculto').classList.replace("d-none","d-block");
   // document.getElementById('estado').setAttribute("type","text");
    console.log(id);
    const url = base_url + "Vehiculos/editar/"+id; 
    const http= new  XMLHttpRequest();
    http.open("GET", url, true );
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
         console.log(this.responseText);
      const res =JSON.parse(this.responseText);
        document.getElementById("idvehiculo").value = res.idvehiculo;
         document.getElementById("unidad").value = res.num_unidad;
            document.getElementById("placa").value = res.placa;
         document.getElementById("chasis").value = res.num_chasis;
         document.getElementById("marca").value = res.marca;
         document.getElementById("fecha").value = res.fecha_fabricacion;
         document.getElementById("habilitacion").value= res.num_habilitacion;
         document.getElementById("idsocio").value= res.id_socio;         
         $("#nuevo_vehiculo").modal("show");
          
    }
   
}

}

//eliminar vehiculos
function btnEliminarVehiculo(id){
    Swal.fire({
        title: 'Esta seguro de Eliminar?',
        text: "El vehiculo se eliminara de forma permanente desea continuar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {

            const url = base_url + "Vehiculos/eliminar/"+id; 
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
                        'Vehiculo Eliminado con exito.',
                        'success'
                      )
                      tblVehiculo.ajax.reload();
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





