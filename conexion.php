<?php

     $user="root";
     $pass="";
     $server="localhost";
     $db="lonas";

     //Esta variable $con se utiliza para llamar a tu conexion de base de datos siempre en cualquier pagina que vayas a utilizarla

     $cone = mysqli_connect($server,$user, $pass) or die ("error para conectar a la base de datos");
     mysqli_select_db($cone,$db);


?>