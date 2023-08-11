function frmRegistrar(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById('apellido')
    const email = document.getElementById("email");
    const clave = document.getElementById("password");
    if(email.value == "" ){
        clave.classList.remove("is-invalid");
        email.classList.add("is-invalid");
        email.focus();

    }else if(clave.value == ""){
        email.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    }else{
        const url = base_url + "Registrar/validar";
        const frm= document.getElementById("frmRegistrar");
        const http= new  XMLHttpRequest();
        http.open("POST", url, true );
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                const res = JSON.parse(this.responseText);
                if(res=="ok"){
                    document.getElementById("alert").classList.remove("d-none");
                    document.getElementById("alert").classList.replace("alert-danger","alert-info");
                    document.getElementById("alert").innerHTML = "Email y Contraseña correctas ";
                    setTimeout(() => {
                        window.location=  base_url + 'Socios';
                    }, 3000);
                    
                }else{
                    document.getElementById("alert").classList.remove("d-none");
                    document.getElementById("alert").innerHTML = res;
                   setTimeout(() => {
                    document.getElementById("alert").classList.add("d-none");
                    $("#email").val("");
                    $("#password").val("");
                    $("#email").focus();
                   },5000);
                    
                }
        }


    }
}
    
}

function onSignIn(googleUser){
    let profile = googleUser.getBasicProfile();
    auth( action ="login", profile);

}
function auth(action, profile){
    let data={UserAction: action};
    if(profile){
        data={
            UserName: profile.getGivenName(),
            UserLastName: profile.getFamilyName(),
            UserEmail: profile.getEmail(),
            UserAction: action

        };

    }
    $.ajax({
        type:"POST",
        url: base_url + "Registrar/registrarEmail",
        data: data,
        success:function(data){
            console.log(data);
        }
        
    })

}


function registrarSocio(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const direccion = document.getElementById("direccion");
    const telefono = document.getElementById("telefono");
    const clave = document.getElementById("password");
    const cedula = document.getElementById("cedula");
    const email = document.getElementById("email");
  
    const permiso = document.getElementById("permiso");
    const frm = document.getElementById("frmRegistrar");
   
    
    
    if(nombre.value == "" || apellido.value == "" || direccion.value == "" || telefono.value == "" || email.value == "" || clave.value== ""  || cedula.value == "" || permiso == ""){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2500
          });
    }else{
        const url = base_url + "Registrar/registrar";
        const frm= document.getElementById("frmRegistrar");
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
                    timer: 2000
                  })
             
                  setTimeout(() => {
                    window.location.href = base_url;
                  }, 5000);
                  
               
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

function restablecer(){
    var email = $("#correo").val();
    
    if(email.length == 0){
        return Swal.fire("Mensaje de advertencia", "llene los campos en blanco","warning");

    }
   // var caracteres = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ23456789";
    var pass= "";
   /* for(var i=0; i<6; i++){
        pass+=caracteres.charAt(Math.floor(Math.random()*caracteres.length));
    }*/
    
    $.ajax({
        url:'Registrar/recuperar',
        type: 'POST',
        data:{
            email: email,
            pass: pass,
        }
        }).done(function(resp){
            console.log(resp);
            if(resp =='si'){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Revise su bandeja de Entrada se envio un correo',
                    showConfirmButton: false,
                    timer: 6500
                  })
                  $("#exampleModal").modal("hide");
                  
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: resp,
                    showConfirmButton: false,
                    timer: 2500
                  });
                  $("#correo").val("");
                 document.getElementById("correo").focus();
            }

        })
        


    

}
