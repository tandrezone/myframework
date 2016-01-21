<?php
include_once '/packages/moonlight/auth/models/users.php';
class start extends controller{
  function index() {
    echo "entrou aki";
  }
  function ari($params){
    $name = $params["nome"];
    return $this->view->make('name',["name" => $name])->render();
  }
}
 ?>
