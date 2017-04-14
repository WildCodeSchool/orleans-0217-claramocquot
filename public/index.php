<?php

require __DIR__ . '/../config/connect.php';

require __DIR__ . '/../vendor/autoload.php';

use Clara\Controller\UserController;

$route = '';
$id ='';
$type ='';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['type'])) {
    $type = $_GET['type'];
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
        $view = $page->articles($type);
        break;
    case 'blog':
        $view = $page->article($id);
        break;
    case 'marraines':
        $view = $page->articles($type);
        break;
    case 'marraine':
        $view = $page->article($id);
        break;
    case 'portraits':
        $view = $page->articles($type);
        break;
    case 'portrait':
        $view = $page->article($id);
        break;
    case 'partenaires':
        $view = $page->articles($type);
        break;
    case 'partenaire':
        $view = $page->article($id);
        break;
    case 'evenements':
        $view = $page->articles($type);
        break;
    case 'evenement':
        $view = $page->article($id);
        break;
    case 'prestations':
        $view = $page->articles($type);
        break;
    case 'prestation':
        $view = $page->article($id);
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





