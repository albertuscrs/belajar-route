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
    $router->post('product','ProductController@create');
    $router->get('product','ProductController@index');

    $router->run();