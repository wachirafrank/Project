<?php
try {
  include __DIR__ . '/../classes/EntryPoint.php';
  include __DIR__. '/../includes/DatabaseConnection.php';
  $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
  $entryPoint = new EntryPoint($route);
  $entryPoint->run();

} catch (PDOException $e) {
  $title = 'An Erro has occured';
  $output = 'Database Error:' . $e->getMessage(). 'in' . $e->getFile() . ':'. $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';
