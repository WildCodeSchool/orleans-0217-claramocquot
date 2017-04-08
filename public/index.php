<?php

require __DIR__ . '/../config/connect.php';

require __DIR__ . '/../vendor/autoload.php';

use Clara\Controller\UserController;

$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}
$page = new UserController(true);

switch ($route) {
    case 'home':
        $view = $page->home();
        break;
    case 'produits':
        $view = $page->products();
        break;
    case 'produit':
        $view = $page->product();
        break;
    case 'blogs':
        $view = $page->articles();
        break;
    case 'blog':
        $view = $page->article();
        break;
    case 'marraines':
        $view = $page->articles();
        break;
    case 'marraine':
        $view = $page->article();
        break;
    case 'portraits':
        $view = $page->articles();
        break;
    case 'portrait':
        $view = $page->article();
        break;
    case 'partenaires':
        $view = $page->articles();
        break;
    case 'partenaire':
        $view = $page->article();
        break;
    case 'evenements':
        $view = $page->articles();
        break;
    case 'evenement':
        $view = $page->article();
        break;
    case 'prestations':
        $view = $page->articles();
        break;
    case 'prestation':
        $view = $page->article();
        break;
    case 'entreprise':
        $view = $page->firm();
        break;
    case 'manifeste':
        $view = $page->manifest();
        break;
    default :
        $view = $page->home();
}

echo $view;





