<?php
//Création de la classe de récuperation de URL
class Dispatcher{

    var $request;

    function __construct(){
        // Objet qui récupere URL $request
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();
        $controller->view();
    }

    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'Controller'.DS.$name.'.php';
        require $file;
        return new $name($this->request);
    }

}