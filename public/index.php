<?php

/**require '../config/connect.php';**/

require __DIR__ . '/../vendor/autoload.php';


$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

switch ($route) {

    case 'articles':
        require '../src/view/articles.php';
        break;


    case 'manifeste':
        require '../src/view/manifeste.php';
        break;

    case 'entreprise':
        require '../src/view/entreprise.php';
        break;

    case 'admin':
        require '../src/view/admin.php';
        break;

    default :
        require '../src/view/home.php';
}



