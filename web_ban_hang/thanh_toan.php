<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/thanh_toan.css" />
        <meta charset="UTF-8" />
        <title>Cửa hàng</title>
    </head>
    <body>
        <div id="logo">
            <a title="logo_shop" href="#" >
                <img src="IMG/logo_shop.png" alt="logo_shop" />
            </a>
            <div>
                <a title="Facebook" href="#">
                    <img src="IMG/icon_face.png" alt="Facebook" />
                </a>
                <a title="Youtube" href="#">
                    <img src="IMG/icon_youtube.png" alt="Youtube" />
                </a>
                <a title="Email" href="#">
                    <img src="IMG/icon_email.png" alt="Email" />
                </a>
                <a title="Điện thoại liên hệ" href="#">
                    <img src="IMG/icon_phone.png" alt="Điện thoại liên hệ" />
                </a>
                <a title="Quản trị" href="login.php" target="_blank">
                    <img src="IMG/icon_admin.png" alt="Địa chỉ" />
                </a>
            </div>
        </div>
        <div id="thanh_cong_cu">
            <ul>
                <li>
                    <a href="index.php">Trang chủ</a>
                </li>
                <li>
                    <a href="#">Sản phẩm</a>
                </li>
                <li>
                    <a href="#">Hỏi đáp</a>
                </li>
                <li>
                    <a href="#">Thông tin</a>
                </li>
            </ul>
            <div>
                <a href="#" title="Giỏ hàng">
                    <p style="color:white; float: right; margin-right:10px; font-family:Arial, 'Times New Roman';font-size: 20px;" id="so_luong_san_pham">100</p>
                    <img src="IMG/icon_giohang.png" alt="Giỏ hàng" style="width:50px;height:45px;float:right;"/>
                </a>
            </div>
        </div>
    </body>
    <p id="tieu_de">Thanh toán sản phẩm</p>
    <?php require 'xuat.php' ?>
    <?php foreach ($ket_qua as $cot) :
            if($cot['ma_sp']==$_GET['ma_san_pham']) : ?>
    <div id="thanh_toan">
        <div id="hinh_anh">
            <img src="<?php echo $cot['link_hinh_anh']; ?>" style="width:350px; height: 300px;" />
        </div>
        <form id="form_thanh_toan" action="tien_hanh_thanh_toan.php" method="POST">
            Tên sản phẩm <input type="text" name="ten_san_pham" value="<?php echo $cot['ten_san_pham']; ?>" style="width: 300px;" readonly="False" /> <br> <br>
            <input type="hidden" name="gia_mot_san_pham" value="<?php echo $cot['gia']; ?>" />
            Số lượng <input type="text" name="so_luong" value="<?php echo $_GET['so_luong']; ?>" style="width: 40px;" readonly="False" /> <br> <br>
            Đơn giá <input type="text" name="don_gia" value="<?php echo (float)$cot['gia']*(float)$_GET['so_luong']; ?>" readonly="False" /> VNĐ <br> <br>
            Họ tên người nhận <input type="text" name="ten_nguoi_nhan" required autofocus/> <br> <br>
            Số điện thoại <input type="text" name="sdt_nguoi_nhan" required /> <br> <br>
            Địa chỉ <textarea name="dia_chi_nguoi_nhan" rows="2" cols="50" style="font-size: 14px;" required ></textarea> <br> <br>
            <input type="submit" value="Đặt hàng" style="width: 100px; height: 40px; margin-left: 200px;"/>
        </form>
    </div>
            <?php endif; ?>
    <?php endforeach; ?>
</html>