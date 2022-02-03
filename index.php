<?php

use App\Controller\ActeurController;

require_once('./vendor/autoload.php');
//recup param GET
//recup controller
$controllerString = filter_input(INPUT_GET, 'controller', FILTER_DEFAULT);
//recup task
$task = filter_input(INPUT_GET, 'task', FILTER_DEFAULT);
//appel controller + methode
$controllerString = 'App\Controller\\' . ucfirst($controllerString) . 'Controller';
$controller = new $controllerString();
$controller->$task();
