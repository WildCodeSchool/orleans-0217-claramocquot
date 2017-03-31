<?php
require '../config/connect.php';
require __DIR__ . '/../vendor/autoload.php';

$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

switch ($route) {

    case 'articles':
        require '../src/articles.php';
        break;

    case 'manifeste':
        require '../src/manifeste.php';
        break;

    case 'entreprise':
        require '../src/entreprise.php';
        break;

    default :
        require '../src/home.php';
}



