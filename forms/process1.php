<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $repeat_password = trim($_POST['repeat_password']);

    $name = htmlspecialchars($name);
    $password = htmlspecialchars($password);
    $repeat_password = htmlspecialchars($repeat_password);


    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имене допускается использовать только символы латинского алфавита и пробел";
    }
    
    if ($password != $repeat_password){
        $errors[]='Пароли не совпадают!';
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        
        print('<h1>Данные обработаны</h1>');
        print("Имя: {$name}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}