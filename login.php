<?
    session_start(); 
    require_once('assets/data/db.php');

    if (isset($_POST['login']) && isset($_POST['password'])) {

        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
    
        $login = validate($_POST['login']);
        $pass = validate($_POST['password']);
    
        if (empty($login) || empty($pass)) {
            header("Location: index.php?error=Заполните все поля!");
            exit();
        }else{
            $sql = "SELECT * FROM `users` WHERE login='$login' AND password='$pass'";
    
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['login'] === $login && $row['password'] === $pass) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['login'] = $row['login'];
                    $_SESSION['fio'] = $row['fio'];
                    $_SESSION['dateofbirth'] = $row['dateofbirth'];
                    $_SESSION['pos'] = $row['position'];
                    $_SESSION['admin'] = $row['admin'];
                    
                    header("Location: main.php");
                    exit();
                }else{
                    header("Location: index.php?error=Неверное имя пользователя или пароль");
                    exit();
                }
            }else{
                header("Location: index.php?error=Неверное имя пользователя или пароль");
                exit();
            }
        }
        
    }else{
        header("Location: index.php");
        exit();
    }