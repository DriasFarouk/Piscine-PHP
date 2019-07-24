<?php

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function connect_mysql_serveur()
    {
        $url =  'localhost';
        $user = 'root';
        $pass = '123456';
    
        $con = mysqli_connect($url, $user, $pass);
        if (!$con) 
            die(' Connexion serveur impossible : ' . mysqli_error());
        return ($con);
    }

    function connect_db($con)
    {
        $url =  'localhost';
        $user = 'root';
        $pass = '123456';
        $dbname = "rush";

        $con = mysqli_connect($url, $user, $pass, $dbname);
        if (!$con) 
            die(' Connexion db impossible : ' . mysqli_error());
        return ($con);
    }

    function exeq_req($con, $req)
    {
        if (!mysqli_query($con, $req)) 
            die('Error exec req : ' . mysqli_error($con));
    }

    function create_db($con)
    {
        $req = "DROP DATABASE IF EXISTS rush";
        if (!mysqli_query($con, $req)) 
        {
            die('Error DROP DATABASE IF EXISTS : ' . mysqli_error());
        }
        $req = "CREATE DATABASE rush";
        if (!mysqli_query($con, $req)) 
            die('Error creating database : ' . mysqli_error());
        return ($con);
    }
    
    function create_users_db($con)
    {
        $req = "CREATE TABLE users (id INTEGER NOT NULL  AUTO_INCREMENT, ";
        $req .= "login VARCHAR(255) NOT NULL, ";
        $req .= "passwd VARCHAR(255) NOT NULL, ";
        $req .= "email VARCHAR(255), ";
        $req .= "lastname VARCHAR(255), ";
        $req .= "firstname VARCHAR(255), ";
        $req .= "role_admin TINYINT DEFAULT 0, ";
        $req .= "PRIMARY KEY (id))";
        exeq_req($con, $req);
    }

    function create_products_db($con)
    {
        $req = "CREATE TABLE products (id INTEGER NOT NULL  AUTO_INCREMENT, ";
        $req .= "product_name VARCHAR(255) NOT NULL, ";
        $req .= "price FLOAT NOT NULL, ";
        $req .= "description TEXT NOT NULL, ";
        $req .= "ref TEXT NOT NULL, ";
        $req .= "url_img TEXT NOT NULL, PRIMARY KEY (id))";
        exeq_req($con, $req);
    }

    function create_categories_db($con)
    {
        $req = "CREATE TABLE categories (id INTEGER NOT NULL  AUTO_INCREMENT, ";
        $req .= "cat_name VARCHAR(255) NOT NULL, ";
        $req .= "PRIMARY KEY (id))";
        exeq_req($con, $req);
    }

    function create_cat_products_db($con)
    {
        $req = "CREATE TABLE cat_products (id INTEGER NOT NULL  AUTO_INCREMENT, ";
        $req .= "id_product INTEGER NOT NULL, ";
        $req .= "id_category INTEGER NOT NULL, ";
        $req .= "PRIMARY KEY (id, id_product, id_category),";
        $req .= "FOREIGN KEY (id_product) REFERENCES products(id), ";
        $req .= "FOREIGN KEY (id_category) REFERENCES categories(id))";
        exeq_req($con, $req);
    }

    function create_sales_db($con)
    {
        $req = "CREATE TABLE sales (id INTEGER NOT NULL AUTO_INCREMENT, ";
        $req .= "id_user INTEGER NOT NULL, ";
        $req .= "user_lastname VARCHAR(255) NOT NULL, ";
        $req .= "user_firstname VARCHAR(255) NOT NULL, ";
        $req .= "total_price FLOAT, ";
        $req .= "PRIMARY KEY (id),";
        $req .= "FOREIGN KEY (id_user) REFERENCES users(id))";
        exeq_req($con, $req);
    }

    function create_sales_products_db($con)
    {
        $req = "CREATE TABLE sales_products (id INTEGER NOT NULL  AUTO_INCREMENT, ";
        $req .= "id_sales INTEGER NOT NULL, ";
        $req .= "id_product INTEGER NOT NULL, ";
        $req .= "price_product FLOAT, ";
        $req .= "qty_product INTEGER NOT NULL, ";
        $req .= "name_product VARCHAR(255) NOT NULL, ";
        $req .= "PRIMARY KEY (id),";
        $req .= "FOREIGN KEY (id_sales) REFERENCES sales(id),";
        $req .= "FOREIGN KEY (id_product) REFERENCES products(id))";
        exeq_req($con, $req);
    }

    /*
    function insert_user($id, $login, $passwd, $email, $lastname, $firstname)
    {
        $req = "INSERT INTO users (login, passwd, email, lastname, firstname)";
        $req = "VALUES (".test_input($login).", ".test_input($passwd).", ".test_input($email).", ".test_input($lastname).", ".test_input($firstname).");";
        exeq_req($con, $req);
    }
    */
/*
    function exeq_req($con, $req)
    {
        if (!mysqli_query($con, $req)) 
            die('Error exec req : ' . mysqli_error());
    }
*/
    function insert_admin($con)
    {
/*        $login = "rush_adm";
        $passwd = hash("whirlpool", "42");*/
        $login = "admin";
        $passwd = hash("whirlpool", "42");
        $email = "xniel@student.42.fr";
        $lastname = "Niel";
        $firstname = "Xavier";

        $req = "INSERT INTO users (login, passwd, email, lastname, firstname, role_admin) ";
        $req .= "VALUES ('".test_input($login)."', '".test_input($passwd)."', '".test_input($email)."', '".test_input($lastname)."', '".test_input($firstname)."', 1)";

        exeq_req($con, $req);
    }
        
    $con = connect_mysql_serveur();
    create_db($con);
    $con = connect_db($con);

    create_users_db($con);
    create_products_db($con);
    create_categories_db($con);
    create_cat_products_db($con);
    create_sales_db($con);
    create_sales_products_db($con);

    insert_admin($con);
    echo 'Database installed successfully';
?>