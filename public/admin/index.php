<?php
require __DIR__ . '/../../config/connect.php';

require __DIR__ . '/../../vendor/autoload.php';

use Clara\Controller\AdminController;

$route = '';
$type= '';
$id='';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


$page = new AdminController(false);

switch ($route) {
    case 'home':
        $view = $page->homeAdmin();
        break;
    case 'chapeaux':
        $view = $page->showHats();
        break;
    case 'chapeau':
        $view = $page->showHat($id);
        break;
    case 'nouveau-chapeau':
        $view = $page->addHat();
        break;
    case 'modif-chapeau':
        $view = $page->updateHat($id);
        break;
    case 'articles':
        $view = $page->showContents($type);
        break;
    case 'article':
        $view = $page->showContent($id);
        break;
    case 'nouvel-article':
        $view = $page->addContent($type);
        break;
    case 'modif-article':
        $view = $page->updateContent($id);
        break;
    case 'supp-article':
        $view = $page->deleteContent($id);
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

