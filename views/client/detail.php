
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
            .stars {
        display: flex;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }
    .stars .star.selected {
        color: gold;
    }
    .comment {
        border-bottom: 1px solid #ddd;
        padding: 8px 0;
    }
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
      <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <div class="d-flex align-items-center gap-4">
            <!-- Nội dung bên trái -->
            <div class="d-flex align-items-center">
                <a href="<?= BASE_URL ?>" class="navbar-brand">
                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/logo.png' ?>" alt="" width="200" height="200">
                </a>
                <ul class="navbar-nav">
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $cate): ?>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>?action=category&id=<?= $cate['id'] ?>" class="nav-link"><?= htmlspecialchars($cate['name']) ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link">Danh mục 1</a></li>
                        <li class="nav-item"><a class="nav-link">Danh mục 2</a></li>
                    <?php endif; ?>
                </ul>
            </div>






            <!-- Nội dung bên phải -->
            <div>
                 <ul class="navbar-nav">
                     <?php if (!empty($_SESSION['admin'])): ?>
                        
                            <a href="<?= BASE_URL ?>?mode=admin" class="nav-link text-success"> Trang quản trị</a>
                        <?php endif; ?>

                        </li>
                    <?php if (!empty($_SESSION['user'])): ?>
                        <!--  ĐÃ ĐĂNG NHẬP -->
                        <li class="nav-item">
                            <span class="nav-link text-primary fw-bold">
                                <?= htmlspecialchars($_SESSION['user']['name']) ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=logout" class="nav-link">Đăng xuất</a>
                        </li>
                    <?php else: ?>
                        <!--  CHƯA ĐĂNG NHẬP -->
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=login" class="nav-link">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=register" class="nav-link">Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>  
        </div>
    </nav>
</head>
<body>

<div class="container mt-5 mb-5 p-4 border rounded-3 shadow-lg bg-white">
    <div class="row align-items-start gy-5">

        <div class="">
            <div class="product-image-container">
                <img src="<?= $img ?>"
                     class="img-fluid rounded-3 shadow-lg border product-image"
                     alt="<?= htmlspecialchars($product['name']) ?>">
            </div>
        </div>

        <div class="col-lg-7 col-md-6 ps-lg-5">
            <h1 class="fw-bolder mb-3 display-5"><?= htmlspecialchars($product['name']) ?></h1>
            <h2 class="text-danger fw-bolder mb-3 price-display">Giá:
                <?= format_vietnamese_dong($product['price']) ?>
            </h2>

            <div class="mb-4">
                <span >
                     Còn hàng:<?= $product['quantity'] ?>
                </span>
            </div>

            <h4 class="fw-bold mt-4 mb-2">Mô tả:</h4>
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
                       class="btn btn-danger btn-sm">
                         Thêm vào giỏ hàng
                    </button>

                    <a href="<?= BASE_URL ?>"
                       class="btn btn-warning btn-sm text-white">
                         Xem thêm sản phẩm khác
                    </a>

                </div>
            </form>

        </div>
  <h2>Đánh giá sản phẩm</h2>
<div id="star-container" class="stars">
    <span class="star" data-value="1">★</span>
    <span class="star" data-value="2">★</span>
    <span class="star" data-value="3">★</span>
    <span class="star" data-value="4">★</span>
    <span class="star" data-value="5">★</span>
</div>

<textarea id="comment" placeholder="Nhập bình luận..."></textarea><br>
<button onclick="addReview()">Gửi đánh giá</button>

<hr>

<h3>Danh sách đánh giá</h3>
<div id="review-list"></div>


<script>
// 🔥 Lấy product_id (ví dụ lấy từ URL)
let product_id = 123; 
let storageKey = "reviews_" + product_id;

// ⭐ chọn sao
let stars = document.querySelectorAll(".star");
let selectedRating = 0;

stars.forEach(star => {
    star.addEventListener("click", function() {
        selectedRating = this.dataset.value;
        highlightStars(selectedRating);
    });
});

