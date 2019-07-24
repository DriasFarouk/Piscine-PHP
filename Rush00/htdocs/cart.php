<?php
session_start ();

if($_POST['commander'] == 'OK')
{
    require("manage_sales.php");
    create_sales($con);
}

if($_POST['submit'] == "OK" && $_POST['product'] != '' && $_POST['qty'] != '') {
    $id = $_POST['product'];
    $_SESSION["count"] = $_SESSION["count"] + 1;
    $i = $_SESSION["count"] + 1;
    $product = array("id" => $id, "qty" => $_POST['qty'], "i" => $i);
    $_SESSION["products"][] = $product;
}

if($_GET['delete'] != '') {

    unset($_SESSION["products"][$_GET['delete']]);
}
//todo destroy session after order

require("db.php");

$cart_products = $_SESSION["products"];

function get_connected_id($con) {
    $login = $_SESSION['login'];
    $req = "SELECT id FROM users ";
    $req.= "WHERE login = '$login'";
    $connected_id = return_req_result($con, $req);
    return ($connected_id[0]['id']);
}

function cat_products_data($con) {
    $id = $_GET['category_id'];
    $req = "SELECT *, c.id FROM categories c ";
    $req.= "JOIN cat_products cp ON c.id = cp.id_category ";
    $req.= "JOIN products p ON p.id = cp.id_product ";
    $req.= "WHERE c.id = $id";
    $products = return_req_result($con, $req);
    return ($products);
}

function product_data($con, $id, $key) {
    $req = "SELECT * FROM products WHERE id = '".test_input($id)."'";
    $product = return_req_result($con, $req);
    return ($product[0][$key]);
}

include("header.php");
?>

<form action="cart.php" method="post">
    <input name="id_product" type="hidden" value="<?php echo $cart_products ?>">
    <input name="date_sales" type="hidden" value="<?php echo date("F j, Y, g:i a"); ?>">
    <table class="cart-table table table--orders">
        <thead class="cart-table__thead">
            <tr class="cart-table__row">
                <th class="cart-table__cell cart-table__cell--product">Produit</th>
                <th class="cart-table__cell cart-table__cell--price">Prix unitaire</th>
                <th class="cart-table__cell cart-table__cell--quantity">Qté</th>
                <th class="cart-table__cell cart-table__cell--total">Sous-total</th>
                <th class="cart-table__cell cart-table__cell--delete"></th>
            </tr>
        </thead>
        <tbody class="cart-table__tbody">
        <?php $i = 0;
        foreach ($cart_products as $key => $product) {
            $id = $product["id"];
            ?>
            <tr class="cart-table__row">
                <td class="cart-table__cell cart-table__cell--product">
                        <div class="cart-product-image">
                            <a href="product.php?product_id=<?php echo $id; ?>">
                                <img src="resources/img/<?php echo product_data($con, $id,'url_img'); ?>" width="75" height="75" alt="<?php echo product_data($con, $id,'product_name'); ?>">
                            </a>
                        </div>
                        <div class="cart-product-infos">
                            <strong class="cart-product-infos__name">
                                <a href="product.php?product_id=<?php echo $id; ?>"><?php echo product_data($con, $id,'product_name'); ?></a>
                            </strong>
                        </div>
                </td>
                <td class="cart-table__cell cart-table__cell--price"><?php echo product_data($con, $id,'price'); ?>&nbsp;€</td>
                <td class="cart-table__cell cart-table__cell--quantity"><?php echo $product['qty']; ?></td>
                <td class="cart-table__cell cart-table__cell--total">
                   <span class="cart-price"><span class="price"><?php $total = product_data($con, $id,'price') * $product['qty']; echo $total; ?></span></span>
                </td>
                <td class="cart-table__cell cart-table__cell--delete">
                    <a href="cart.php?delete=<?php echo $product['i']; ?>" title="Retirer l'article">Retirer l'article</a>
                </td>
            </tr>
        <?php $sum_tab[]= $total; $i++; }?>
        </tbody>
    </table>
    <div class="cart-sum">Total : <?php echo array_sum($sum_tab); ?> €<div>
    <input name="price" type="hidden" value="<?php echo array_sum($sum_tab); ?>">

    <div class="cart-order">
        <button type="submit" value="OK" name="commander" id="product-addtocart-button" class="btn btn--primary btn--lg">Commander</button>
    </div>
</form>

