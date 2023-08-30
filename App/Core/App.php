<?php
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];


    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if (file_exists('../App/Controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // initial controller
        require_once '../App/Controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // menjalankan method didalam controller dan diberi parameter
        call_user_func([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        // parsing URL
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            $url = [$this->controller];
            return $url;
        }
    }
}
