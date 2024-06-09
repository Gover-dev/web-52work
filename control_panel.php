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
          <div class="but_panel">
               <a class="but_panel" href="wallet.php">Счёт</a>
          </div>
          <?php
               if ($_SESSION['admin'] == 1) {
                    echo '<div class="w-100"></div>';
                    echo '<div class="but_panel_active">';
                    echo '     <a class="but_panel_active" href="control_panel.php">Панель управления</a>';
                    echo '</div>';
               };
          ?>
     </div>
     <div class="panel_main">
            <div class="control_box" style="background-color: #171820; color: #fff;">
                Регистрация сотрудника
                    <form action="control_users.php" method="post">
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <div class="w-100"></div>
                        <div class="mb-3 ">
                            <input type="text" class="form-control" name="login" placeholder="Логин">
                        </div>

                        <div class="w-100"></div>
                        <div class="mb-3 ">
                            <input type="password" class="form-control" name="password" placeholder="Пароль">
                        </div>

                        <div class="w-100"></div>
                        <div class="mb-3 ">
                            <input type="text" class="form-control" name="fio" placeholder="ФИО">
                        </div>

                        <div class="w-100"></div>
                        <div class="mb-3 ">
                            <input type="text" class="form-control" name="dateofbirth" placeholder="Дата рождения">
                        </div>

                        <div class="w-100"></div>
                        <div class="mb-3 ">
                            <input type="text" class="form-control" name="position" placeholder="Должность">
                        </div>

                        <div class="w-100"></div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="admin_stat">
                            <label class="form-check-label" for="flexCheckDefault">
                                Привилегия Admin
                            </label>
                        </div>

                        <div class="w-100"></div>
                        <div class="mb-3 center">
                            <input class="btn btn-dark" type="submit" name="add_users" value="Зарегестрировать пользователя">
                        </div>
                    </form>
            </div>

            <div class="control_box" style="background-color: #171820; color: #fff;">
                Сотрудники
                    <?php
                        require('assets/data/db.php');
                        $sql = "SELECT `fio`FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        
                        if ($result->num_rows > 0) {
                            // Вывод заголовков столбцов
                            echo "<form method='post'>";
                            echo "<input class='btn btn-dark' type='text' name='names_user' >";
                            echo "<input class='btn btn-dark' type='submit' value='Выбарть'>";
                            echo "</form>";
                            } else {
                            echo "0 results";
                        };

                        $name_select = $_POST['names_user'];

                        if(!$name_select == ""){

                            $sql = "SELECT * FROM `users` WHERE fio = '$name_select'";
                            $result = mysqli_query($conn, $sql);
                            $result2 = mysqli_query($conn, $sql);
    
                            while ($row = mysqli_fetch_assoc($result)) {
                                
                                echo '<h1>' . mysqli_fetch_assoc($result2)["fio"] . '</h1><br>';

                                echo $row["login"]."<br>";
                                echo $row["password"]."<br>";
                                echo $row["dateofbirth"]."<br>";
                                echo $row["position"]."<br>";
                                
                            };

                            echo "<form action='control_users.php' method='post'>";
                            echo "<input type='hidden' name='update_names' value='" . $name_select . "'>";
                            echo "Пароль: <input class='btn btn-dark' type='text' name='update_pass' >";
                            echo "Должность: <input class='btn btn-dark' type='text' name='update_position' >";
                            echo "<input class='btn btn-dark' type='submit' name ='update_users' value='Обновить'>";
                            echo "</form>";
                                
                            mysqli_close($conn);
                        };
                    ?>
            </div>
            <div class="control_box" style="background-color: #171820; color: #fff;">
                Смена
                <?php
                    require('assets/data/db.php');
                    $sql = "SELECT DISTINCT data_smena FROM `smena` ";
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result->num_rows > 0) {
                        // Вывод заголовков столбцов
                        echo "<form method='post'>";
                        echo "<select class='form-select form-select-lg mb-3 btn-dark' name='data_i' style='background-color: #171820; color: #fff;'>";
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
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (!$row["fio_smena"] == null) {
                                    $date = $row["data_smena"];
                                    $names = $row["fio_smena"];

    
                                    echo $row["fio_smena"]. "<br>";
                                    echo "<form action='set_smen.php' method='post'>";
                                        echo "<input type='hidden' name='get_smen_fio' value='" . $names . "'>";
                                        echo "<input type='hidden' name='get_smen_date' value='" . $date . "'>";
                                        echo "<select class='' name='get_smen_bool'>";
                                        echo "<option value='1'>Пришел</option>";
                                        echo "<option value='2'>Не пришел</option>";
                                        echo "</select>";
                                        echo "<input class='btn btn-dark' type='submit' name='set_smen_bool' value='Потвердить'>";
                                    echo "</form>";
                                };
                            };
                        };
                            
                        mysqli_close($conn);
                    };

                ?>
            </div>
            <div class="control_box" style="background-color: #171820; color: #fff;">
                Создания списка смены
                <?php
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