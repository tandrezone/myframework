<?php
$router->map('GET','/users', 'users.index', 'user_index');                      //LIST OF ALL USERS
$router->map('GET|POST','/users/new', 'users.create', 'user_new');                  //CREATE NEW USER       C
$router->map('GET','/users/[i:id]', 'users.show', 'user_show');                 //LIST OF USER ID       R
$router->map('GET|POST','/users/edit/[i:id]', 'users.edit', 'user_edit');           //UPDATE USER           U
$router->map('POST','/users/delete/[i:id]', 'users.delete', 'user_delete');     //DELETE USER           D
