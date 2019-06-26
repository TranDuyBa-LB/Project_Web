<?php 
    require 'php/check_dang_nhap.php';
    require 'php/ket_noi_database.php';
 ?>
 <?php
    $id_sinh_vien = (int) $_SESSION['id_sinh_vien'];
    $select_sql = "SELECT biet_danh, ma_sinh_vien, truong_dang_hoc, email
                   FROM nguoi_dung
                   WHERE id_sinh_vien = $id_sinh_vien ";
    $ket_qua = $obj_database->query($select_sql);
    $mang_ket_qua = $ket_qua->fetch();
  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng ký mới</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/css_tai_khoan/dang_ky.css" />
    </head>
    <body>
        <div id="logo_gioi_thieu">
            <img src="imgs/imgs_tai_khoan/img_logo.jpg" />
        </div>
        <form id="form_dang_ky" method="POST" action="php/thay_doi_thong_tin.php">
                <p>Chỉnh sửa thông tin</p>
                <span>
                    <input name="biet_danh" type="text" placeholder="Biệt danh" value="<?php echo $mang_ket_qua['biet_danh']; ?>" autofocus autocomplete="off" required/>
                    <input name="ma_sinh_vien" type="text" placeholder="Điền mã sinh viên mới" autocomplete="off" />
                    <input name="truong_dang_hoc" type="text" placeholder="Trường đang học" value="<?php echo $mang_ket_qua['truong_dang_hoc']; ?>" autocomplete="off" required/>
                    <input name="email" type="email" placeholder="Email" value="<?php echo $mang_ket_qua['email']; ?>" autocomplete="off" required/>
                </span>
                <input id="submit_dang_ky" type="submit" value="Lưu chỉnh sửa" />
                <div id="canh_bao">
                </div>
        </form>
    </body>
</html>