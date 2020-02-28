<?php
    include_once 'user_session.php';
    $userSession = new UserSession();
    $userSession->closeSession();
    //$tiempoExpirado = "se acabo el tiempo";
    header("location: index.php");
?> 