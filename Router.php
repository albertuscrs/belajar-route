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

        if(isset($this->registered["$method $path"]))
        {
            $func = $this->registered["$method $path"];
            if(is_callable($func))
                return $func();
            else
            {
                $temp = explode('@',$func);
                $class_name = $temp[0];
                $function_name = $temp[1];
                require "$class_name.php";
                $controller = new $class_name();
                return $controller->$function_name();
            }                
        }

        http_response_code(404);
        echo "not found bro";
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