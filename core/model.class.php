<?php
include_once 'model.interface.php';
class model implements modelInterface{
  function serialize(){
        return get_object_vars($this);
    }
}
