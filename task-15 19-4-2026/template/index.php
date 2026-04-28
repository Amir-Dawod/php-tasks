<?php
require 'classess/Product.php';
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f3f6;
        }

        .product-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .product-img {
            height: 220px;
            overflow: hidden;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.4s;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        .discount-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: white;
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
        }

        .product-body {
            padding: 18px;
        }

        .brand {
            font-size: 12px;
            color: #888;
        }

        .product-title {
            font-size: 16px;
            font-weight: 600;
            margin: 6px 0;
        }

        .product-desc {
            font-size: 13px;
            color: #666;
        }

        .price-old {
            text-decoration: line-through;
            color: #aaa;
            font-size: 13px;
        }

        .price-discount {
            color: #e53935;
            font-weight: bold;
        }

        .price-final {
            font-size: 18px;
            font-weight: bold;
            color: #2e7d32;
        }

        .btn-buy {
            border-radius: 30px;
            padding: 8px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row g-4">

            <?php foreach ($products as $product): ?>
                <!-- Product -->
                <div class="col-lg-4 col-md-6">
                    <div class="product-card">

                        <div class="discount-badge">-20%</div>

                        <div class="product-img">
                            <img src="<?= $product->image ?>">
                        </div>

                        <div class="product-body">

                            <div class="brand"><?= $product->brand ?></div>

                            <div class="product-title">
                               <?= $product->getName() ?>
                            </div>

                            <div class="product-desc">
                              <?= $product->description ?>
                            </div>

                            <div class="mt-3">

                                <div class="price-old"><?= $product->price ?></div>

                                <div class="price-discount">
                                    <?= $product->priceAfterDiscount(10) ?>
                                </div>

                                <div class="price-final">
                                 <?= $product->getFinalPrice() ?>
                                </div>

                            </div>

                            <button class="btn btn-dark w-100 mt-3 btn-buy">
                                🛒 أضف للسلة
                            </button>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        

        </div>
    </div>

</body>

</html>