<?php session_start();

require('db.php');

function create_user($con)
{
    if($_POST['submit'] == "OK")
    {
        if ($_POST['login'] != "" && $_POST['passwd'] != "")
        {
            $tmplogin= $_POST['login'];
            if ((return_req_result($con,"SELECT id FROM USERS WHERE login='$tmplogin'")) == NULL)
            {
                $login = $_POST['login'];
                $passwd = hash("whirlpool", $_POST['passwd']);
                $email = $_POST['email'];
                $lastname = $_POST['lastname'];
                $firstname = $_POST['firstname'];
                $req = "INSERT INTO USERS(login, passwd, email, lastname, firstname, role_admin) ";
                $req .= "VALUES ('".test_input($login)."', '".test_input($passwd)."', '".test_input($email)."', '".test_input($lastname)."', '".test_input($firstname)."', 0)";
                exeq_req($con, $req);
                header('Location: login.php');
            }
                else
                    echo "Erreur - Ce compte existe deja\n";
        }
        else
            echo "Erreur - Merci de saisir au moins un identifiant et un mot de passe\n";
    }
}

function user_connect($con)
{
    if($_POST['submit'] == "OK")
    {
        if ($_POST['login'] != "" && $_POST['passwd'] != "")
        {
            $passwd = hash('whirlpool', $_POST['passwd']);
            $user = $_POST['login'];
            $req = "SELECT passwd FROM USERS WHERE login='$user'";
            $userpw = return_req_result($con,$req);
            $pw_user =  $userpw[0]['passwd'];

          if($pw_user == '')
              echo "Erreur - Cet utilisateur n'existe pas.";

          else if($passwd == $pw_user)
          {
              $_SESSION['login'] = $_POST['login'];
              header('Location: index.php');
          }
          else
              echo "Erreur - Mot de passe incorrect.";
        }
        else
            echo "Erreur - Merci de saisir au moins un identifiant et un mot de passe\n";
    }

}

function update_user($con)
{
    $oldpw = hash('whirlpool', $_POST['oldpw']);
    $user_session = $_SESSION['login'];
    $req = "SELECT passwd FROM USERS WHERE login='$user_session'";
    $userpw = return_req_result($con,$req);
    $pw_user =  $userpw[0]['passwd'];

    test_input($newlastname = $_POST['lastname']);
    test_input($newfirstname = $_POST['firstname']);
    test_input($newemail = $_POST['email']);
    test_input($newpw = hash('whirlpool', $_POST['newpw']));

    if($_POST['submit'] == "OK") {
        if ($oldpw == $pw_user) {
            if ($newlastname != "") {
                $req1 = "UPDATE users SET lastname = '$newlastname' WHERE passwd = '$pw_user'";
                exeq_req($con, $req1);
                echo "Nouveau nom : $newlastname !\n";
            }
            if ($newfirstname != "") {
                $req1 = "UPDATE users SET firstname = '$newfirstname' WHERE passwd = '$pw_user'";
                exeq_req($con, $req1);
                echo "Nouveau prenom : $newfirstname !\n";
            }
            if ($newemail != "") {
                $req1 = "UPDATE users SET email = '$newemail' WHERE passwd = '$pw_user'";
                exeq_req($con, $req1);
                echo "Nouvel email : $newemail !\n";
            }
            if ($_POST['newpw'] != "") {
                $req1 = "UPDATE users SET passwd = '$newpw' WHERE passwd = '$pw_user'";
                exeq_req($con, $req1);
                echo "Votre mot de passe a ete change !\n";
            }
        } else
            echo "Erreur - Ancien mot de passe incorrect !";
    }
}

function remove_user($con)
{
$tmp = $_POST['id'];
$user_session = $_SESSION['login'];
$req1 = "SELECT id FROM USERS WHERE id='$tmp'";
$req2 = "SELECT role_admin FROM USERS WHERE login='$user_session'";
$users2 = return_req_result($con,$req2);
$users = return_req_result($con,$req1);
$id_user = $users[0]['id'];
$role_session = $users2[0]['role_admin'];
    if($_POST['submit'] == "OK") {

    if ($role_session == '1')
    {
        if(($_POST['id'] == $id_user))
        {
        $req = "DELETE FROM USERS WHERE ID = '$tmp'";
        exeq_req($con, $req);
        echo "Bravo, l'utilisateur a bien ete supprime !";
        }
        else
            echo "Erreur - Cet utilisateur a deja ete supprime\n";

    }
    else
        echo "Vous n'etes pas administrateur, partez d'ici !";
}
}

$con = connect_mysql_serveur();
$con = connect_db($con);
?>