<?php
    session_start();
    if ($_POST['set_smen_bool']){
        require('assets/data/db.php');
        $names = $_POST['get_smen_fio'];
        $date = $_POST['get_smen_date'];

        if ($_POST['get_smen_bool'] == 1){
            $sql_update = "UPDATE `smena` SET `accept_smen`='1' WHERE `data_smena` = '$date' and `fio_smena` = '$names'";
            mysqli_query($conn, $sql_update);

            mysqli_close($conn);
        } elseif ($_POST['get_smen_bool'] == 2) {
            $sql_update = "UPDATE `smena` SET `accept_smen`='2' WHERE `data_smena` = '$date' and `fio_smena` = '$names'";
            mysqli_query($conn, $sql_update);

            mysqli_close($conn);
        };

        header("Location: control_panel.php");
    };

    if($_POST['send_chat']){
        require('assets/data/db.php');


        $messenge = $_POST['send_chat_messenge'];
        $name = $_SESSION['fio'];
        $date = date("H:i") . " " . date("Y.m.d");

        echo $messenge;
        echo $name;

        $sql = "INSERT INTO `global_chat`(`message`, `name_send`, `date`) VALUES ('$messenge','$name', '$date')";
        mysqli_query($conn_chat, $sql);

        header("Location: chat.php");
    };

    if($_POST['set_smen']){
        require('assets/data/db.php');
        function add_user_smena($data, $names, $login) {
            require('assets/data/db.php');
    
            $sql_updaate = "SELECT `id` FROM `smena` WHERE `data_smena` = '$data' and `fio_smena` = ''";
            $result_update = mysqli_query($conn, $sql_updaate);
            $row = mysqli_fetch_assoc($result_update);

            echo $row['id'];
            $num_id = $row['id'];
            $sql_update = "UPDATE `smena` SET `fio_smena`= '$names', `login_user_smena`='$login' WHERE `data_smena` = '$data' and `id` = $num_id AND `fio_smena` = ''";
            mysqli_query($conn, $sql_update);

            header("Location: smen.php");

        };

        function del_user_smena($data, $names) {
            require('assets/data/db.php');
    
            $sql_update = "UPDATE `smena` SET `fio_smena`= '', `login_user_smena`='' WHERE `data_smena` = '$data' AND `fio_smena` = '$names'";
            mysqli_query($conn, $sql_update);

            header("Location: smen.php");

        };

        $fio = $_SESSION['fio'];
        $login = $_SESSION['login'];
        $data = $_SESSION['data_i'];

        echo $fio;
        echo $data;

        $sql_num = "SELECT * FROM `smena` WHERE `data_smena` = '$data' and `fio_smena` = '$fio' ";
        $result_num = mysqli_query($conn, $sql_num);
        $num_id = mysqli_num_rows($result_num);

        echo $num_id;

        if($num_id < 1){
            add_user_smena($data, $fio, $login);
        }else{
            del_user_smena($data, $fio);
        };

        mysqli_close($conn);
    };
    if($_POST['add_smen']){
        require('assets/data/db.php');
        $data = $_POST['add_smen_data'];
        $count = $_POST['add_smen_count'];

        for ($i = 1; $i <= $count; $i++) {
            echo $i . ' - '. $data. "<br>";
            $sql = "INSERT INTO `smena`(`id`, `data_smena`, `fio_smena`, `login_user_smena`, `accept_smen`) VALUES ('$i','$data','','', '0')";
            mysqli_query($conn, $sql);
        }

        header("Location: smen.php");
        mysqli_close($conn);

    };

?>