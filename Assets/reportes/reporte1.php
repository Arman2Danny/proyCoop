<?php
if(isset($_GET['id'])){
    $idevent = $_GET['id'];
    echo $idevent;
}else{
    echo "no existe variable";
}
?>