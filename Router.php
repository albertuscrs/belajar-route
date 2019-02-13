<?php

class Router
{
    private $registered = [];

    private function getPath()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri);
        $path = $uri[0];
        
        $path = trim($path,'/');
        return $path;
    }

    public function register($method, $path, $func)
    {
        $method = strtoupper($method);
        $path = trim($path,'/');
        $this->registered["$method $path"]=$func;
    }

    public function run()
    {
        $path = $this->getPath();
        $method = $_SERVER['REQUEST_METHOD'];

        $func = $this->registered["$method $path"];
        $func();
    }

    public function get($path, $func)
    {
        $this->register("get", $path, $func);
    }

    public function post($path, $func)
    {
        $this->register("post", $path, $func);        
    }

    public function put($path, $func)
    {
        $this->register("put", $path, $func);        
    }

    public function delete($path, $func)
    {
        $this->register("delete", $path, $func);        
    }
}