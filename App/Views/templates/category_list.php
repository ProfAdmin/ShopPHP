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
<h1>Categories</h1>
<div class="container text-left">
    <div class="row">
        <div class="col-6">
                <div class="mb-3">
                    <?php
                    foreach ($listCategories as $category) {
                        echo "<a href=\"/product/category?idCategory={$category->id}\" type=\"button\" class=\"btn btn-link\">{$category->name}</a>";
                    }
                    ?>
                    <a class="btn btn-primary" href="/" role="button">Go Home</a>
                </div>
        </div>
    </div>
</div>
</body>
</html>