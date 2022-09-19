<?php
    session_start();
    require './User.php';
    require '../ProductsDB.php';

    if (empty($_SESSION['username'])) {
        header('Location: '.'../form.php');
    }

    $user = new User('localhost', 'root', '', 'shop');
    $productsDB = new ProductsDB('localhost', 'root', '', 'shop');
    $products = $productsDB->getAllProducts();
    $cart = json_decode($user->getCart($_SESSION['username'])['cart'], true);

    if (!empty($_POST['product'])) {
        for ($i = 0; $i < count($products); $i++) {
            if ($products[$i]['name'] == $_POST['product']) {
                array_push($cart, $products[$i]);
                $user->addToCart($_SESSION['username'], $cart);
                unset($_POST['product']);
                break;
            }
        }
    }

    // var_dump($cart);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>پنل خرید</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../header.css" />
        <link rel="stylesheet" href="./buy.css" />
    </head>
    <body class="container-fluid">
        <?php include('../header.php') ?>
        <div class="row">
            <div class="col-12" style="display: flex; flex-direction: row; justify-content: center; margin-top: 1rem;">
                <form method="POST" action="">
                    <div class="input-group mb-3" style="width: 40rem;">
                        <button class="btn btn-outline-success" type="submit" id="search-btn">اضافه کردن به سبد خرید</button>
                        <input name="product" list="products-list" class="form-control" placeholder="جست و جوی محصول" style="text-align: right;" aria-label="products's username" aria-describedby="search-btn" />
                        <datalist id="products-list">
                            <?php for($i = 0; $i < count($products); $i++): ?>
                                <option value='<?php echo $products[$i]['name'] ?>'>
                            <?php endfor; ?>
                        </datalist>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام محصول</th>
                        <th scope="col">قیمت هر عدد</th>
                    </tr>
                    <?php for($i = 0; $i < count($cart); $i++): ?>
                        <tr>
                            <td scope="row"><?php echo $i+1 ?></td>
                            <td><?php echo $cart[$i]['name'] ?></td>
                            <td><?php echo $cart[$i]['price'] ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
            <div class="col-12" style="text-align: right;">
                <form method="POST" action="final.php">
                    <input name="cart" type="hidden" value='<?php echo json_encode($cart) ?>' />
                    <button class="btn btn-success">پرداخت</button>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>