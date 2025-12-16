<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title ?? 'Trang chủ') ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <div class="d-flex align-items-center gap-4">
            <!-- Nội dung bên trái -->
            <div class="d-flex align-items-center">
                <a href="<?= BASE_URL ?>" class="navbar-brand">
                    <img src="<?= BASE_ASSETS_UPLOADS . 'products/logo.png' ?>" alt="" width="150" height="150">
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
    
    <!-- Nội dung -->
    <div class="container">
       <!-- SLIDESHOW -->
<div id="slideHome" class="carousel slide home-slider mt-3" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#slideHome" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#slideHome" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#slideHome" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= BASE_ASSETS_UPLOADS . 'products/2.png' ?>" class="slide-img">
        </div>
        <div class="carousel-item">
            <img src="<?= BASE_ASSETS_UPLOADS . 'products/1.png' ?>" class="slide-img">
        </div>
        <div class="carousel-item">
            <img src="<?= BASE_ASSETS_UPLOADS . 'products/3.png' ?>" class="slide-img">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#slideHome" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#slideHome" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<style>
    .home-slider {
        border-radius: 15px;
        overflow: hidden;
    }
    .slide-img {
        width: 100%;
        height: 350px;              
        object-fit: cover;           
    }
</style>


        <!-- Hết slide -->
        <!-- Khu vực sản phẩm -->
        <h3 class="mt-3">Sản phẩm mới</h3>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <?php $img = !empty($product['image']) ? BASE_ASSETS_UPLOADS . $product['image'] : BASE_URL . 'assets/no-image.png'; ?>
                    <div class="col-3">
                        <div class="border rounded mb-4">
                            <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                                <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="mw-100 mh-100">
                            </div>
                            <!-- Hiển thị nội dung sản phẩm -->
                            <div class="p-2 d-flex align-items-center justify-content-around">
                                <div>
                                    <h5><?= htmlspecialchars($product['name']) ?></h5>
                                    <span class="fw-bold"> <?= number_format($product['price']) ?> </span>
                                </div>
                                <a href="index.php?controller=home&action=detail&id=<?= $product['id'] ?>" class="btn btn-danger">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- giữ cấu trúc mẫu nếu không có dữ liệu -->
                <div class="col-3">
                    <div class="border rounded mb-4">
                        <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                            <img src="<?= BASE_ASSETS_UPLOADS . 'products/san-pham_ao-blazer-01.webp' ?>" alt="" class="mw-100 mh-100">
                        </div>
                        <div class="p-2 d-flex align-items-center justify-content-around">
                            <div>
                                <h5>Tên sản phẩm 01</h5>
                                <span class="fw-bold"> 100.000 </span>
                            </div>
                            <a href="<?= BASE_URL ?>?action=detail&id=<?= $product['id'] ?>" class="btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <h3 class="mt-3">được yêu thích nhất</h3>
        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <?php $img = !empty($product['image']) ? BASE_ASSETS_UPLOADS . $product['image'] : BASE_URL . 'assets/no-image.png'; ?>
                    <div class="col-3">
                        <div class="border rounded mb-4">
                            <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                                <img src="<?= $img ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="mw-100 mh-100">
                            </div>
                            <!-- Hiển thị nội dung sản phẩm -->
                            <div class="p-2 d-flex align-items-center justify-content-around">
                                <div>
                                    <h5><?= htmlspecialchars($product['name']) ?></h5>
                                    <span class="fw-bold"> <?= number_format($product['price']) ?> </span>
                                </div>
                                <a href="index.php?controller=home&action=detail&id=<?= $product['id'] ?>" class="btn btn-danger">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- giữ cấu trúc mẫu nếu không có dữ liệu -->
                <div class="col-3">
                    <div class="border rounded mb-4">
                        <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                            <img src="<?= BASE_ASSETS_UPLOADS . 'products/san-pham_ao-blazer-01.webp' ?>" alt="" class="mw-100 mh-100">
                        </div>
                        <div class="p-2 d-flex align-items-center justify-content-around">
                            <div>
                                <h5>Tên sản phẩm 01</h5>
                                <span class="fw-bold"> 100.000 </span>
                            </div>
                            <a href="<?= BASE_URL ?>?action=detail&id=<?= $product['id'] ?>" class="btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <!-- Hết nội dung -->
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
