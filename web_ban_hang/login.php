<!DOCTYPE html>
<html>
    <head>
        <title>Trang quản trị</title>
        <meta charset="UTF8" />
    </head>
    <body>
    <?php
        session_start(); //Yêu cầu sử dụng session
        if(isset($_POST['click_login'])){
            $tai_khoan = $_POST['tai_khoan'];
            $mat_khau = $_POST['mat_khau'];
            if($tai_khoan==='duyba' && $mat_khau==='Ba123456789') {
                $_SESSION['tai_khoan']=$tai_khoan;
                header('Location: check_admin.php');
            } else {
                echo 'Sai tên tài khoản mật khẩu !';
            }
        }
     ?>
        <form action="login.php" method="POST">
            Tài khoảng <input type="text" name="tai_khoan" /> <br> <br>
            Mật khẩu <input type="password" name="mat_khau" /> <br> <br>
            <input type="submit" name="click_login" value="Đăng nhập" style="margin-left: 100px; height: 50px;"/>
        </form>
    </body>
</html>