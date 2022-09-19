<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>پنل ورود</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
        <link rel="stylesheet" href="./form.css" />
        <link rel="stylesheet" href="./header.css" />
    </head>
    <body class="container-fluid">
        <?php include('./header.php') ?>
        <div class="row login">
            <div class="col-12 login-form">
                <div class="title"><h1 class="h3">Logo</h1></div>
                <form method="POST" action="./user/index.php">
                    <div class="username-input">
                        <label for="username">نام کاربری:</label><br />
                        <input name="username" type="text" id="username" />
                    </div>
                    <div class="password-input">
                        <lable for="password">رمز عبور:</lable><br />
                        <input name="password" type="password" id="password" autocomplete="true" />
                    </div>
                    <button class="btn btn-info" type="submit">ورود</button>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>