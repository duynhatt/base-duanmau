<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Đăng Nhập') ?></title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f1f3f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            width: 380px;
            background: #fff;
            padding: 35px 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
            color: #333;
            font-weight: 600;
        }

        .msg {
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
        }

        .msg.error { color: #d9534f; }
        .msg.success { color: #28a745; }


        input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
            margin-bottom: 15px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #4e73df;
            box-shadow: 0 0 4px rgba(78,115,223,0.25);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4e73df;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: .2s;
            margin-top: 5px;
        }


        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

      
    </style>
</head>

<body>

<div class="login-box">

    <h2>Đăng Nhập</h2>

    <?php if (!empty($_SESSION['success_message'])): ?>
        <div class="msg success"><?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

    <?php if (!empty($login_error)): ?>
        <div class="msg error"><?= htmlspecialchars($login_error) ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>?action=do-login">
        <label>Email hoặc Tài khoản</label>
        <input type="text" name="username_or_email" required>

        <label>Mật khẩu</label>
        <input type="password" name="password" required>

        <button type="submit">Đăng Nhập</button>
    </form>

    <div class="register-link">
        Chưa có tài khoản?  
        <a href="<?= BASE_URL ?>?action=register">Đăng ký ngay</a>
    </div>

</div>

</body>
</html>
