<?php
session_start();
require("db.php");

function product_data($con, $key) {
    $id = $_GET['product_id'];
    $req = "SELECT * FROM products WHERE id = '".test_input($id)."'";
    $product = return_req_result($con, $req);
    return ($product[0][$key]);
}

function product_cats_data($con) {
    $id = $_GET['product_id'];
    $req = "SELECT cat_name, c.id FROM categories c ";
    $req.= "JOIN cat_products cp ON c.id = cp.id_category ";
    $req.= "JOIN products p ON p.id = cp.id_product ";
    $req.= "WHERE p.id = $id";
    $categories = return_req_result($con, $req);
    return ($categories);
}

include("header.php");
?>

<div class="container">
    <form action="cart.php" method="post" id="product_addtocart_form" enctype="multipart/form-data">
        <input type="hidden" name="product" value="<?php echo product_data($con,'id'); ?>">
        <div class="catalog-product__essentials">
            <div id="product-media" class="catalog-product__media">
                <div class="catalog-product__media-image">
                    <img src="resources/img/<?php echo product_data($con,'url_img'); ?>" alt="">
                </div>
            </div>
            <div class="catalog-product__details">
                <h1 class="catalog-product__name"><?php echo product_data($con,'product_name'); ?></h1>

                <div class="catalog-product__details-description">
                    <p><strong><?php echo product_data($con,'description'); ?></strong></p>
                </div>

                <div class="catalog-product__details-data">
                    <div class="catalog-product__details-price">
                        <p><?php echo product_data($con,'price'); ?> &euro;</p>
                    </div>
                </div>
                <div class="catalog-product__details-data">
                    <div class="catalog-product__details-ref">
                        <p><?php echo product_data($con,'ref'); ?></p>
                    </div>
                </div>
                <div class="catalog-product__details-data">
                    <div class="catalog-product__details-categories">
                        <ul>
                        <?php $categories = product_cats_data($con);
                        foreach ($categories as $category) {
                        ?>
                            <li class="catalog-product__category">
                                <a href="category.php?category_id=<?php echo $category['id']; ?>">
                                    <?php echo $category['cat_name']; ?>
                                </a>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                </div>

                <div class="catalog-product__details-addto">
                    <div id="product-options-wrapper" class="catalog-product__details-options">
                        <div class="catalog-product__details-addto-qty">
                            <label for="qty">Quantité :</label>
                            <input type="number" name="qty" id="qty" value="1" min="1" class="form-control js-inputnumber">
                        </div>
                        <div class="catalog-product__details-addto-cart">
                            <button type="submit" value="OK" name="submit" id="product-addtocart-button" class="btn btn--primary btn--lg">Ajouter au panier</button>
                        </div>
                    </div>
            </div>
        </div>
    </form>
</div>
<?php include("footer.php") ?>
