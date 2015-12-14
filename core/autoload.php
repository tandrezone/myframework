<?php

function __autoload($className){
  include_once(ROOT.DS."packages".DS.$className.DS.$className.".php");
}
