<?php 
    require_once(DOCUMENT_ROOT.'/controllers/Controller.php');
    $routes = [
        '/home'     => ['controller' => 'Controller', 'action' => 'home'],
        '/research' => ['controller' => 'Controller', 'action' => 'research'],
        '/movie'    => ['controller' => 'Controller', 'action' => 'movie'],
    ];
    $controller = new Controller();
    if ($_SERVER['PATH_INFO'] == '') {
        header('Location: '.ROOT_PATH.'/home');
        die();
    }
    else if (!isset($_SERVER['PATH_INFO']) || empty($_SERVER['PATH_INFO']) || !key_exists($_SERVER['PATH_INFO'], $routes)){
        echo $controller->err404();
        die();
    }
    $selected = $routes[$_SERVER['PATH_INFO']];
    require_once(DOCUMENT_ROOT.'/controllers/'.$selected['controller'].'.php');
    $controller = new $selected['controller'];
    $controller->{$selected['action']}();
?>