<?php
session_start ();
require("manage_user.php");
user_connect($con);

include("header.php")
?>

<div class="login">
    <div class="account-login container">
            <form action="login.php" method="post" id="login-form">
            <div class="account-block-container">
                <div class="account-block account-block--registered-users">
                    <h2 class="block-title">Se connecter</h2>
                    <div class="form-group">
                        <label for="login" class="required">Identifiant <em>*</em></label>
                        <input type="text" name="login" value="" id="login" class="form-control required-entry validate-email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="required">Mot de passe <em>*</em></label>
                        <input type="password" name="passwd" class="form-control required-entry validate-password-short">
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn--primary" name="submit" value="OK">Me connecter</button>
                        <span class="form-required">* Champs obligatoires</span>
                    </div>
                </div>
                <div class="account-block account-block--new-users">
                    <h2 class="block-title">Pas encore de compte ?</h2>
                    <p>N'attendez plus ! Créez un compte pour consulter vos commandes</p>
                    <p><a title="Créer mon compte" href="create_account.php" class="btn btn--primary">Créer mon compte</a></p>
                    <p><a title="Continuer comme invité" class="btn btn--default">Continuer comme invité</a></p>
                </div>
            </div>
            </form>
    </div>
</div>
<?php include("footer.php") ?>
