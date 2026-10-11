<?php
include 'db.php';

if(!isset($_SESSION["id"])){
    header("location:login.php");
}


if($_SERVER["REQUEST_METHOD"]==="GET"){
    $id = $_GET["id"];

    $sql = $conn -> prepare("delete from products where id=?");
    $sql -> bind_param("i",$id);
    if($sql -> execute()){
        header("Location:dashboard.php");
    }
}
?>


