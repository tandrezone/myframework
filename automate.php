<?php
switch ($argv[1]) {
  case "create":
    switch ($argv[2]) {
      case 'crud':
          create_crude($argv[3]);
        break;
    }
  break;
}

function create_crude($name){
  $ctrl = file_get_contents("automate/controller.php");
  $new_ctrl =str_replace("{{name}}", $name, $ctrl);
  file_put_contents("app/controllers/".$name."s.php", $new_ctrl);

  $model = file_get_contents("automate/model.php");
  $new_model =str_replace("{{name}}", $name, $model);
  file_put_contents("app/models/".$name.".php", $new_model);

  $rout = file_get_contents("automate/routing.php");
  $new_rout =str_replace("{{name}}", $name, $rout);
  file_put_contents("app/routing.php", $new_rout,FILE_APPEND );
  exec(".\packages\bin\doctrine orm:schema-tool:create");
}
?>
