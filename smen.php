<?php 
    session_start();

    if (isset($_SESSION['id']) && isset($_SESSION['login'])) {

?>

    <!DOCTYPE html>
    <html>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="assets/script/javascript.js"></script>

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
            <div class="but_panel_active">
                <a class="but_panel_active" href="smen.php">Смены</a>
            </div>
            <div class="w-100"></div>
            <div class="but_panel">
                <a class="but_panel" href="chat.php">Чат</a>
            </div>
            <div class="w-100"></div>
            <div class="but_panel">
                <a class="but_panel" href="wallet.php">Счёт</a>
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
            <div class="card card-body w-50 mx-auto p-2 w-50 p-3" style="background: #20242D;">
                <?php
                    require('assets/data/db.php');
                    $sql = "SELECT DISTINCT data_smena FROM `smena` ";
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result->num_rows > 0) {
                        // Вывод заголовков столбцов
                        echo "<form method='post'>";
                        echo "<select class='form-select form-select-lg mb-3 btn-dark' name='data_i'>";
                        while ($row = $result->fetch_assoc()) {
                        echo "<option class='btn-dark' value='".$row['data_smena']."'>". $row['data_smena']. "</option>";
                        }
                        echo "</select>";
                        echo "<input class='btn btn-dark' type='submit' value='Выбарть'>";
                        echo "</form>";
                        } else {
                        echo "0 results";
                    };
                    
                    $data_i = $_POST['data_i'];
                    $_SESSION['data_i'] = $data_i;

                    if(!$data_i == ""){

                        $sql = "SELECT * FROM `smena` WHERE data_smena = '$data_i'";
                        $result = mysqli_query($conn, $sql);
                        $result2 = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo mysqli_fetch_assoc($result2)["data_smena"]."<br>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row["fio_smena"] == null) {
                                    echo "<p>Пусто</p>";
                                }else{
                                    echo $row["fio_smena"]. "<br>";
                                };
                            }
                        } else {
                            #echo "0 результатов";
                        }
                            
                        mysqli_close($conn);
                    };

                ?>
                <?php
                        echo "<form action='set_smen.php' method='POST'>";
                        echo    "<input class='btn btn-dark' type='submit' name='set_smen' value='Записаться/Отписаться'>";
                        echo "</form>";

                    if ($_SESSION['admin'] == 1) {
                        echo '<form action="set_smen.php" method="POST">';
                        echo '    дата: <input class="form-control" type="text" name="add_smen_data" value="">';
                        echo '    кол-во: <input class="form-control" type="text" name="add_smen_count" value="">';
                        echo '    <input class="btn btn-dark" type="submit" name="add_smen" value="Создать смену">';
                        echo '</form>';
                    };
                ?>
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