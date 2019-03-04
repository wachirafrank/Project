<?php
function autoloader($className){
  // replace // with \ 
  $fileName = str_replace('\\', '/', $className) . '.php';
  $file = __DIR__ . '/../classes'. $fileName;
  include $file;
}

spl_autoload_register( 'autoloader');
