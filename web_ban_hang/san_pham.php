<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sản phẩm</title>
        <link rel="stylesheet" type="text/css" href="CSS/san_pham.css" />
    </head>
    <body>
        <?php require 'xuat.php'; ?>
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
                <a title="Quản trị" href="login.php">
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
        <?php foreach ($ket_qua as $cot) :
                if($cot['ma_sp']==$_GET['id']):
        ?>
        <div class="thong_tin_san_pham">
            <div class="anh_san_pham">
                <div class="anh_nho">
                    <!--ảnh nhỏ giới thiệu sản phẩm-->
                </div>
                <div class="anh_lon">
                    <img src="<?php echo $cot['link_hinh_anh']; ?>" />
                </div>
                <div class="cho"></div>
            </div>
            <form class="thong_tin" action="thanh_toan.php" method="GET">
                <input type="hidden" name="ma_san_pham" value="<?php echo $cot['ma_sp']; ?>" />
                <h1><?php echo $cot['ten_san_pham']; ?></h1>
                <p style="font-size: 30px;">Giá: <?php echo $cot['gia']; ?>đ</p>
                <p style="font-size: 30px;">Số lượng: <input type="text" name="so_luong" style="width: 60px; height: 30px;" /></p>
                <input type="submit" value="Thanh toán" style="width: 100px; height: 40px; margin-left:50px;"/>
                <p>Thông số:
                    <ul>
                        <li>Chiều dài: <?php echo $cot['chieu_dai']; ?> cm </li>
                        <li>Chiều rộng: <?php echo $cot['chieu_rong']; ?> cm </li>
                        <li>Mô tả: <?php echo $cot['mo_ta']; ?> </li>
                    </ul>
                </p>
            </form>
        </div>
                <?php endif; ?>
        <?php endforeach; ?>
    </body>
</html>