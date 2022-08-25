<!DOCTYPE html>
<html>
<head>
    <title>
        Main
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<h1><?= $nameCategory ?></h1>
<div class="container text-left">
    <div class="row">
        <div class="col-6">
                <div class="mb-3">
                    <?php
                    foreach ($listProduct as $product) {
                        echo "<a href=\"/product/view?idProduct={$product->id}\" type=\"button\" class=\"btn btn-link\">{$product->name}</a><br>";
                    }
                    ?>
                    <a class="btn btn-primary" href="/category/view" role="button">Go Categories</a>
                    <a class="btn btn-primary" href="/" role="button">Go Home</a>
                </div>
        </div>
    </div>
</div>
</body>
</html>