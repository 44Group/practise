<?php

include 'db.php';

$name = $_POST['name'];
$description = $_POST['description'];
$id_category = $_POST['idCategory'];
$price =  $_POST['price'];
$get_id = $_GET['id'];


//ADD
if (isset($_POST['add'])) {
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], './img/products/' . $_FILES["file"]["name"])) {
        echo "Не вдалося завантажити файл";
    }

    $sql = ("INSERT INTO `products`( `Name`, `idCategory`, `Photo`, `Price`, `Description`) VALUES (?, ?, ?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $id_category, $_FILES['file']['name'], $price, $description]);

    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//READ
$sql = $pdo->prepare("SELECT products.id, products.Name, products.Photo, Price, products.Description, categories.Name as Category FROM products INNER JOIN categories ON products.idCategory = categories.id ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

$categorySql = $pdo->prepare("SELECT id, Name FROM categories");
$categorySql->execute();
$category = $categorySql->fetchAll(PDO::FETCH_OBJ);



//UPDATE
if (isset($_POST['edit'])) {

    if (strcasecmp($_FILES["file"]["tmp_name"], '') != 0) {
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], './img/products/' . $_FILES["file"]["name"])) {
            echo "Не вдалося завантажити файл";
        }

        $sql = ("UPDATE products SET Name=?, Description=?, IdCategory=?, Photo=?, Price=? WHERE id=?");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $description, $id_category, $_FILES['file']['name'], $price, $get_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $sql = ("UPDATE products SET Name=?, Description=?, IdCategory=?, Price=? WHERE id=?");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $description, $id_category, $price, $get_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}


//DELETE
if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM products WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
