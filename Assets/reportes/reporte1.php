<?php
if(isset($_GET['id'])){
    $idevent = $_POST['id'];
    echo $idevent;
}else{
    echo "no existe variable";
}
?>