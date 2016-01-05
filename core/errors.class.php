<?php
include_once 'errors.interface.php';
  class error implements errorInterface{
    private $errors;
    function __construct(){

    }
    static function set($error){
      echo $error;
    }
    public function add($name,$errormsg, $type){
      $erro = new stdClass();
      $erro->name = $name;
      $erro->errormsg = $errormsg;
      $erro->type = $type;
      $this->errors[] = $erro;
    }
    /**
     * [show mostra erros guardados]
     * @return [type] [description]
     */
    public function show(){

    }
  }
?>
