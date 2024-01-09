<?php

    include_once("_config.php");
    include("routeur.class.php");


    $requette = @$_GET['r'];

    if(empty($requette))  
    {
        $requette = "accueil.php";

        $runderController = new Routeur($requette);
        $runderController->runderController();
    }

    else 
    {
        $runderController = new Routeur($requette);
        $runderController->runderController();
    } 

    // echo "hello word ";
?>