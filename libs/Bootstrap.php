<?php
error_reporting(0);//выключение ошибок
  class Bootstrap {
   public function __construct() {
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    $file = 'controllers/'.$url[0].'.php';
    if(file_exists($file)) {
     require $file;
    } else {
     $file = 'controllers/index.php';
     require $file;
     $controller = new Index();
     $controller->index();
      }

    $controller = new $url[0];
    $controller->loadModel($url[0]);

if(isset($url[2])) {
  if(method_exists($controller, $url[1])) {
   $controller->{$url[1]}($url[2]);
  } else {
   echo 'Error!';
  }
} else {
  if(isset($url[1])) {
   $controller->{$url[1]}();
  } else {
   $controller->index();
  }
}
   }
  }
