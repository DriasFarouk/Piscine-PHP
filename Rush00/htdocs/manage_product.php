<?php 

session_start();

include('db.php');

function create_product($con)
{
    if($_POST['submit'] == "OK")
    {
if ($_POST['price'] != "" && $_POST['product_name'] != "" && $_POST['ref'] != "")
{
        $tmpref= $_POST['ref'];
        if ((return_req_result($con,"SELECT id FROM products WHERE ref='$tmpref'")) == NULL)
        {
            test_input($product_name = $_POST['product_name']);
            test_input($price = $_POST['price']);
            test_input($descrip = $_POST['description']);
            test_input($ref = $_POST['ref']);
            test_input($url_img = $_POST['url_img']);

            $req = "INSERT INTO PRODUCTS(product_name, price, description, ref, url_img)";
            $req .= "VALUES ('$product_name', '$price', '$descrip', '$ref', '$url_img')";
            exeq_req($con, $req);
            echo "OK product Created\n";
        }
            else
                echo "ERROR Product Already Exisit\n";
    }
else
    echo "ERROR REF, PRICE or NAME is NULL !\n";

}
}

function update_product($con)
{
    test_input($id = $_POST['id']);
    $id = "SELECT id FROM PRODUCTS WHERE id='$id'";
    $goodid = return_req_result($con,$id);
    $exactid =  $goodid[0]['id'];

    test_input($product_name = $_POST['product_name']);
    test_input($price = $_POST['price']);
    test_input($description = $_POST['description']);
    test_input($ref = $_POST['ref']);
    test_input($url_img = $_POST['url_img']);
    if($_POST['submit'] == "OK") {

        if ($goodid != NULL) {
            if ($product_name != "") {
                $req1 = "UPDATE PRODUCTS SET  product_name = '$product_name' WHERE ID = '$exactid'";
                exeq_req($con, $req1);
                echo "OK  product_name Udapte !\n";
            }
            if ($price != "") {
                $req1 = "UPDATE PRODUCTS SET price = '$price' WHERE ID = '$exactid'";
                exeq_req($con, $req1);
                echo "OK  PRICE Udapte !\n";
            }
            if ($ref != "") {
                $req1 = "UPDATE PRODUCTS SET ref = '$ref' WHERE ID = '$exactid'";
                exeq_req($con, $req1);
                echo "OK  REF Udapte !\n";
            }
            if ($description != "") {
                $req1 = "UPDATE PRODUCTS SET description = '$description' WHERE ID = '$exactid'";
                exeq_req($con, $req1);
                echo "OK  Description Udapte !\n";
            }
            if ($url_img != "") {
                $req1 = "UPDATE PRODUCTS SET url_img = '$url_img' WHERE ID = '$exactid'";
                exeq_req($con, $req1);
                echo "OK  url_img Udapte !\n";
            }
        } else
            echo "ERROR ref WRONG !";
    }
}


function remove_product($con)
{
$id = $_POST['id'];
$req1 = "SELECT id FROM PRODUCTS WHERE id='$id'";
$product = return_req_result($con,$req1);
$id_product = $product[0]['id'];

    if($_POST['submit'] == "OK") {

        if ($id_product != NULL) {
            $req = "DELETE FROM PRODUCTS WHERE ID = '$id_product'";
            exeq_req($con, $req);
            echo "Product DELETED !";
        } else
            echo "ERROR This PRODUCT already deleted\n";
    }
}

$con = connect_mysql_serveur();
$con = connect_db($con);
?>