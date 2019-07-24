<?php session_start ();

require("manage_product.php");

remove_product($con);

function products_data($con) {
    $req = "SELECT * FROM products";
    $products = return_req_result($con, $req);
    return ($products);
}


include("header.php");

?>

<form action="delete_product.php" method="post">
    <table class="cart-table table table--orders">
        <thead class="cart-table__thead">
        <tr class="cart-table__row">
            <th class="cart-table__cell cart-table__cell--product">ID</th>
            <th class="cart-table__cell cart-table__cell--product">Produit</th>
            <th class="cart-table__cell cart-table__cell--delete"></th>
        </tr>
        </thead>
        <tbody class="cart-table__tbody">
        <?php $products = products_data($con);
        foreach ($products as $key => $product) { ?>
            <tr>
                <td class="cart-table__cell cart-table__cell--price"><?php echo $product['id']; ?></td>
                <td class="cart-table__cell cart-table__cell--price"><?php echo $product['product_name']; ?></td>
                <td><button class="btn btn--primary" name="id" value="<?php echo $product['id']; ?>">Supprimer le produit</button></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</form>
<?php include("footer.php") ?>
