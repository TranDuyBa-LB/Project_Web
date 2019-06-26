<!DOCTYPE html>
<html>
    <head>
        <title>Đổi mật khẩu</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/css_tai_khoan/dang_ky.css" />
    </head>
    <body>
        <div id="logo_gioi_thieu">
            <img src="imgs/imgs_tai_khoan/img_logo.jpg" />
        </div>
        <form id="form_dang_ky" method="POST" action="php/doi_mat_khau.php">
                <p>Đổi pass</p>
                <span>
                    <p style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; background-color: white; color: red;">
                        <?php echo $_GET['error']; ?>
                    </p>
                    <input name="mat_khau_hien_tai" type="password" placeholder="Mật khẩu hiện tại" autocomplete="off" required/>
                    <input name="mat_khau_moi" type="password" placeholder="Mật khẩu mới" autocomplete="off" required/>
                    <input name="mat_khau_moi_nhap_lai" type="password" placeholder="Nhập lại mật khẩu mới" autocomplete="off" required/>
                </span>
                <input id="submit_dang_ky" type="submit" value="Đổi mật khẩu" />
                <div id="canh_bao">
                </div>
        </form>
    </body>
</html>