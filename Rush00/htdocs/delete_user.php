<?php session_start ();

require("manage_user.php");

remove_user($con);

function user_data($con) {
    $req = "SELECT * FROM users";
    $users = return_req_result($con, $req);
    return ($users);
}
include("header.php");

?>

<form action="delete_user.php" method="post">
    <table class="cart-table table table--orders">
        <thead class="cart-table__thead">
        <tr class="cart-table__row">
            <th class="cart-table__cell cart-table__cell--product">Nom d'utilisateur</th>
            <th class="cart-table__cell cart-table__cell--delete"></th>
        </tr>
        </thead>
        <tbody class="cart-table__tbody">
        <?php $users = user_data($con);
        foreach ($users as $key => $user) { ?>
            <tr>
                <td class="cart-table__cell cart-table__cell--price"><?php echo $user['login']; ?></td>
                <td><button class="btn btn--primary" name="id" value="<?php echo $user['id']; ?>">Supprimer l'utilisateur</button></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</form>

<?php include("footer.php") ?>