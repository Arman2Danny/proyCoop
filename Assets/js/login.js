function frmLogin(e){
    e.preventDefault();
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
        const url = base_url + "Escritorio/validar";
        const frm= document.getElementById("frmLogin");
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
                        window.location=  base_url + 'Escritorio';
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


