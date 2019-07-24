<?php 

session_start();

include('db.php');
date_default_timezone_set('EUROPE/PARIS');

function create_sales($con)
{
    $login = $_SESSION['login'];
    $id_user = "SELECT id FROM users WHERE login='$login'";
    $good_id = return_req_result($con,$id_user);
    $exact_id =  $good_id[0]['id'];

    $user_lastname = "SELECT lastname FROM users WHERE login='$login'";
    $good_user_lastname = return_req_result($con,$user_lastname);
    $exact_user_lastname =  $good_user_lastname[0]['lastname'];

    $user_firstname = "SELECT firstname FROM users WHERE login='$login'";
    $good_user_firstname = return_req_result($con,$user_firstname);
    $exact_user_firstname =  $good_user_firstname[0]['firstname'];

    if($_POST['submit'] == "OK") {

    if ($exact_id != "" && $_POST['price'] != "")
    {
        if($_POST['submit'] == "OK")
        {
                test_input($exact_id);
                test_input($exact_user_lastname);
                test_input($exact_user_firstname);
                test_input($total_price = $_POST['price']);
                $date = date("F j, Y, g:i a");
                $req = "INSERT INTO SALES(id_user, user_lastname, user_firstname, total_price, date_sales)";
                $req .= "VALUES ('$exact_id', '$exact_user_lastname', '$exact_user_firstname', '$total_price', '$date')";
                exeq_req($con, $req);
                $id_sales = mysqli_insert_id($con);
                echo "OK sales Created\n";
                $tables_product = $_POST['id_product'];
                foreach ($tables_product as  $elem)
                {
                $req1 = "INSERT INTO SALES_PRODUCTS (id_sales, id_product)";
                $req1 .= "VALUES ('$id_sales','$tables_product')";
                exeq_req($con, $req1);
                echo "OK sales_products Created\n";
                }
                unset($_SESSION['products']);
                header("Location: index.php");
        }
        else
            echo "ERROR Submit no OK\n";
    }
    else
        echo "ERROR ID, PRICE or QUANTITY is NULL !\n";
}}

    $con = connect_mysql_serveur();
    $con = connect_db($con);

    $_SESSION['login'] = "admin";
    $_POST['submit'] = 'OK';
    $_POST['price'] = '566665';
    $_POST['id'] = '';
    //$_POST['date'] = '27.58.45';

?>