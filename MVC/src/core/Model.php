<?php
class Model{

   public $db = 'default';
   public function __construct(){
            $conf = Conf::$databases[$this->db];
            try{
                $db = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';',$conf['login'],$conf['password']);
            }catch(PDOException $e){
                die($e->getMessage());
            }
            

        }

    public function find(){
            
        }
}