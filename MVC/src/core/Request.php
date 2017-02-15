<?php
//Création de la classe de récuperation de URL
class Request{
    
    public $url; // URL appellé par l'utilisateur
    function __construct(){
        // Objet qui récupere URL $request
        $this->url = $_SERVER['PATH_INFO'];
        
    }

}