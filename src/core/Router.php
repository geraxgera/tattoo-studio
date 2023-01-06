<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function get($path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    public function getRouteMap($method): array
    {
        return $this->routes[$method] ?? [];
    }

    public function getCallback()
    {
        $method = Application::$app->request->getMethod();
        $url = Application::$app->request->getPath();
        
        $url = trim($url, '/');

        $routes = $this->getRouteMap($method);

        $routeParams = false;

        
        foreach ($routes as $route => $callback) {
            
            $route = trim($route, '/');
            $routeNames = [];

            if (!$route) {
                continue;
            }

            
            if (preg_match_all('/{(\w+)(:[^}]+)?}/', $route, $matches)) {
                $routeNames = $matches[1];
            }

           
            $routeRegex = "@^" . preg_replace_callback('/{\w+(:([^}]+))?}/', fn($m) => isset($m[2]) ? "({$m[2]})" : '(\w+)', $route) . "$@";

            
            if (preg_match_all($routeRegex, $url, $valueMatches)) {
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                $routeParams = array_combine($routeNames, $values);

                Application::$app->request->setRouteParams($routeParams);
                return $callback;
            }
        }

        return false;
    }


    public function resolve()
    {
        $path = Application::$app->request->getPath();
        $method = Application::$app->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $callback = $this->getCallback();

            if ($callback === false) {
                Application::$app->response->setStatusCode(404);
                return $this->renderView("_404");
                
            }
            
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, Application::$app->request, Application::$app->response);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    private function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    private function renderOnlyView($view, $params)
    {
        foreach($params as $key => $value){
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
