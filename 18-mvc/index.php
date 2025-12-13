<?php 

session_start();


require_once 'application/database.php';
require_once 'application/model.php';
require_once 'application/load.php';
require_once 'application/controller.php';


$request = $_SERVER['REQUEST_URI'];
$base_path = '/18-mvc/';


$url = str_replace($base_path, '', $request);


$url = strtok($url, '?');


$url = trim($url, '/');


$params = $url ? explode('/', $url) : [];


$action = isset($params[0]) && $params[0] !== '' ? $params[0] : 'index';
$id = isset($params[1]) ? $params[1] : null;


new Controller($action, $id);