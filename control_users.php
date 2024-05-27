<?php
    function create_users($login, $pass, $fio, $date, $pos, $admin){
        require "assets/data/db.php";
        $sql = "SELECT `login` FROM `users` WHERE `login` = '$login'";
        $result = mysqli_query($conn, $sql);

        if (empty($login) || empty($pass) || empty($fio) || empty($date) || empty($pos)) {
            header("Location: control_panel.php?error=Заполните все поля!");
            echo "Не все поля";
            exit();
        } else{
            if (!mysqli_num_rows($result) > 0) {
                echo "Пользователь зарегестрирован";
                $sql = "INSERT INTO `users`(`login`, `password`, `fio`, `dateofbirth`, `position`, `admin`) VALUES ('$login','$pass','$fio','$date','$pos','$admin')";
                echo $sql;
                mysqli_query($conn, $sql);
            } else {
                header("Location: control_panel.php?error=Такой логин уже использвуется!");
                echo "Логин есть";
                exit();
            };
        };
    };
    function edit_users(){
        require "assets/data/db.php";

    };

    if($_POST['add_users']){
        $login = $_POST['login'];
        $pass = $_POST['password'];
        $fio = $_POST['fio'];
        $date = $_POST['dateofbirth'];
        $pos = $_POST['position'];
        $admin = $_POST['admin_stat'];


        create_users($login, $pass, $fio, $date, $pos, '0');
    };
?>