<?php
    include 'net.php';
    if(isset($_GET['supprimerid'])){
        $id = $_GET['supprimerid'];

        $sql="delete from `admin_tableau` where id=$id";
        $result=mysqli_query($net,$sql);
        if ($result) {
            echo "Un utilisateur vient de supprimer";
            header('location:accueil.php');
        }else {
            die(mysqli_error($net)); 
        }
}



?>