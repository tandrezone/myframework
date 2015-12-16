<?php
require("core/controller.php");

class home extends controller{
  function index(){
    echo $this->blade->render("index",array("nome"=>"Tiago"));
  }
}
