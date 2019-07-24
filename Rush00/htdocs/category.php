<?php
//session_start ();
require("db.php");

function cat_data($con, $key) {
    $id = $_GET['category_id'];
    $req = "SELECT * FROM categories WHERE id = '".test_input($id)."'";
    $product = return_req_result($con, $req);
    return ($product[0][$key]);
}

function cat_products_data($con) {
    $id = $_GET['category_id'];
    $req = "SELECT *, c.id, p.id id_pr FROM categories c ";
    $req.= "JOIN cat_products cp ON c.id = cp.id_category ";
    $req.= "JOIN products p ON p.id = cp.id_product ";
    $req.= "WHERE c.id = $id ORDER BY p.id DESC";
    $products = return_req_result($con, $req);
    return ($products);
}

include("header.php");
?>

<div class="category container">

    <h1 class="category-title"><?php echo cat_data($con,'cat_name'); ?></h1>

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
                <h1 class="catalog-product__name"><a href="product.php?product_id=<?php echo $product['id_pr']; ?>"><?php echo $product['product_name']; ?></a></h1>

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
