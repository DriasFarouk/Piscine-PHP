<?php
session_start ();
$_SESSION["count"] = -2;
require("db.php");

function cat_products_data($con) {
    $req = "SELECT *, c.id, p.id FROM categories c ";
    $req.= "JOIN cat_products cp ON c.id = cp.id_category ";
    $req.= "JOIN products p ON p.id = cp.id_product ORDER BY p.id DESC";
    $products = return_req_result($con, $req);
    return ($products);
}

include("header.php");
?>

<div class="category container">

    <?php $products = cat_products_data($con);
    foreach ($products as $key => $product) {
    ?>
    <div class="product">
        <div class="catalog-product__essentials">
            <div id="product-media" class="catalog-product__media">
                <div class="catalog-product__media-image">
                    <img src="resources/img/<?php echo $product['url_img']; ?>" alt="">
                </div>
            </div>
            <div class="catalog-product__details">
                <h1 class="catalog-product__name"><a href="product.php?product_id=<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></a></h1>

                <div class="catalog-product__details-description">
                    <p><strong><?php echo $product['description']; ?></strong></p>
                </div>

                <div class="catalog-product__details-data">
                    <div class="catalog-product__details-price">
                        <p><?php echo $product['price']; ?> &euro;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
</div>
<?php include("footer.php") ?>
