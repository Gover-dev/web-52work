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
    </div>
    <div class="panel_main">
    <form method="POST">
        <p>Имя: <input type="text" name="data_i" /></p>
        <input type="submit" value="Выбрать дату">
    </form>
        <?php
            require_once('data/db.php');
            $data_i = 0000-00-00;
            $data_i = $_POST['data_i'];

            $sql = "SELECT * FROM `smena` WHERE data_smena = '$data_i'";
            $result = mysqli_query($conn, $sql);
            $result2 = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo mysqli_fetch_assoc($result2)["data_smena"]."<br>";
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["fio_smena"] == null) {
                        print("null" . "<br>");
                    }else{
                        echo $row["fio_smena"]. "<br>";
                    };
                }
            } else {
                echo "0 результатов";
            }
            
            mysqli_close($conn);

        ?>
     </div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>