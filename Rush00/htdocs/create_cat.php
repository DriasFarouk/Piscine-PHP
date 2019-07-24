<?php session_start ();

require("manage_category.php");

create_category($con);

include("header.php");

?>

<div class="product">
    <div class="account-edit container">
        <form action="create_cat.php" method="post" id="create-account-form">
            <div class="account-block-container">
                <div class="account-block account-block--registered-users">
                    <h2 class="block-title">Creer une categorie</h2>
                    <div class="form-group">
                        <label for="product_name" class="required">Nom de la categorie <em>*</em></label>
                        <input type="text" name="cat_name" value="" id="cat_name" class="form-control required-entry">
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn--default" name="submit" value="OK">Editer la categorie</button>
                        <span class="form-required">* Champs obligatoires</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include("footer.php") ?>
