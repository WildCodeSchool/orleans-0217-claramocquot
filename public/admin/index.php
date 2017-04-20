<?php
require __DIR__ . '/../../config/connect.php';

require __DIR__ . '/../../vendor/autoload.php';

use Clara\Controller\AdminController;

$route = '';
$type= '';
$id='';
$result='';
$res='';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['res'])) {
    $res = $_GET['res'];
}


$page = new AdminController(false);

switch ($route) {
    case 'home':
        $view = $page->homeAdmin();
        break;
    case 'chapeaux':
        $view = $page->showHats($res);
        break;
    case 'chapeau':
        $view = $page->showHat($id);
        break;
    case 'nouveau-chapeau':
        $view = $page->addHat($res);
        break;
    case 'modif-chapeau':
        $view = $page->updateHat($id, $res);
        break;
    case 'supp-chapeau':
        $view = $page->deleteHat($id);
        break;
    case 'articles':
        $view = $page->showContents($type, $result);
        break;
    case 'article':
        $view = $page->showContent($id);
        break;
    case 'nouvel-article':
        $view = $page->addContent($type, $res);
        break;
    case 'modif-article':
        $view = $page->updateContent($id, $res);
        break;
    case 'supp-article':
        $view = $page->deleteContent($type, $id);
        break;
    case 'images':
        $view = $page->showPicturesHome($res);
        break;
    default :
        $view = $page->homeAdmin();
}

echo $view;

