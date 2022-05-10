<?php

include 'db.php';

$name = $_POST['name'];
$description = $_POST['description'];
$get_id = $_GET['id'];


//ADD
if (isset($_POST['add'])) {

    if (!move_uploaded_file($_FILES["file"]["tmp_name"], './img/categories/' . $_FILES["file"]["name"])) {
        echo "Не вдалося завантажити файл";
    }

    $sql = ("INSERT INTO `categories`(`Name`, `Description`, `Photo`) VALUES (?, ?, ?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $description, $_FILES['file']['name']]);

    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//READ
$sql = $pdo->prepare("SELECT `id`, `Name`, `Photo`, `Description` FROM `categories` ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);



//UPDATE
if (isset($_POST['edit'])) {
    if (strcasecmp($_FILES["file"]["tmp_name"], '') != 0) {
        
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], './img/categories/' . $_FILES["file"]["name"])) {
            echo "Не вдалося завантажити файл";
        }

        $sql = ("UPDATE `categories` SET Name=?,Description=?,Photo=? WHERE id=?");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $description, $_FILES['file']['name'], $get_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $sql = ("UPDATE `categories` SET Name=?,Description=? WHERE id=?");
        $query = $pdo->prepare($sql);
        $query->execute([$name, $description, $get_id]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}

//DELETE
if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM `categories` WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
