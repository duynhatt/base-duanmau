<?php
$action = $_GET['action'] ?? '/';
match ($action) {
    '/'         => (new ProductController)->dashboad(),
      'list-product' => (new ProductController)->index(), // Hiển thị danh sách sản phẩm
    'delete-product' => (new ProductController)->delete(), // Xóa sản phẩm
    'show-product' => (new ProductController)->show(), // Hiển thị chi tiết sản phẩm
    'create-product' => (new ProductController)->create(), // Hiển thị form tạo mới sản phẩm
    'store-product' => (new ProductController)->store(), // Lưu sản phẩm vào CSDL
    'edit-product'=> (new ProductController)->edit(), // Hiển thị form cập nhật sản phẩm
    'update-product'=> (new ProductController)->update(), // Lưu thông tin sản phẩm cập nhật vào CSDL
    'list-category' => (new CategoryController)->list(), // Hiển thị danh sách danh mục
    'delete-category' => (new CategoryController)->delete(), // Xóa danh mục
    'show-category' => (new CategoryController)->show(), // Hiển thị chi tiết danh mục
    'create-category' => (new CategoryController)->create(), // Hiển thị form tạo mới danh mục
    'store-category' => (new CategoryController)->store(), // Lưu danh mục vào CSDL
    'edit-category'=> (new CategoryController)->edit(), // Hiển thị form cập nhật danh mục
    'update-category'=> (new CategoryController)->update(), // Lưu thông tin danh mục cập nhật vào CSDL
    'list-user' => (new UserController)->index(), // Hiển thị danh sách tài khoản
    'delete-user' => (new UserController)->delete(), // Xóa tài khoản
    'show-user' => (new UserController)->show(), // Hiển thị chi tiết
    'add-user' => (new UserController)->create(), // Hiển thị form tạo mới tài khoản
    'store-user' => (new UserController)->store(), // Lưu tài khoản vào CSDL
    'edit-user'=> (new UserController)->edit(), // Hiển thị form cập nhật tài khoản
    'update-user'=> (new UserController)->update(), // Lưu
   

};  