<?php

//Iniciar sesión
session_start();

//Destruir sesión
session_destroy();

//Redireccionar y terminar 
header("location: ../");
die();

?>