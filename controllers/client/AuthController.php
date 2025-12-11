    <?php
    require_once PATH_MODEL . 'User.php';

    class AuthController {
        public $modelUser;

        public function __construct() {
            $this->modelUser = new User();
        }

        public function showLogin() {
            $title = 'Đăng Nhập';
            $login_error = $_SESSION['login_error'] ?? '';
            unset($_SESSION['login_error']);

            $file = PATH_VIEW_CLIENT . 'login.php';
            if(file_exists($file)){
                require $file;
            } else {
                echo "<h1>File login.php không tồn tại tại: $file</h1>";
                exit();
            }
        }

        public function login() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: ' . BASE_URL . '?action=login');
                exit();
            }

            $email = $_POST['username_or_email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->modelUser->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) { 
                $_SESSION['user'] = [
                    'id'   => $user['id'],
                    'name' => $user['username'],
                    'is_main' => $user['is_main']
                ];

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_main'] = $user['is_main'];

               if ($user['is_main'] == 1) {

                    
                    $_SESSION['admin'] = $user;

                    header('Location: ' . BASE_URL);

                } else {
                    header('Location: ' . BASE_URL);
                }
                exit();


            } else {
                $_SESSION['login_error'] = "Email hoặc mật khẩu không chính xác.";
                header('Location: ' . BASE_URL . '?action=login');
                exit();
            }
        }

        public function showRegister() {
            $title = 'Đăng Ký';
            $error = $_SESSION['register_error'] ?? '';
            unset($_SESSION['register_error']);

            $file = PATH_VIEW_CLIENT . 'register.php';
            if(file_exists($file)){
                require $file;
            } else {
                echo "<h1>File register.php không tồn tại tại: $file</h1>";
                exit();
            }
        }

        public function register() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: ' . BASE_URL . '?action=register');
                exit();
            }

            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $is_main = 0;

            if (empty($username) || empty($email) || empty($password)) {
                $_SESSION['register_error'] = "Vui lòng điền đầy đủ thông tin.";
                header('Location: ' . BASE_URL . '?action=register');
                exit();
            }

            if ($this->modelUser->findByEmail($email)) {
                $_SESSION['register_error'] = "Email đã tồn tại.";
                header('Location: ' . BASE_URL . '?action=register');
                exit();
            }

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            if ($this->modelUser->create($username, $email, $password_hash, $is_main)) {
                $_SESSION['success_message'] = "Đăng ký thành công, hãy đăng nhập!";
                header('Location: ' . BASE_URL . '?action=login');
                exit();
            } else {
                $_SESSION['register_error'] = "Đăng ký thất bại.";
                header('Location: ' . BASE_URL . '?action=register');
                exit();
            }
        }

        public function logout() {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            unset($_SESSION['user']);
            unset($_SESSION['admin']);
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['is_main']);

            header('Location: ' . BASE_URL);
            exit();
        }

    }
