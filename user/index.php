<?php
    session_start();
    require './User.php';
    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $auth = new User('localhost', 'root', '', 'shop');
        if (!$auth->checkUsername($_POST['username']) || !$auth->checkPassword($_POST['username'], $_POST['password'])) {
            header('Location:'."../form.php");
        }
        $_SESSION['username'] = $_POST['username'];
    } else {
        header('Location:'."../form.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>پنل کاربری</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    </head>
    <body class="container-fluid" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div class="row" style="width: 300px;">
            <div class="col-12" style="direction: rtl; text-align: center;">
                <h1 class="h3">خوش اومدی <?php echo $_POST['username'] ?> !</h1>
            </div>
        </div>
        <div class="row" style="width: 300px; margin-top: 2rem;">
            <div class="col-12" style="direction: rtl; text-align: right;">
                <h4>خدمات: </h4>
                <a href="./buy.php">
                    <button class="btn btn-outline-success" style="margin-block: 0.8rem; padding: 1rem; font-weight: 600;">
                        خرید
                    </button>
                </a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>