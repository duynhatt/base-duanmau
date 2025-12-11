<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Home' ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>?action=main ?>"><b>Home</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="#"><b>Thống kê</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL_ADMIN ?>&action=list-category"><b>Quản lý danh mục</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL_ADMIN ?>&action=list-product"><b>Quản lý sản phẩm</b></a>  
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL_ADMIN ?>&action=list-user"><b>Quản lý tài khoản</b></a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Home admin' ?></h1>

        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_ADMIN . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>

