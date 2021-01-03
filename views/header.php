<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MVC cross tables</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <?php
  if(isset($this->js)) {
   foreach($this->js as $js) {
    echo '<script src="'.URL.'views/'.$js.'"></script>';
   }
  }
?>

</head>
<body>
<div id="content"></div>
