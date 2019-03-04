<?php

namespace Ijdb;

class IjdbRoutes {
  private function callAction($routes){
    include __DIR__ . '/../../includes/DatabaseConnection.php';

    $jokesTable = new \Ninja\DatabaseTable($pdo, 'joke', 'id');
    $authorsTable  = new \Ninja\DatabaseTable($pdo, 'author','id');

    //if no route is set, use 'joke/home'
    // ltrim() ; removes leading /
    $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
      if($this->route === 'joke/list'){
        include __DIR__ . '/../classes/controllers/JokeController.php';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->list();
      }elseif ($this->route === 'joke/home') {
        include __DIR__ . '/../classes/controllers/JokeController.php';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->home();
      }elseif ($this->route === 'joke/edit') {
        include __DIR__ . '/../classes/controllers/JokeController';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->edit();
      }elseif ($this->route === 'joke/delete') {
        include __DIR__ . '/../classes/controllers/JokeController';
        $controller = new JokeController($jokesTable, $authorsTable);
        $page = $controller->delete();
      }elseif ($this->route === 'register') {
        include __DIR__ . '/../classes/controllers/RegisterController.php';
        $controller = new RegisterController($authorsTable);
        $page = $controller->showForm();

      } //endif


    return $page;
  } //end fxn
}
