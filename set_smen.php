<?php
    session_start();

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
            echo "true";
            add_user_smena($data, $fio, $login);
        }else{
            header("Location: smen.php");
        };

        mysqli_close($conn);
    };
    if($_POST['add_smen']){
        require('assets/data/db.php');
        $data = $_POST['add_smen_data'];
        $count = $_POST['add_smen_count'];

        for ($i = 1; $i <= $count; $i++) {
            echo $i . ' - '. $data. "<br>";
            $sql = "INSERT INTO `smena`(`id`, `data_smena`, `fio_smena`, `login_user_smena`) VALUES ('$i','$data','','')";
            mysqli_query($conn, $sql);
        }

        header("Location: smen.php");
        mysqli_close($conn);

    };

?>