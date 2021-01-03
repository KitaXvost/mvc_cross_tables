<?php
  class Controller {
   public function __construct() {
    $this->view = new View();
   }
   
   public function loadModel($name) {
   $path = URL.'models/'.$name.'_model.php';
   if(file_exists($path)) {
    require URL.'models/'.$name.'_model.php';
    $modelName = $name.'_Model';
    $this->model = new $modelName();
   }
   }


}
