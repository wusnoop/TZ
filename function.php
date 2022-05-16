<?php
include 'db.php';
session_start();

// Авторизация
if (isset($_POST['enter'])){
    $data = $pdo->query("SELECT * FROM users");
    foreach ($data as $user){
        if ($_POST['login'] == $user['login'] && $_POST['password'] == $user['password']){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['status'] = $user['status'];
            if ($_SESSION['status'] == 1){
                header('Location: admin.php');
            } else header("Location: moder.php");

        }
    }
}
@$getId = $_GET['id'];
// Добавление
if (isset($_POST['add'])){
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $text = htmlspecialchars($_POST['text']);
    $time = date("Y-m-d");
    $sql = ("INSERT INTO `application` (name,email,address,phone,date ,text,flag) VALUES (?,?,?,?,?,?,?)");
    $query = $pdo->prepare($sql);
    $query->execute([$name,$email,$address,$phone,$time,$text,0]);
    if ($query){
        header("Location: index.php");
    }
}


// Чтение
$sql = $pdo->prepare("SELECT * FROM application WHERE flag = 0");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);


//Редактирование
if (isset($_POST['edit'])) {
    $text = $_POST['text'];
    $sql = ("UPDATE application SET text=? WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$text, $getId]);
    if ($query) {
        header("Location: Admin.php");
    }
}

//Удаление
if  (isset($_POST['delete'])){
    $sql = ("UPDATE application SET flag = 1 WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$getId]);
    if ($query) {
        header("Location: Admin.php");
    }
}







