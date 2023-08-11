function recuperarcontra(e){
    e.preventDefault();
    var email = $("#email").val();
    var contra= $('#password').val();
    var vcontra = $('#conpassword').val();

    console.log(email);
    console.log(contra);
    console.log(vcontra);
    if(contra != vcontra){
         Swal.fire("Mensaje de advertencia", "Las contraseñas no coinciden","warning");
        $('#password').val("");
        $('#conpassword').val("");
        $('#password').focus();


    }else{
        $.ajax({
            url:'Recuperar/recuperarcontra',
            type: 'POST',
            data:{
                email: email,
                contra: contra,
            }
            }).done(function(resp){
                console.log(resp);
                if(resp =='modificado'){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Contraseña modificado con exito',
                        showConfirmButton: false,
                        timer: 6500
                      })
                      $("#exampleModal").modal("hide");
                      setTimeout(() => {
                        window.location.href = base_url;
                      }, 5000);
                      
                      
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: resp,
                        showConfirmButton: false,
                        timer: 2500
                      });
                     
                }
    
            })
            
    
    }


}