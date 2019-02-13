<?php

    class ProductController
    {
        public function create()
        {
            $name = $_REQUEST['name'];
            $price = $_REQUEST['price'];

            require 'connect.php';
            $query = "INSERT INTO 
                    products(name, price)
                    VALUES('$name','$price')
            ";
            mysqli_query($con, $query);

            echo json_encode([
                'name' => $name,
                'price' => $price
            ]);
        }

        public function index(){
            require 'connect.php';
            $result = mysqli_query($con, "SELECT * FROM products");

            $products = [];
            while($row = mysqli_fetch_assoc($result))
            {
                $products[] = $row;
            }

            echo json_encode($products);
        }
    }