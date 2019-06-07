<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'home' => array(
    'controller' => 'Pages',
    'action' => 'index'
  ),
  'genres' => array(
    'controller' => 'Pages',
    'action' => 'genres'
  ),
  'emotie' => array(
    'controller' => 'Pages',
    'action' => 'emotie'
  ),
  'clips' => array(
    'controller' => 'Pages',
    'action' => 'clips'
  )
);


if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: ./');
  exit();
}


$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();