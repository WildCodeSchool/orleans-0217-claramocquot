<?php
//require '../config/connect.php';

require __DIR__ . '/../../vendor/autoload.php';


$route = '';

if (isset($_GET['route'])) {
$route = $_GET['route'];
}

switch ($route) {

default :
require '../../src/view/admin/admin.php';

}


