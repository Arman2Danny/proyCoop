<?php 
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   require 'PHPMailer/src/Exception.php';
   require 'PHPMailer/src/PHPMailer.php';
   require 'PHPMailer/src/SMTP.php';


    class Registrar extends Controller{
        public function __construct(){
            session_start();
          
            parent::__construct();
           
           
        }
        public function index(){
           // $data['roles'] = $this->model->getPermiso();
            $this->views->getView($this, "index");
        }
        public function validar(){
            if(empty ($_POST['nombre']) || empty($_POST['email']) || empty($_POST['password'])){
                $msg= "los campos estan vacios";
            }else{
                $email= $_POST['email'];
                $clave= $_POST['password'];
                 $hash=hash("SHA256",$clave);
                $data= $this->model->getSocio($email, $hash);
                if($data){
                    $_SESSION['id_socio'] = $data['idsocio'];
                    $_SESSION['nombre'] = $data['nombresocio'];
                    $_SESSION['apellido']= $data['apellidosocio'];
                    $_SESSION['rol'] = $data['id_permiso'];
                    $_SESSION['email'] = $data['correo'];
                    $_SESSION['activo'] = true;
                    $msg = "ok";
                }else{
                    $msg = "Email o contraseña incorrecta ";
                }
    
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

    
        
    public function registrar(){

        $nombre = $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
         $passw = $_POST['password'];
         $cedula = $_POST['cedula'];
         $email = $_POST['email'];
         $hash = hash("SHA256",$passw);
         if(empty($nombre) || empty($apellido) || empty($passw) || empty($email) ){
                 $msg= "Todos los campos son obligatorios";
     
                      }else{
                      if(isset($_POST['nombre']) || isset($_POST['password']) || isset($_POST['email'])){
                         $data= $this->model->registrarSocios($nombre,$apellido,$direccion, $telefono, $hash, $cedula, $email,"","");
                         if($data == "ok"){
                             $msg= "si";
     
                              }else if($data == "existe"){
                                  $msg= "el socio ya existe";
                                     }else{
                                         $msg = "error al registrar el socio";
                                          }
                              }
                             }
                         
               echo $msg;
                     die(); 
 
                  }

       public function recuperar(){
        
        $email = $_POST['email'];
        $clave = $_POST['pass'];
        $contraactual = $_POST['pass'];
        $hash = hash("SHA256",$clave);
        
        $consulta = $this->model->Restablecer_Contra($hash, $email);
     
        $mail = new PHPMailer(true);
        if($consulta == 1){
            
        
            try{
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' =>false,
                        'verify_peer_name' => false,
                        'verify_self_signed' => true

                    )
                );
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail ->SMTPAuth = true;
                $mail ->Username = 'armandoibaez820@gmail.com';
                $mail->Password = 'yrob qdjq boey efuy';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail ->Port = 465;

                $mail->setFrom('armandoibaez820@gmail.com', 'Administrador');
                $mail->addAddress($email, 'Usuario');     


                $mail->isHTML(true);

                $mail->Subject ='Restablecer Password';
                $mail->Body = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Login</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <link href="<?php echo base_url;?>Assets/css/styles.css" rel="stylesheet" />
                </head>
                <body>
                    <div class="container d-flex justify-content-center align-items-center mt-5" >
                <div class="card bg-light " style="border: 1px solid black; box-shadow: 2px 5px 2px rgba(0, 0, 0, 0.75) ">
                  <div class="card-header d-flex align-content-between flex-wrap justify-content-center" style="border-bottom: 1px solid black; ">
                    <img src="taxi.png" alt="" style="margin-top: -3%;"><h3 class="text-dark text-center"> Coop. Taxis </h3>
                   
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Restablecer Contraseña</h5>
                    <p class="card-text">Haga click en el boton y se le direccionara al formulario</p>";
                    <a href="'.base_url.'/Recuperar?email='.$email.'" class="btn btn-primary">Nueva contraseña</a>
                  </div>
                </div>
                </div>
                
                
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
             
                </body>
                </html> ';
               

                $mail->send();
               



            }catch(Exception $e){
                echo $e ;

            }


           

           echo "si";
        }else{
            echo "Su correo electronico no existe";
        }

        //echo $consulta;

       }    
             

       


    }  
            
?>