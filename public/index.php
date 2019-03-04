<?php
try {
  include __DIR__ . '/../includes/autoload.php';
  // include __DIR__. '/../includes/DatabaseConnection.php';
  $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
  $entryPoint = new \Ninja\EntryPoint($route, new \Ijdb\IjdbRoutes());
  $entryPoint->run();

} catch (PDOException $e) {
  $title = 'An Erro has occured';
  $output = 'Database Error:' . $e->getMessage(). 'in' . $e->getFile() . ':'. $e->getLine();
}
include __DIR__ . '/../templates/layout.html.php';
