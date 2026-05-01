<?php
$model = new ProductModel();
$products = $model->getAllProducts();

?>

<h2>All Products</h2>


<?php if (!empty($products)):  ?>
    <div class="products">
        <?php foreach ($products as $product) : ?>

            <div class="card">
                <img src="./assets/uploads/<?= $product['imageName'] ?>" alt="Book">

                <div class="type"> <?= $product['type'] == "book" ? "📚 Book " : "🚗 Baby Car" ?></div>

                <h3><?= $product['name'] ?></h3>

                <div class="price"><?= $product['price'] ?></div>
                <?php if ($product['type'] == "book") : ?>
                    <div class="extra">Writer: <?= $product['writer'] ?></div>
                    <div class="extra">Publisher:
                        <ul>
                            <?php $publishers = explode(",", $product['publishers'])  ?>

                            <?php foreach ($publishers as $key => $publisher): ?>
                                <li><?= $publisher ?></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                <?php else: ?>
                    <div class="extra">Age: <?= $product['age'] ?></div>
                    <div class="extra">Weight: <?= $product['weight'] ?>kg</div>
                    <div class="extra">Material:
                        <ul>
                            <?php $materials = explode(",", $product['materials'])  ?>
                            <?php foreach ($materials as $material): ?>
                                <li><?= $material ?></li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>

    <div class="d-flex justify-content-center">
        <div class="alert alert-warning w-50 text-center">
            No products available
        </div>
    </div>
<?php endif; ?>


</body>

</html>
