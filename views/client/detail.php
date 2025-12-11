<?php
$img = !empty($product['img'])
    ? BASE_ASSETS_UPLOADS . $product['img']
    : BASE_URL . 'assets/no-image.png';
function format_vietnamese_dong($amount) {
    return number_format($amount, 0, ',', '.') . ' VNĐ';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> - Chi Tiết Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image-container {
            max-width: 550px; 
            margin: auto;
        }
        .product-image {
            max-height: 600px;
            object-fit: contain; 
            background-color: #f8f9fa; 
        }
        .product-description {
            line-height: 1.8;
            font-size: 1.1rem; 
            white-space: pre-wrap; 
        }
        .price-display {
            font-size: 2.5rem;
        }
        .quantity-input {
            width: 100px !important;
            text-align: center;
            font-size: 1.1rem;
        }
        .product-image-container {
            max-width: 80%;   
            margin: auto;
        }

        .product-image {
            width: 80%;      
            max-height: 750px;
            object-fit: contain;
            background-color: #f8f9fa;
        }

    </style>
</head>
<body>

<div class="container mt-5 mb-5 p-4 border rounded-3 shadow-lg bg-white">
    <div class="row align-items-start gy-5">

        <div class="col-lg-5 col-md-6 text-center">
            <div class="product-image-container">
                <img src="<?= $img ?>"
                     class="img-fluid rounded-3 shadow-lg border product-image"
                     alt="<?= htmlspecialchars($product['name']) ?>">
            </div>
        </div>

        <div class="col-lg-7 col-md-6 ps-lg-5">
            <span class="badge bg-primary fs-6 mb-2">Sản phẩm mới</span>
            <h1 class="fw-bolder mb-3 display-5"><?= htmlspecialchars($product['name']) ?></h1>

            <h2 class="text-danger fw-bolder mb-3 price-display">
                <?= format_vietnamese_dong($product['price']) ?>
            </h2>

            <div class="mb-4">
                <span class="badge bg-success fs-5 p-2">
                     Còn hàng: **<?= $product['quantity'] ?>** sản phẩm
                </span>
            </div>

            <h4 class="fw-bold mt-4 mb-2">Mô tả sản phẩm:</h4>
            <p class="text-secondary product-description">
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </p>

            <hr class="my-4">

            <form action="<?= BASE_URL ?>?action=add-to-cart&id=<?= $product['id'] ?>" method="post">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <span class="fw-bold fs-5 text-dark">Số lượng:</span>
                    <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity'] ?>"
                           class="form-control quantity-input" required>
                </div>

                <div class="d-grid gap-3 d-md-flex mt-5">

                    <button type="submit"
                       class="btn btn-danger btn-xl rounded-pill px-5 py-3 shadow-lg text-uppercase fw-bold flex-grow-1">
                        🛒 Thêm vào giỏ hàng
                    </button>

                    <a href="<?= BASE_URL ?>"
                       class="btn btn-outline-secondary btn-xl rounded-pill px-5 py-3 flex-grow-1">
                        ⬅ Xem thêm sản phẩm khác
                    </a>

                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>