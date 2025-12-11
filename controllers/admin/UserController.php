<?php
class UserController
{
    public $modelUser;

    public function __construct(){
        $this->modelUser = new User();
    }

    
    public function dashboad() {
        $title = 'Quản lý tài khoản';
        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function index() {
        $view = 'user/index';
        $title = 'Danh sách tài khoản';
        $data = $this->modelUser->getAll();
        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function create()
    {
        $title = "Thêm tài khoản";
        $view = "user/create";
        require PATH_VIEW_MAIN_ADMIN;
    }
    public function store()
    {
        $errors = [];
        $old = [];

        $old['username'] = isset($_POST['username']) ? trim($_POST['username']) : '';
        $old['email']    = isset($_POST['email']) ? trim($_POST['email']) : '';
        $old['password'] = isset($_POST['password']) ? trim($_POST['password']) : '';
        $old['is_main']  = isset($_POST['is_main']) ? trim($_POST['is_main']) : 0;

        if ($old['username'] === '') {
            $errors['username'] = 'Tên đăng nhập là bắt buộc.';
        }

        if ($old['email'] === '') {
            $errors['email'] = 'Email là bắt buộc.';
        }

        if ($old['password'] === '') {
            $errors['password'] = 'Mật khẩu là bắt buộc.';
        }

        if ($this->modelUser->findByEmail($old['email'])) {
            $errors['email'] = 'Email đã tồn tại.';
        }

        if (!empty($errors)) {
            $title = "Thêm tài khoản";
            $view = "user/create";
            require PATH_VIEW_MAIN_ADMIN;
            return;
        }

        $data = [
            'username' => $old['username'],
            'email'    => $old['email'],
            'password' => password_hash($old['password'], PASSWORD_DEFAULT),
            'is_main'  => $old['is_main']
        ];

        $this->modelUser->create(
            $data['username'],
            $data['email'],
            $data['password'],
            $data['is_main']
        );

        header("Location: " . BASE_URL_ADMIN . "&action=list-user");
        exit();
    }

    public function delete() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $this->modelUser->delete($id);
        }
        header("Location: " . BASE_URL_ADMIN . "&action=list-user");
        exit;
    }
    public function show()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header("Location: " . BASE_URL_ADMIN . "&action=list-user");
            exit;
        }

        $user = $this->modelUser->find($id);
        $view = 'user/show';
        $title = 'Chi tiết tài khoản';
        require PATH_VIEW_MAIN_ADMIN;
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header("Location: " . BASE_URL_ADMIN . "&action=list-user");
            exit;
        }

        $user = $this->modelUser->find($id);
        $view = 'user/edit';
        $title = 'Sửa tài khoản';
        require PATH_VIEW_MAIN_ADMIN;
    }

    public function update()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id <= 0) {
            header("Location: " . BASE_URL_ADMIN . "&action=list-user");
            exit;
        }

        $errors = [];
        $old = [];

        $old['username'] = isset($_POST['username']) ? trim($_POST['username']) : '';
        $old['email']    = isset($_POST['email']) ? trim($_POST['email']) : '';
        $old['is_main']  = isset($_POST['is_main']) ? trim($_POST['is_main']) : 0;

        if ($old['username'] === '') {
            $errors['username'] = 'Tên đăng nhập là bắt buộc.';
        }

        if ($old['email'] === '') {
            $errors['email'] = 'Email là bắt buộc.';
        }

        if (!empty($errors)) {
            $user = $this->modelUser->find($id);
            $view = 'user/edit';
            $title = 'Sửa tài khoản';
            require PATH_VIEW_MAIN_ADMIN;
            return;
        }

        $data = [
            'username' => $old['username'],
            'email'    => $old['email'],
            'is_main'  => $old['is_main'],
            'id'       => $id
        ];

        $this->modelUser->update(
            $data['id'],
            $data['username'],
            $data['email'],
            $data['is_main']
        );

        header("Location: " . BASE_URL_ADMIN . "&action=list-user");
        exit;
    }
}
