<?php
//Création de la classe de récuperation de URL
class Dispatcher{

    var $request;

    function __construct(){
        // Objet qui récupere URL $request
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        //instancier mon controller
        $controller = $this->loadController();

        if(!in_array($this->request->action, get_class_methods($controller))){
            $this->error('le controller : '.$this->request->controller.'n\'a pas de méthode '.$this->request->action);
        }
        call_user_func_array(array($controller, $this->request->action), $this->request->params);
        $controller->render($this->request->action);

    }

    function error($message){
        header('HTTP/1.0 404 Not Found');
        $controller = new Controller($this->request);
        $controller->set('message', $message);
        $controller->render('/errors/404');
        die();
    }

    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'controller'.DS.$name.'.php';
        require $file;
        return new $name($this->request);
    }

}