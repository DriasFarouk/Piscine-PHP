<?php
session_start ();
require("db.php");

if ($_SESSION['login'] == ''){
    header('Location: index.php');
}
else
{

function get_connected_id($con) {
    $login = $_SESSION['login'];
    $req = "SELECT id FROM users ";
    $req.= "WHERE login = '$login'";
    $connected_id = return_req_result($con, $req);
    return ($connected_id[0]['id']);
}

function sale_products($con, $sale_id) {
    $req = "SELECT * FROM sales_products sp ";
    $req.= "JOIN sales s ON s.id = sp.id_sales ";
    $req.= "JOIN products p ON p.id = sp.id_product ";
    $req.= "WHERE s.id = $sale_id";
    $sale_products = return_req_result($con, $req);
    return ($sale_products);
}


function sales_data($con) {
    $connected_id = get_connected_id($con);
    $req = "SELECT s.id id, u.id id_user, s.total_price FROM sales s ";
    $req.= "LEFT JOIN users u ON s.id_user = u.id ";
    $req.= "WHERE s.id_user = $connected_id";
    $sales = return_req_result($con, $req);
    return ($sales);
}

include("header.php");
?>

<table id="my-orders-table" class="table table--orders">
    <thead>
    <tr>
        <th class="table--orders__order">Commande n°</th>
        <th class="table--orders__date">Date</th>
        <th class="table--orders__ship">Produits</th>
        <th class="table--orders__total">Total de la commande</th>
        <th class="table--orders__actions">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php $sales = sales_data($con);
    foreach ($sales as $key => $sale) {
    ?>
    <tr>
        <td class="table--orders__order"><?php echo $sale['id']; ?></td>
        <td class="table--orders__date">05/08/2016</td>
        <td class="table--orders__products">
            <?php
            $sale_id = $sale['id'];
            $products = sale_products($con, $sale_id);
            foreach ($products as $key => $product) {
            ?>
            <div class="catalog-product__details">
                <h1 class="catalog-product__name"><?php echo $product['product_name']; ?></h1>
                <div class="catalog-product__details-data">
                    <div class="catalog-product__details-price">
                        <p><?php echo $product['price']; ?> &euro;</p>
                    </div>
                </div>
                <?php }?>
        </td>
        <td class="table--orders__total"><?php echo $sale['total_price']; ?> &euro;</td>
    </tr>
    <?php }?>
    </tbody>
</table>
<?php } include("footer.php") ?>
