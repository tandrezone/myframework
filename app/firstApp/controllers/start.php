<?php
/**
 * This is a controller
 * This controller extends to the main controller
 * The main controller generates 3 power classes
 * -- The em method that is a EntityManager, this class have methods to work with the database
 * -- The Router method, that class works with the routing
 * -- And the view method that work's with the template Engine
 *
 * If you wanna give more power classes to all contollers just inject them in the /core/controller.php
 */
class start extends controller{
  /**
   * Index, this is the fuction that run when the page open in the base routing
   * @return [View] All the controller routing functions  returns a view, a view is a template with need to know vars
   */
  function index(){
    return "index dentro da app firstApp";
  }
}
