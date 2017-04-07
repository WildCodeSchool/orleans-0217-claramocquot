<?php

//require '../config/connect.php';

require __DIR__ . '/../vendor/autoload.php';

use Clara\Controller\ContentController;

$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

switch ($route) {

    case 'articles':
        require '../src/View/User/articles.php';
        break;

    case 'manifeste':
        require '../src/View/User/manifeste.php';
        break;

    case 'entreprise':
        require '../src/View/User/entreprise.php';
        break;

    case 'collections':
        require '../src/View/User/collections.php';
        break;

    case 'produit':
        require '../src/View/User/produit.php';
        break;

    case 'admin':
        require '../src/View/Admin/admin.php';
        break;

    case 'admin/addarticle':
        $content= new ContentController();
        echo $content->add();
        break;

    default :
        require '../src/View/User/home.php';
}



