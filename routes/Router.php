<?php

namespace Route;

class Router
{
    protected $routes = array();

    private function addRoute($method, $controller, $action, $route)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute('GET', $controller, $action, $route);
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute('POST', $controller, $action, $route);
    }
    
    public function put($route, $controller, $action)
    {
        $this->addRoute('PUT', $controller, $action, $route);
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
            unset($_POST['_method']);
        }

        $data = [];
        if ($method == 'PUT') {
            parse_str(file_get_contents("php://input"), $data);
        } else {
            $data = $method == "GET" ? $_GET : $_POST;
        }

        if (isset($this->routes[$method][$uri])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            if ($data) {
                $controller->$action($data);
            } else {
                $controller->$action();
            }
        } else {
            require_once __DIR__ . "/../resources/views/404.php";
        }
    }
}
