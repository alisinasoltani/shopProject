<?php 
    require './ProductsDB.php';
    $db = new ProductsDB('localhost', 'root', '', 'shop');
    $products = $db->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>فروشگاه</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./index.css" />
        <link rel="stylesheet" href="./header.css" />
    </head>
    <body class="container-fluid">
        <?php include('./header.php') ?>
        <div class="row">
            <div class="col-12 search">
                <form method="GET" action="">
                    <div class="input-group mb-3" style="width: 40rem;">
                        <button class="btn btn-outline-secondary" type="submit" id="search-btn"><i class="fa fa-search"></i></button>
                        <input name="query" type="text" class="form-control" placeholder="جست و جوی محصول" style="text-align: right;" aria-label="products's username" aria-describedby="search-btn" />
                    </div>
                </form>
            </div>
        </div>
        <div class="row main">
            <div class="col-10 products">
                <?php for($i = 0; $i < count($products); $i++): ?>
                    <div class="col-4 product">
                        <div><img src=<?php echo $products[$i]['image'] ?> class="product-img" /></div>
                        <div class="product-name"><?php echo $products[$i]['name'] ?></div>
                        <div class="product-price">قیمت: <?php echo $products[$i]['price'] ?></div>
                        <div class="product-cores"><?php echo $products[$i]['cpu_cores'] ?> cores cpu </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="col-2 filters"></div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>