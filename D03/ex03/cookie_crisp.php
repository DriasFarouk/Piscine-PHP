<?php
    switch ($_GET['action'])
    {
        case "get" :
        {
            if (isset($_COOKIE[$_GET["name"]]))
                echo $_COOKIE[$_GET["name"]];
            break;
        } 
        case "set" :
        {
            setcookie($_GET["name"],$_GET["value"], time() + (86400 * 30), "/");
            break;
        }
        case "del" :
        {
             setcookie($_GET["name"],$_GET["value"], time() - (86400 * 30));
             break;
        }
    }
?>