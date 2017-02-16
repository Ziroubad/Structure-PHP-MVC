<?php
class Controller{

    public $request;
    private $vars = array();
    public $layout= 'default' ;
    private $rendered = False;
    
    /**
    * Constructeur
    * @param $request Objet request de notre application
    **/
    function __construct($request){
        $this->request = $request;
    }

    /**
    * Permet de rendre une vue
    * @param $view Fichier à rendre (chemin depuis view ou nom de la vue)
    **/
    public function render($view){
        if($this->rendered){ return false;}
        extract($this->vars);
        if(strpos($view,'/') === 0){
            $view = ROOT.DS.'view'.$view.'.php';
        }else{
            $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        }
        ob_start();
        require($view);        
        $content_for_layout = ob_get_clean();
        require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
        $this->rendered = True;
    }

    /**
    * Permet de parser un ou plusieurs variable à la vue
    * @param $key nom de la variable ou tableau de variables
    * @param $value Valeur de la variable
    **/
    public function set($key, $value=null){
        if(is_array($key)){
            $this->vars += $key;
        }else{
            $this->vars[$key] = $value;
        }
        
    }

    /**
    * Permet de charger un model
    **/
    function loadModel($name){
        $file = ROOT.DS.'model'.DS.$name.'.php';
        require_once($file);
        if(!(isset($this->$name))){
            $this->$name = new $name();
        }
    }

}

?>