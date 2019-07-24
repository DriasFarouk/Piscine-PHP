<?php session_start ();

require("manage_user.php");

create_user($con);

include("header.php")
?>

<div class="login">
    <div class="account-creation container">
        <form action="create_account.php" method="post" id="create-account-form">
            <div class="account-block-container">
                <div class="account-block account-block--registered-users">
                    <h2 class="block-title">Créer mon compte</h2>
                    <div class="form-group">
                        <label for="email" class="required">Identifiant <em>*</em></label>
                        <input type="text" name="login" value="" id="login" class="form-control required-entry validate-email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="required">Mot de passe <em>*</em></label>
                        <input type="password" name="passwd" class="form-control required-entry validate-password-short">
                    </div>
                    <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="text" name="email" value="" id="email" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="required">Nom</label>
                        <input type="text" name="lastname" value="" id="lastname" class="form-control required-entry">
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="required">Prénom</label>
                        <input type="text" name="firstname" value="" id="firstname" class="form-control required-entry">
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn--default" name="submit" value="OK">Créer mon compte</button>
                        <span class="form-required">* Champs obligatoires</span>
                    </div>
                    <p><a title="Déjà un compte" href="login.php">> J'ai déjà un compte</a></p>
                </div>
            </div>
            </form>
    </div>
</div>
<?php include("footer.php") ?>