function highlightStars(rating) {
    stars.forEach(star => {
        star.classList.remove("selected");
        if (star.dataset.value <= rating) {
            star.classList.add("selected");
        }
    });
}

// 📌 Gửi đánh giá (lưu LocalStorage)
function addReview() {
    if (selectedRating === 0) {
        alert("Bạn chưa chọn số sao!");
        return;
    }

    let comment = document.getElementById("comment").value.trim();
    if (comment === "") {
        alert("Vui lòng nhập bình luận!");
        return;
    }

    let reviews = JSON.parse(localStorage.getItem(storageKey)) || [];

    reviews.push({
        rating: selectedRating,
        content: comment,
        time: new Date().toLocaleString()
    });

    localStorage.setItem(storageKey, JSON.stringify(reviews));

    document.getElementById("comment").value = "";
    selectedRating = 0;
    highlightStars(0);

    loadReviews();
}

// 📌 Load danh sách đánh giá
function loadReviews() {
    let list = JSON.parse(localStorage.getItem(storageKey)) || [];
    let html = "";

    list.forEach(r => {
        html += `
        <div class="comment">
            <div>⭐ ${r.rating} / 5</div>
            <div>${r.content}</div>
            <small>${r.time}</small>
        </div>`;
    });

    document.getElementById("review-list").innerHTML = html;
}

// Load khi mở trang
loadReviews();
</script>

    </div>
</div>
      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


































<footer style="background:#111; color:#ddd; padding:40px 0; font-family:sans-serif;">
    <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; gap:40px; justify-content:space-between;">

        <!-- Cột 1: Giới thiệu -->
        <div style="flex:1; min-width:240px;">
            <h3 style="color:#fff;">ElectroTech</h3>
            <p>ElectroTech chuyên cung cấp các sản phẩm điện tử chính hãng: laptop, điện thoại, PC, linh kiện, phụ kiện... với giá tốt nhất.</p>
        </div>

        <!-- Cột 2: Danh mục -->
        <div style="flex:1; min-width:200px;">
            <h4 style="color:#fff;">Danh mục</h4>
            <ul style="list-style:none; padding:0; line-height:1.8;">
                <li><a href="#" style="color:#aaa; text-decoration:none;">Laptop</a></li>
                <li><a href="#" style="color:#aaa; text-decoration:none;">Điện thoại</a></li>
                <li><a href="#" style="color:#aaa; text-decoration:none;">Máy tính bàn</a></li>
                <li><a href="#" style="color:#aaa; text-decoration:none;">Linh kiện</a></li>
                <li><a href="#" style="color:#aaa; text-decoration:none;">Phụ kiện</a></li>
            </ul>
        </div>

        <!-- Cột 3: Hỗ trợ -->
        <div style="flex:1; min-width:200px;">
            <h4 style="color:#fff;">Hỗ trợ</h4>
            <ul style="list-style:none; padding:0; line-height:1.8;">
                <li><a href="#" style="color:#aaa; text-decoration:none;">Chính sách bảo hành</a></li>
                <li><a href="#" style="color:#aaa; text-decoration:none;">Hướng dẫn mua hàng</a></li>
                <li><a href="#" style="color:#aaa; text-decoration:none;">Thanh toán & vận chuyển</a></li>
                <li><a href="#" style="color:#aaa; text-decoration:none;">Liên hệ</a></li>
            </ul>
        </div>

        <!-- Cột 4: Thông tin liên hệ -->
        <div style="flex:1; min-width:240px;">
            <h4 style="color:#fff;">Liên hệ</h4>
            <p>📍 123 Nguyễn Văn Linh, TP. HCM</p>
            <p>📞 0123 456 789</p>
            <p>✉ support@electrotech.com</p>
            <p>🌐 electrotech.vn</p>
        </div>

    </div>

    <div style="text-align:center; margin-top:30px; color:#888; font-size:14px;">
        © 2025 ElectroTech. All rights reserved.
    </div>
</footer>
</html>