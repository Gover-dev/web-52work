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
        <div class="row">
            <div class="card col-sm-6 mb-3 mb-sm-0" style="background-color: #171820; color: #fff;">
                <div class="card-body">
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
                            <input class="form-check-input" type="checkbox" value="" name="admin_stat">
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
            </div>

            <div class="card col-sm-6 mb-3 mb-sm-0" style="background-color: #171820; color: #fff;">
                <div class="card-body">
                    <?php
                        require('assets/data/db.php');
                        $sql = "SELECT `fio`FROM `users`";
                        $result = mysqli_query($conn, $sql);
                        
                        if ($result->num_rows > 0) {
                            // Вывод заголовков столбцов
                            echo "<form method='post'>";
                            echo "<select class='form-select form-select-lg mb-3' name='names_user'>";
                            while ($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['fio']."'>". $row['fio']. "</option>";
                            }
                            echo "</select>";
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
                                if ($row["fio_smena"] == null) {
                                    echo '<h1>' . mysqli_fetch_assoc($result2)["fio"] . '</h1><br>';

                                    echo $row["login"]."<br>";
                                    echo $row["password"]."<br>";
                                    echo $row["dateofbirth"]."<br>";
                                    echo $row["position"]."<br>";
                                };
                            };
                                
                            mysqli_close($conn);
                        };
                    ?>
                </div>
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