<?php session_start ();

require("manage_category.php");

remove_category($con);

function categories($con) {
    $req = "SELECT * FROM categories";
    $categories = return_req_result($con, $req);
    return ($categories);
}

include("header.php");

?>

<form action="delete_cat.php" method="post">
    <table class="cart-table table table--orders">
        <thead class="cart-table__thead">
        <tr class="cart-table__row">
            <th class="cart-table__cell cart-table__cell--product">ID</th>
            <th class="cart-table__cell cart-table__cell--product">Nom de la categorie</th>
            <th class="cart-table__cell cart-table__cell--delete"></th>
        </tr>
        </thead>
        <tbody class="cart-table__tbody">
        <?php $categories = categories($con);
        foreach ($categories as $key => $category) { ?>
            <tr>
                <td class="cart-table__cell cart-table__cell--price"><?php echo $category['id']; ?></td>
                <td class="cart-table__cell cart-table__cell--price"><?php echo $category['cat_name']; ?></td>
                <td><button class="btn btn--primary" name="id" value="<?php echo $category['id']; ?>">Supprimer la categorie</button></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</form>
<?php include("footer.php") ?>
