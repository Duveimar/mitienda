<?php
if(isset($_GET["id"])){

    $servername ="localhost";
    $username ="root";
    $password ="";
    $database ="mitienda";

    // conexion 
    $connection = new mysqli($servername,$username,$password,$database);


}


?>