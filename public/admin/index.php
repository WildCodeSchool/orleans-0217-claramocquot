<?php
require __DIR__ . '/../../config/connect.php';

require __DIR__ . '/../../vendor/autoload.php';

use Clara\Controller\AdminController;

$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}
$page = new AdminController(false);

switch ($route) {
    case 'home':
        $view = $page->homeAdmin();
        break;
    case 'chapeaux':
        $view = $page->showHats();
        break;
    case 'nouveau-chapeau':
        $view = $page->addHat();
        break;
    case 'modif-chapeau':
        $view = $page->updateHat();
        break;
    case 'articles':
        $view = $page->showContents();
        break;
    case 'nouvel-article':
        $view = $page->addContent();
        break;
    case 'modif-article':
        $view = $page->updateContent();
        break;
    case 'images':
        $view = $page->showPicturesHome();
        break;
    case 'nouvelle-image':
        $view = $page->addPictureHome();
        break;
    case 'modif-image':
        $view = $page->updatePictureHome();
        break;
    default :
        $view = $page->homeAdmin();
}

echo $view;

