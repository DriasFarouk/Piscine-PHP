<?php session_start ();

require("manage_user.php");

update_user($con);

include("header.php");

?>

<div class="login">
    <div class="account-edit container">
            <form action="edit_account.php" method="post" id="create-account-form">
            <div class="account-block-container">
                <div class="account-block account-block--registered-users">
                    <h2 class="block-title">Editer mon compte</h2>
                    <div class="form-group">
                        <label for="lastname" class="required">Nom</label>
                        <input type="text" name="lastname" value="" id="lastname" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="required">Prénom</label>
                        <input type="text" name="firstname" value="" id="firstname" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="text" name="email" value="" id="email" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="oldpw" class="required">Ancien mot de passe <em>*</em></label>
                        <input type="password" name="oldpw" class="form-control required-entry validate-password-short">
                    </div>
                    <div class="form-group">
                        <label for="newpw" class="required">Nouveau mot de passe</label>
                        <input type="password" name="newpw" class="form-control required-entry validate-password-short">
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn--default" name="submit" value="OK">Créer mon compte</button>
                        <span class="form-required">* Champs obligatoires</span>
                    </div>
                </div>
            </div>
            </form>
    </div>
</div>
<?php include("footer.php") ?>
