<?php
session_start();

$user_session = $_SESSION['login'];
$req2 = "SELECT role_admin FROM USERS WHERE login='$user_session'";
$users2 = return_req_result($con,$req2);
$role_session = $users2[0]['role_admin'];

function cats($con) {
    $id = $_GET['product_id'];
    $req = "SELECT cat_name, c.id FROM categories c ";
    $categories = return_req_result($con, $req);
    return ($categories);
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>42 Shoes</title>
<link rel="stylesheet" type="text/css" href="resources/style.css" media="all">
<link href="https://fonts.googleapis.com/css?family=Raleway:600,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:300,400,500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:200" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<header>
<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="cart.php">Panier</a></li>
        <?php if ($_SESSION['login'] != '') { ?>
        <li><a href="sales_user.php">Voir mes commandes</a></li>
        <li><a href="logout.php">Deconnexion</a></li>
        <?php } ?>
        <?php if ($_SESSION['login'] == '') { ?>
            <li><a href="login.php">Se connecter</a></li>
        <li><a href="create_account.php">Creer un compte</a></li>
        <?php } ?>
    </ul>
</nav>

<?php
if ($role_session == '1')
{
?>
    <nav>
        <ul>
            <li><a href="create_account.php">Creer un utilisateur</a></li>
            <li><a href="edit_account.php">Modifier un utilisateur</a></li>
            <li><a href="delete_user.php">Supprimer un utilisateur</a></li>
            <li><a href="create_product.php">Ajouter un produit</a></li>
            <li><a href="edit_product.php">Modifier un produit</a></li>
            <li><a href="delete_product.php">Supprimer un produit</a></li>
            <li><a href="create_cat.php">Ajouter une categorie</a></li>
            <li><a href="edit_cat.php">Modifier une categorie</a></li>
            <li><a href="delete_cat.php">Supprimer une categorie</a></li>
        </ul>
    </nav>

        <ul>
            <?php $categories = cats($con);
            foreach ($categories as $category) {
                ?>
                <li class="catalog-product__category">
                    <a href="category.php?category_id=<?php echo $category['id']; ?>">
                        <?php echo $category['cat_name']; ?>
                    </a>
                </li>
            <?php }?>
        </ul>

<?php }
?>
</header>
