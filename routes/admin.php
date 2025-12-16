<?php
$action = $_GET['action'] ?? '/';
match ($action) {
    '/'         => (new ProductController)->dashboad(),
      'list-product' => (new ProductController)->index(), 
    'delete-product' => (new ProductController)->delete(),
    'show-product' => (new ProductController)->show(), 
    'create-product' => (new ProductController)->create(), 
    'store-product' => (new ProductController)->store(),
    'edit-product'=> (new ProductController)->edit(), 
    'update-product'=> (new ProductController)->update(), 
    'list-category' => (new CategoryController)->list(), 
    'delete-category' => (new CategoryController)->delete(), 
    'show-category' => (new CategoryController)->show(), 
    'create-category' => (new CategoryController)->create(), 
    'store-category' => (new CategoryController)->store(), 
    'edit-category'=> (new CategoryController)->edit(), 
    'update-category'=> (new CategoryController)->update(), 
    'list-user' => (new UserController)->index(), 
    'delete-user' => (new UserController)->delete(),
    'show-user' => (new UserController)->show(), 
    'add-user' => (new UserController)->create(), 
    'store-user' => (new UserController)->store(), 
    'edit-user'=> (new UserController)->edit(), 
    'update-user'=> (new UserController)->update(), 
   

};  