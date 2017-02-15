<?php
class PagesController extends Controller{
    
    function view($nom){
        echo "la page demander est : ".$nom;
    }

}