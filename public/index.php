<?php

//require '../config/connect.php';

require __DIR__ . '/../vendor/autoload.php';


$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

switch ($route) {

    case 'articles':
        require '../src/view/user/articles.php';
        break;

    case 'manifeste':
        require '../src/view/user/manifeste.php';
        break;

    case 'entreprise':
        require '../src/view/entreprise.php';
        break;

    case 'admin':
        require '../src/view/admin/admin.php';


    case 'collections':
        require '../src/view/user/collections.php';
        break;

    case 'produit':
        require '../src/view/user/produit.php';
        break;

    case 'admin':
        require '../src/view/admin/admin.php';
        break;

    case 'admin/addarticle':
        require '../src/view/admin/addContent.php';
        break;

    default :
        require '../src/view/user/home.php';
}



