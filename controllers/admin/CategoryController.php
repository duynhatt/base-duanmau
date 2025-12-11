<?php
class CategoryController {
    public $modelCategory;
    public function __construct(){
        $this->modelCategory = new Category();
    }
    public function list(){
        // admin list view (use index.php in views/admin/category)
        $view = 'category/index';
        $title = 'Danh sách danh mục';
        $categories = $this->modelCategory->getAllCategories();
        require_once PATH_VIEW_MAIN_ADMIN;
    }
    public function create()
    {
        $title = 'Tạo danh mục';
        $view = 'category/create';
        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function store()
    {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $errors = [];
        $old = ['name' => $name, 'description' => $description];

        if ($name === '') {
            $errors['name'] = 'Tên danh mục là bắt buộc.';
        }

        // optional: limit length
        if (strlen($name) > 255) {
            $errors['name'] = 'Tên danh mục không được quá 255 ký tự.';
        }

        if (!empty($errors)) {
            $title = 'Tạo danh mục';
            $view = 'category/create';
            require_once PATH_VIEW_MAIN_ADMIN;
            return;
        }

        $this->modelCategory->create(['name' => $name, 'description' => $description]);
        header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
        exit;
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
            exit;
        }
        $category = $this->modelCategory->find($id);
        if (!$category) {
            header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
            exit;
        }
        $title = 'Sửa danh mục';
        $view = 'category/edit';
        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function update()
    {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $errors = [];
        if ($id <= 0) {
            header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
            exit;
        }
        if ($name === '') {
            $errors['name'] = 'Tên danh mục là bắt buộc.';
        }
        if (!empty($errors)) {
            $category = ['id' => $id, 'name' => $name, 'description' => $description];
            $title = 'Sửa danh mục';
            $view = 'category/edit';
            require_once PATH_VIEW_MAIN_ADMIN;
            return;
        }
        $this->modelCategory->update($id, ['name' => $name, 'description' => $description]);
        header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
        exit;
    }

    public function delete()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $this->modelCategory->delete($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
        exit;
    }

    // Hiển thị danh mục và các sản phẩm thuộc danh mục (admin)
    public function show()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
            exit;
        }

        $category = $this->modelCategory->find($id);
        if (!$category) {
            header('Location: ' . BASE_URL_ADMIN . '&action=list-category');
            exit;
        }

        // Lấy sản phẩm theo danh mục
        $productModel = new Product();
        $products = $productModel->getByCategory($id);

        $title = 'Danh mục: ' . ($category['name'] ?? '');
        $view = 'category/show';
        require_once PATH_VIEW_MAIN_ADMIN;
    }
}
