<?php session_start ();

require("manage_product.php");

update_product($con);

include("header.php");

?>

<div class="product">
    <div class="account-edit container">
            <form action="edit_product.php" method="post" id="create-account-form">
            <div class="account-block-container">
                <div class="account-block account-block--registered-users">
                    <h2 class="block-title">Editer un produit</h2>
                    <div class="form-group">
                        <label for="id" class="required">ID <em>*</em></label>
                        <input type="text" name="id" value="" id="id" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="product_name" class="required">Nom du produit</label>
                        <input type="text" name="product_name" value="" id="product_name" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="ref" class="required">Reference</label>
                        <input type="text" name="ref" value="" id="description" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="price" class="required">Prix</label>
                        <input type="number" name="price" value="" id="price" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="description" class="required">Description</label>
                        <input type="text" name="description" value="" id="description" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="url_img" class="required">URL de l'image</label>
                        <input type="text" name="url_img" value="" id="url_img" class="form-control required-entry">
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn--default" name="submit" value="OK">Editer le produit</button>
                        <span class="form-required">* Champs obligatoires</span>
                    </div>
                </div>
            </div>
            </form>
    </div>
</div>
<?php include("footer.php") ?>
