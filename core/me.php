<?php
class user{
  protected $al;
  protected $name;
  protected $email;
  protected $token;

  function __construct($al){
    $this->al = $al;

  }
  function getLevel(){
    return $this->al;
  }
  function setLevel($al){

    $this->al = $al;
  }
}
