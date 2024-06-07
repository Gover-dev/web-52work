<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>login</title>
    <bgsound src="lost_angeles.wav">
</head>
<body>
    <form class="wrapper" action="login.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="center logo_from">
            <img src="assets/img/logo.png">
            <div class="w-100"></div>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 ">
            <input type="text" class="form-control" name="login" placeholder="Логин">
        </div>

        <div class="w-100"></div>
        <div class="mb-3 ">
            <input type="password" class="form-control" name="password" placeholder="Пароль">
        </div>

        <div class="w-100"></div>
        <div class="mb-3 center">
            <button type="submit" class="btn btn-dark w-50">Войти</button>
        </div>
    </form>
    
</body>
</html>