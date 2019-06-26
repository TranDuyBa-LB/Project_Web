<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/index.css" />
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
            <!--<div>
                <a href="#" title="Giỏ hàng">
                    <p style="color:white; float: right; margin-right:10px; font-family:Arial, 'Times New Roman';font-size: 20px;" id="so_luong_san_pham">100</p>
                    <img src="IMG/icon_giohang.png" alt="Giỏ hàng" style="width:50px;height:45px;float:right;"/>
                </a>
            </div>-->
        </div>
        <div id="noi_dung_chinh">
            <div id="cac_san_pham">
                <div id="san_pham_moi">
                    <?php require 'xuat.php'; $n=0 ?>
                    <?php foreach($ket_qua as $cot) :
                            if($cot['new']==1 && $n<4):
                                ++$n;
                    ?>
                    <div class="san_pham">
                        <a href="http://localhost:8888/web_ban_hang/san_pham.php?id=<?php echo $cot['ma_sp'] ?>" style="display:block; color:black;" target="_blank">
                        <img src="<?php echo $cot['link_hinh_anh']; ?>" alt="" style="width: 270px; height: 200px; margin-left: 5px; float:left;"/>
                        <div style="width: 220px; height: 70px; float: left; margin-left: 5px;">
                            <h4 style="text-align:center; margin-top: 0px;"><?php echo $cot['ten_san_pham']; ?></h4>
                            <p style="text-align:center; margin-top: 0px; font-size: 20px; margin-top: -15px;"><?php echo $cot['gia']; ?>đ</p>
                        </div>
                        </a>
                        <!--<button style="width: 50px; height: 50px; margin-left: 2px; margin-top: 10px;">Mua</button>-->
                    </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                </div>
                <div id="san_pham_hien_co">
                    <?php require 'xuat.php'; ?>
                    <?php foreach ($ket_qua as $cot) : ?>
                        <div class="san_pham">
                            <a href="http://localhost:8888/web_ban_hang/san_pham.php?id=<?php echo $cot['ma_sp'] ?>" style="display:block; color:black;" target="_blank">
                            <img src="<?php echo $cot['link_hinh_anh']; ?>" alt="#" style="width: 270px; height: 200px; margin-left: 5px; float:left;background-color: red;"/>
                                <div style="width: 220px; height: 70px; float: left; margin-left: 5px;">
                                    <h4 style="text-align:center; margin-top: 0px;"><?php echo $cot['ten_san_pham']; ?></h4>
                                    <p style="text-align:center; margin-top: 0px; font-size: 20px; margin-top: -15px;"><?php echo $cot['gia']; ?>đ</p>
                                </div>
                            <!--<button style="width: 50px; height: 50px; margin-left: 2px; margin-top: 10px;">Mua</button>-->
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </body>
</html>