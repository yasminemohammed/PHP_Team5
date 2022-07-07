<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>create New product </h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'] ?>/admin/products" method="post" enctype="multipart/form-data">

    <label for="name"> name: </label>
    <input type="text" id="name" name="name">

    <br><br>

    <label for="price">price: </label>
    <input type="number" id="price" name="price">

    <br><br>

    <label for="categories">category: </label>
    <select id="categories" name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category->getId() ?> "><?= $category->getName() ?></option>
        <?php endforeach; ?>
    </select>

    <br><br>


    <label for="featureImage">Product picture: </label>
    <input type="file" id="featureImage" name="featureImage">

    <button type="submit">submit</button>
</form>
</body>
</html>
