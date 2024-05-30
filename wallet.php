<?php 
    session_start();

    if (isset($_SESSION['id']) && isset($_SESSION['login'])) {

?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>HOME</title>
    </head>
    <body>
        <div class="panel_but">
            <div class="w-100"></div>
            <div class="but_panel">
                <a class="but_panel" href="main.php">Домой</a>
            </div>
            <div class="w-100"></div>
            <div class="but_panel">
                <a class="but_panel" href="smen.php">Смены</a>
            </div>
            <div class="w-100"></div>
            <div class="but_panel">
                <a class="but_panel" href="chat.php">Чат</a>
            </div>
            <div class="w-100"></div>
            <div class="but_panel_active">
                <a class="but_panel_active" href="wallet.php">Счёт</a>
            </div>
            <?php
               if ($_SESSION['admin'] == 1) {
                    echo '<div class="w-100"></div>';
                    echo '<div class="but_panel">';
                    echo '     <a class="but_panel" href="control_panel.php">Панель управления</a>';
                    echo '</div>';
               };
            ?>
        </div>
        <div class="center panel_main mw-100">
            <div class="wallet_box">
               Счёт
               <h1 class="info_text_main" style="color: #CDF8BA;">₽ 
                    <?php 
                        require('assets/data/db.php');
                        $names = $_SESSION['fio'];

                        $sql = "SELECT * FROM `wallet` WHERE `names` = '$names'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                        echo $row['amount'];
                    ?>
                </h1>
            </div>
            <div class="wallet_box">
                <div class="name_fine">Штрафы</div>

                <h1 class="info_text_main amout_fine" style="color: #F8BABA;">₽ 
                    <?php 
                        require('assets/data/db.php');
                        $names = $_SESSION['fio'];

                        $sql = "SELECT SUM(`amount`) FROM `fine` WHERE `names` = '$names'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);

                       echo $row['SUM(`amount`)'];
                    ?>
                </h1>

                <div class="reason_fine" id="reason_fine" style="color: #F8BABA;">
                    <?php
                        $sql = "SELECT * FROM `fine` WHERE `names` = '$names'";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<p>' . $row["amount"] . '₽ - ' . $row["reason"] . '</p>';
                        };
                    ?>
                </div>         
            </div>

            <div class="box_days_worked">
                Отработка
                <form class="center" method='post'>
                    <select name='data_m' class="select_col">
                        <option value="01">Январь</option>
                        <option value="02">Февраль</option>
                        <option value="03">Март</option>
                        <option value="04">Апрель</option>
                        <option value="05">Май</option>
                        <option value="06">Июнь </option>
                        <option value="07">Июль </option>
                        <option value="08">Август </option>
                        <option value="09">Сентябрь </option>
                        <option value="10">Октябрь </option>
                        <option value="11">Ноябрь </option>
                        <option value="11">Декабрь</option>
                    </select>
                    <input class='btn btn-dark' type='submit' value='Выбарть'>
                </form>
                <div class="days_worked">
                    <?php
                        $data_m = $_POST['data_m'];
                        $sql = "SELECT * FROM `smena`";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $m = date('m', strtotime($row["data_smena"]));
                            if ($m == $data_m) {
                                if ($row["accept_smen"] == 0 ){
                                    if ($row["fio_smena"] == "$names"){
                                        $d = date('d', strtotime($row["data_smena"]));
                                        echo '<div class="days" >'. $d .'</div>';
                                    }else{
                                        $d = date('d', strtotime($row["data_smena"]));
                                        echo '<div class="days" style="background-color: #00000000;">'. $d .'</div>';
                                    }
                                }elseif ($row["accept_smen"] == 1 and $row["fio_smena"] == "$names") {
                                    $d = date('d', strtotime($row["data_smena"]));
                                    echo '<div class="days" style="background-color: #5aa942; border: 2px solid #00000000;">' . $d . '</div>';
                                } elseif($row["accept_smen"] == 2 and $row["fio_smena"] == "$names"){
                                    $d = date('d', strtotime($row["data_smena"]));
                                    echo '<div class="days" style="background-color: #A94442; border: 2px solid #00000000;">' . $d . '</div>';
                                };
                            };
                        };
                    ?>
                </div>
            </div>
        </div>
        
        <div class="logout">
            <h6 style="display:inline;" ><?php echo $_SESSION['fio']; ?></h6>
            <a class="but_logout" href="logout.php"><img src="/assets/icons/door-closed.svg" alt="Bootstrap" width="32" height="32"></i></a>
        </div>
    </body>
    </html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>