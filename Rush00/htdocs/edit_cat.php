<?php session_start ();

require("manage_category.php");

update_category($con);

include("header.php");

?>

<div class="cat">
    <div class="account-edit container">
            <form action="edit_cat.php" method="post" id="create-account-form">
            <div class="account-block-container">
                <div class="account-block account-block--registered-users">
                    <h2 class="block-title">Editer une categorie</h2>
                    <div class="form-group">
                        <label for="id" class="required">ID <em>*</em></label>
                        <input type="text" name="id" value="" id="id" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="cat_name" class="required">Nom de la categorie</label>
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
