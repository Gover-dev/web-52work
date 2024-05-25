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
        </div>
        <div class="panel_main center">
            <?php
                require('assets/data/db.php');
                $sql = "SELECT DISTINCT data_smena FROM `smena` ";
                $result = mysqli_query($conn, $sql);

                
                if ($result->num_rows > 0) {
                    // Вывод заголовков столбцов
                    echo "<form method='post'>";
                    echo "<select class='form-control' name='data_i'>";
                    while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['data_smena']."'>". $row['data_smena']. "</option>";
                    }
                    echo "</select>";
                    echo "<input class='btn col-md-4' type='submit' value='Выбарть'>";
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
                                echo "Пусто" . "<br>";
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
            <form action="set_smen.php" method="POST">
                <input class="btn col-md-4" type="submit" name="set_smen" value="Записаться">
            </form>
            <form action="set_smen.php" method="POST">
                <input class="btn col-md-4" type="submit" name="set_smen" value="Отписаться">
            </form>
            <form action="set_smen.php" method="POST">
                дата:
                <input class="btn col-md-4" type="text" name="add_smen_data" value="">
                кол-во
                <input class="btn col-md-4" type="text" name="add_smen_count" value="">
                <input class="btn col-md-4" type="submit" name="add_smen" value="Создать смену">
            </form>
        </div>
        <div>
            <h6 class="logout"><?php echo $_SESSION['fio']; ?></h6>
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </body>
    </html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>