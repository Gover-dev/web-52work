<?php
    function create_users($login, $pass, $fio, $date, $pos, $admin){
        require "assets/data/db.php";
        $sql = "SELECT `login` FROM `users` WHERE `login` = '$login'";
        $result = mysqli_query($conn, $sql);

        if ($admin == ''){
            $admin = 0;
        };

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


        create_users($login, $pass, $fio, $date, $pos, $admin);
    };

    if($_POST['update_users']){
        require "assets/data/db.php";
        $name_select = $_POST['update_names'];
        $new_posit = $_POST['update_position'];

        if (!$new_posit == '') {
            $sql_update = "UPDATE `users` SET `position`='$new_posit' WHERE `fio` = '$name_select' ";
            mysqli_query($conn, $sql_update);
        };
                            
        $new_pass = $_POST['update_pass'];
        if (!$new_pass == '') {
            $sql_update = "UPDATE `users` SET `password`='$new_pass' WHERE `fio` = '$name_select' ";
            mysqli_query($conn, $sql_update);
        } else {
            echo '222';
        }
        echo $name_select . ' - ' . $new_posit . ' - ' . $new_pass;

        header("Location: control_panel.php");
    };
?>