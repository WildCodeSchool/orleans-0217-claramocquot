<?php
require '../../config/connect.php';

require __DIR__ . '/../../vendor/autoload.php';

use Clara\Controller\ContentController;


$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

switch ($route) {

    case 'addarticle':
        $content = new ContentController();
        echo $content->add();
        break;

    default :
        require '../../src/View/Admin/admin.php';

}


