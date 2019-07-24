<?php

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function connect_mysql_serveur()
    {
        $url =  'localhost';
        $user = 'root';
        $pass = '123456';
    
        $con = mysqli_connect($url, $user, $pass);
        if (!$con) 
            die(' Connexion serveur impossible : ' . mysqli_error());
        return ($con);
    }

    function connect_db($con)
    {
        $url =  'localhost';
        $user = 'root';
        $pass = '123456';
        $dbname = "rush";

        $con = mysqli_connect($host, $user, $pass, $dbname);
        if (!$con) 
            die(' Connexion db impossible : ' . mysqli_error());
        return ($con);
    }

    function exeq_req($con, $req)
    {
        if (!mysqli_query($con, $req))
            die('Error exec req : ' . mysqli_error($con));
    }

    function return_req_result($con, $req)
    {
        if (!mysqli_query($con, $req))
            die('Error exec req : ' . mysqli_error($con));
        $query = mysqli_query($con, $req);
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }

    $con = connect_mysql_serveur();
    $con = connect_db($con);
?>