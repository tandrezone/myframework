<?php
class model{
  function serialize(){
        return get_object_vars($this);
    }
}
