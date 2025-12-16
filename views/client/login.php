<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Đăng Nhập') ?></title>
    <style>
       * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: ;
        }
       

    
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #000000;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056c7;
        }

        p {
            text-align: center;
            margin-top: 12px;
            font-size: 14px;
        }

        a {
            color: #000000;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        .center {
    text-align: center;
}

    </style>
</head>
<body>
<div class="login-box">
<h1 class="center">Đăng Nhập</h1>


    <?php if (!empty($_SESSION['success_message'])): ?>
        <div class="msg success"><?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
    <?php endif; ?>

    <?php if (!empty($login_error)): ?>
        <div class="msg error"><?= htmlspecialchars($login_error) ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>?action=do-login">
        <input type="text" name="username_or_email" required placeholder="email hoặc tài khoản">

        <label>Mật khẩu</label>
        <input type="password" name="password" required placeholder="mật khẩu">

        <button type="submit">Đăng Nhập</button>
    </form>

    <div class="register-link">
        Chưa có tài khoản?  
        <a href="<?= BASE_URL ?>?action=register">Đăng ký</a>
    </div>
</div>
</body>
<div>
</div>





</html>
