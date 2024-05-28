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
          <div class="but_panel_active">
               <a class="but_panel_active" href="main.php">Домой</a>
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
                    echo '<div class="but_panel">';
                    echo '     <a class="but_panel" href="control_panel.php">Панель управления</a>';
                    echo '</div>';
               };
          ?>
     </div>
     <div class="center panel_main mw-100">
          <div class="organizations_panel">Организация</div>
          <div class="info_box_conteiner">
               <div class="info_box">
                    Смены
                    <?php
                         require('assets/data/db.php');

                         $fio_ = $_SESSION["fio"];
                         $date_ = date("Y-m-d");
                         $sql = "SELECT * FROM `smena` WHERE `fio_smena` = '$fio_' and `data_smena` = '$date_'";
                         $result = mysqli_query($conn, $sql); 
                         $row = mysqli_num_rows($result);

                         if ($row == 1){
                              echo '<h1 class="info_text_main" style="margin-top: 10px;">Сегодня</h1>';
                              echo '<h5 style="text-align: center;">8:30-20:30</h5>';
                         }else {
                              echo '<h1 class="info_text_main">Нету</h1>';
                         };
                         
                    ?>
               </div>
               <div class="info_box">
                    Штрафы
                    <h1 class="info_text_main" style="color: #F8BABA;">₽ 500.00 </h1>
               </div>
               <div class="info_box">
                    Счёт
                    <h1 class="info_text_main" style="color: #CDF8BA;">₽ 999.999.999 </h1>
               </div>
               <div class="info_but"><a href="smen.php"><img style="margin-top:10px; margin-right:10px;" src="/assets/icons/box-arrow-in-right.svg" alt="Bootstrap" width="32" height="32"></a></div>
               <div class="info_but"><a href="wallet.php"><img style="margin-top:10px; margin-right:10px;" src="/assets/icons/box-arrow-in-right.svg" alt="Bootstrap" width="32" height="32"></a></div>
               <div class="info_but"><a href="wallet.php"><img style="margin-top:10px; margin-right:10px;" src="/assets/icons/box-arrow-in-right.svg" alt="Bootstrap" width="32" height="32"></a></div>
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