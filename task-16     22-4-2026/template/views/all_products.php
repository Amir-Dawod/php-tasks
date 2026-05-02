<?php
$model = new ProductModel();
$books = $model->getProductsWithType('books');
$babyCars = $model->getProductsWithType('babycars');
?>


    <h2 class="text-center mb-5">All Products</h2>

    <!-- ================= BOOKS ================= -->
    <section class="mb-5">
        <h4 class="mb-4">Books</h4>

        <?php if (!empty($books)): ?>
            <div class="row g-4 m-4">

                <?php foreach ($books as $book): ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">

                            <img src="./assets/uploads/<?= $book['imageName'] ?>" class="card-img-top">

                            <div class="card-body">
                                <h5 class="card-title"><?= $book['name'] ?></h5>

                                <p class="text-success fw-bold">Price :<?= $book['price'] ?>$</p>

                                <p class="mb-1">Writer: <?= $book['writer'] ?></p>

                                <div>
                                    <strong>Publishers:</strong>
                                    <ul class="mb-0">
                                        <?php $publishers = explode(",",$book['publishers']); ?> 
                                        <?php foreach ($publishers as $publisher): ?>
                                            <li><?= $publisher ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center  w-50 m-auto">
                        No books available
            </div>
            <?php endif; ?>
        </section>
        
        <!-- ================= BABY CARS ================= -->
    <section>
        <h4 class="mb-4">Baby Cars</h4>
        
        <?php if (!empty($babyCars)): ?>
            <div class="row g-4 m-4">
                
                <?php foreach ($babyCars as $babyCar): ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            
                            <img src="./assets/uploads/<?= $babyCar['imageName'] ?>" class="card-img-top">
                            
                            <div class="card-body">
                                <h5><?= $babyCar['name'] ?></h5>
                                
                                <p class="text-success fw-bold">Price : <?= $babyCar['price'] ?>$</p>
                                
                                <p>Age: <?= $babyCar['age'] ?></p>
                                <p>Weight: <?= $babyCar['weight'] ?>kg</p>
                                
                                <div>
                                    <strong>Materials:</strong>
                                    <ul class="mb-0">
                                        <?php $materials = explode(",",$babyCar['materials']); ?> 
                                        <?php foreach ($materials as $material): ?>
                                            <li><?= $material ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center w-50 m-auto">
                No baby cars available
            </div>
        <?php endif; ?>
    </section>
