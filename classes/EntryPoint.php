<?php
class EntryPoint {
  private $route;

  public function __construct($route){
    $this->route = $route;
    $this->checkUrl();
  }

  public function checkUrl(){
    if($this->route !== strtolower($this->route)){
      http_response_code( 301);
      header('location: '. strtolower($this->route));
    }
  }

  private function loadTemplate($templateFileName, $variables = []){
    extract($variables);

    ob_start();
    include __DIR__ . '/../templates/'. $templateFileName;

    return ob_get_clean();
  }

  private function callAction(){
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../classes/DatabaseTable.php';

    $jokesTable = new DatabaseTable($pdo, 'joke', 'id');
    $authorsTable  = new DatabaseTable($pdo, 'author','id');

    //if no route is set, use 'joke/home'
    // ltrim() ; removes leading /
    $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
      if($route === 'joke/list'){
        include __DIR__ . '/../classes/controllers/JokeController.php';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->list();
      }elseif ($route === 'joke/home') {
        include __DIR__ . '/../classes/controllers/JokeController.php';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->home();
      }elseif ($route === 'joke/edit') {
        include __DIR__ . '/../classes/controllers/JokeController';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->edit();
      }elseif ($route === 'joke/delete') {
        include __DIR__ . '/../classes/controllers/JokeController';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->delete();
      }elseif ($route === 'register') {
        include __DIR__ . '/../classes/controllers/RegisterController.php';
        $controller = new RegisterController($authorsTable);
        $page = $controller->showForm();

      } //endif


    return $page;
  } //end fxn

  public function run(){
    $page = $this->callAction();
    $title = $page['title'];

    if(isset($page['variables'])){
      $output = loadTemplate($page['template'], $page['variables']);
    } else {
      $output = loadTemplate($page['template']);
    }
    include __DIR__ . '/../templates/layout.html.php';



  } //end run


}
