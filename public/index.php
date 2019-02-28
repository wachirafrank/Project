<?php
function loadTemplate($templateFileName, $variables = []){
  extract($variables);

  ob_start();
  include __DIR__ . '/../templates/'. $templateFileName;

  return ob_get_clean();
}

try {
  include __DIR__ . '/../includes/DatabaseConnection.php';
  include __DIR__ . '/../classes/DatabaseTable.php';
  include __DIR__ . '/../controllers/JokeController.php';

  $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
  $authorsTable  = new DatabaseTable($pdo, 'author','id');

  $jokeController = new JokeController($jokesTable, $authorsTable);

  $action = $_GET['action'] ?? 'home';
  $page = $jokeController->$action();

  if(isset($page['variables'])){
    $output = loadTemplate($page['template'], $page['variables']);
  } else {
    $output = loadTemplate($page['template']);
  }

  $title = $page['title'];

  ob_start();
  include __DIR__ . '/../templates/' . $page['template'];
  $output = ob_get_clean();

} catch (PPOException $e) {
  $title = 'An Error Occured';
  $output = 'Database Error:'. $e->getMessage() . 'in' . $e->getFile(). ':' . $e->getLine();
}
include __DIR__. '/../templates/layout.html.php';
