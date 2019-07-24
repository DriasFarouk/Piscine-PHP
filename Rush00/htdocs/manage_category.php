<?php

//session_start();

include ('db.php');

function create_category($con)
{
    if($_POST['submit'] == "OK")
    {
    if ($_POST['cat_name'] != "")
    {
            $tmpname= $_POST['cat_name'];
            if ((return_req_result($con,"SELECT id FROM categories WHERE cat_name='$tmpname'")) == NULL)
            {
                test_input($category_name = $_POST['cat_name']);

                $req = "INSERT INTO CATEGORIES(cat_name)";
                $req .= "VALUES ('$category_name')";
                exeq_req($con, $req);
                echo "OK Category Created\n";
            }
            else
                echo "ERROR Category Already Exisit\n";
    }
    else
        echo "ERROR NAME is NULL !\n";
    }
}


function update_category($con)
{
    if($_POST['submit'] == "OK") {
    $cat_id = $_POST['id'];
    $id = "SELECT id FROM categories WHERE id='$cat_id'";
    $goodid = return_req_result($con,$id);
    $exactid =  $goodid[0]['id'];

    test_input($catname = $_POST['cat_name']);

    if($goodid != NULL)
    {
        if ($catname != "")
        {
            $req1="UPDATE categories SET cat_name = '$catname' WHERE ID = '$exactid'";
            exeq_req($con, $req1);
            echo "OK  Category Name Udapte !\n";
        }
    }
    else
        echo "ERROR ID WRONG !";
}
}

function remove_category($con)
{
    if($_POST['submit'] == "OK") {
        $id = $_POST['id'];
        $req1 = "SELECT id FROM categories WHERE id='$id'";
        $category = return_req_result($con, $req1);
        $id_category = $category[0]['id'];

        if ($id_category != NULL) {
            $req = "DELETE FROM categories WHERE ID = '$id_category'";
            exeq_req($con, $req);
            echo "Category DELETED !";
        } else
            echo "ERROR This Category already deleted\n";
    }
}

?>