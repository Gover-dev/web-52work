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
          <h6><?php echo $_SESSION['fio']; ?></h6>
          <a class="logout" href="logout.php">Logout</a>
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
     </div>
     <div class="panel_main">

     </div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>