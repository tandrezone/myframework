<?php
switch ($argv[1]) {
  case "create":
    switch ($argv[2]) {
      case 'controller':
          create_controller($argv[3]);
      break;
      case 'model':
        create_model($argv[3]);
      break;
      case 'routing':
        create_routing($argv[3]);
      break;
      case 'crud':
          create_crude($argv[3]);
      break;
      case 'tables':
          create_tables();
      break;
    }
  break;
}

function create_controller($name){
  $ctrl = file_get_contents("automate/controller.php");
  $new_ctrl =str_replace("{{name}}", $name, $ctrl);
  file_put_contents("app/controllers/".$name."s.php", $new_ctrl);
}

function create_model($name){
  $model = file_get_contents("automate/model.php");
  $new_model =str_replace("{{name}}", $name, $model);
  file_put_contents("app/models/".$name.".php", $new_model);
}

function create_routing($name){
  $rout = file_get_contents("automate/routing.php");
  $new_rout =str_replace("{{name}}", $name, $rout);
  file_put_contents("app/routing.php", $new_rout,FILE_APPEND );
}
function create_tables(){
    exec(".\packages\bin\doctrine orm:schema-tool:create");
}
function create_crude($name){
  create_controller($argv[3]);
  create_model($argv[3]);
  create_routing($argv[3]);
  create_tables();
}
?>
