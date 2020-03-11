<?php
include "../configdb/db_connector.php";
$base = connect_to_db();
if (isset($_GET['event']) || !empty($_GET['event'])) {

    $event = $_GET['event'];

    switch ($event) {
        case 'add':
            $name = $_POST['name'];

            $requette = "INSERT INTO authors VALUES(null,'$name');";
            $rowInserted = $base->exec($requette);
            if ($rowInserted == 1) {
                header('location:../views/authors/allAuthor.php');
            } else {
                echo "SQL Error !";
            }
            break;

        case 'delete':
            $idCategory = $_GET['idCategory'];

            $requette = "delete from  authors where id=$idCategory;";
            $rowDeleted = $base->exec($requette);
            if ($rowDeleted == 1) {
                header('location:../views/authors/allAuthor.php');
            } else {
                echo "SQL Error !";
            }
            break;

        case 'edit':
            $id = $_GET['id'];
            $name = $_POST['name'];
            $requette = "update authors set name ='$name' where id=$id";
            $rowUpdated = $base->exec($requette);
            if ($rowUpdated == 1) {
                header('location:../views/authors/allAuthor.php');
            } else {
                echo "SQL Error !";
            }
            break;



        default:
            echo "<h1 style='color:red'>Invalid Action !</h1>";
            break;
    }
} else {
    echo "<h1 style='color:red'>You Are not allowed !</h1>";
}
