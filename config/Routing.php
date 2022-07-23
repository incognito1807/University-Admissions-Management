<?php
// cac controller trong hệ thống
$controllers = array(
    'pages' => [
        'Expectation',
        'Index',
        'Login',
        'Major',
        'Statistic',
        'University',
        'User'
    ]
);

// neu tham so truyen vao khong nam trong cac controller thi
// chuyen sang trang loi
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = '404';
    $action = 'error';
}

// load trang 
include_once('controllers/' . $controller . '.php');
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
