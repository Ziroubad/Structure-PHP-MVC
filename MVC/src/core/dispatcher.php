<?php
//Création de la classe de récuperation de URL
class Dispatcher{
    var $request;
    function __construct(){
        // Objet qui récupere URL $request
        $this->request = new Request();
        Router::parse($this->request->url);
    }

}