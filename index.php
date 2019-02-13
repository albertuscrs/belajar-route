<?php  
    require 'Router.php';

    $router = new Router();

    // $router->get('test',function(){
    //     echo "geted";
    // });

    // $router->post('test',function(){
    //     echo "posted";
    // });

    // $router->delete('test',function(){
    //     echo "deleted";
    // });

    // $router->put('test',function(){
    //     echo "putted";
    // });

    $router->get('test','FooController@bar');

    $router->run();