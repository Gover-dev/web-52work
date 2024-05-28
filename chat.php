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
            <div class="but_panel_active">
                <a class="but_panel_active" href="chat.php">Чат</a>
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
            <div class="board_chat">
                <div class="global_chat">

                </div>

            </div>
            <div class="body_chat">
                <div class="box_chat" id="box_chat">
                    <?php
                        require('assets/data/db.php');
                        $sql= "SELECT * FROM `global_chat`";
                        $result=mysqli_query($conn_chat,$sql);
                        
                        while ($row=mysqli_fetch_assoc($result)) {
                            if ($row["name_send"] == $_SESSION["fio"]) {
                                echo '<div class="im_messege_date">' . $row["date"] . '</div>';
                                echo '<div class="im_messege">';
                                    echo "<h5 style='margin-right: 2%;'>" . $row["name_send"] . " " . "</h5>";
                                    echo  "<p style='margin-right: 2%;'>" . $row["message"] . '</p>';
                                echo '</div>';
                            } else {
                                echo '<div class="user_messege_date">' . $row["date"] . '</div>';
                                echo '<div class="user_messege">';
                                    echo "<h5 style='margin-left: 2%;'>" . $row["name_send"] . " " . $row["date"] . "</h5>";
                                    echo  "<p style='margin-left: 2%;'>" . $row["message"] . '</p>';
                                echo '</div>';
                            }
                        };
                    ?>
               </div>
               

                    <form action="set_smen.php" method="POST">
                    <input class="send_panel_chat" type="text" name="send_chat_messenge" value="">
                    <input class="send_but_chat" type="submit" name="send_chat" value="Создать смену">
                    </form>
               
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