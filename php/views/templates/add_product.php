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
<h2>Add product</h2>
<div class="container text-left">
    <div class="row">
        <div class="col-6">
            <?php if ($productId == ''): ?>
                <form action="/product/add" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="pictureURL" class="form-label">Picture URL</label>
                        <input type="text" class="form-control" id="pictureURL" name="picture">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" aria-label="Select category" id="category" name="category">
                            <?= $valueCategory; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add product</button>
                </form>
            <?php else: ?>

                <h3>Product added</h3>
                <div class="mb-3">
                    <a class="btn btn-primary" href="/product/add" role="button">Add Product</a>
                    <a class="btn btn-primary" href="/" role="button">Go Home</a>
                </div>

            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>
