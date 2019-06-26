<?php
    session_start();
    if(!isset($_SESSION['tai_khoan'])){
        header('Location: index.php');
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/admin.css" />
    </head>
    <body>
        <p>Trang quản trị</p>
        <div id="thanh_cong_cu">
            <ul>
                <li><a href="index.php" target="_blank">Trang chủ</a></li>
                <li><a href="don_hang.php" target="_blank">Quản lý đơn hàng</a></li>
            </ul>
        </div>
        <form id="them_san_pham" action="add_san_pham.php" method="POST" enctype="multipart/form-data">
            <p>Thêm sản phẩm</p>
            Mã sản phẩm <input type="text" name="ma_san_pham" /> <br> <br>
            Tên sản phẩm <input type="text" name="ten_san_pham" /> <br> <br>
            Giá <input type="text" name="gia" /> VNĐ <br> <br>
            Chiều dài <input type="text" name="chieu_dai"/> cm <br> <br>
            Chiều rộng <input type="text" name="chieu_rong"/> cm <br> <br>
            Hình ảnh <input type="file" name="hinh_anh" /> <br> <br>
            Sản phẩm mới <input type="checkbox" name="checkbox" checked="checked" style="width: 30px; height: 30px;"/> <br> <br>
            Mô tả <textarea rows="10" cols="40" name="mo_ta" style="font-size: 20px;font-family:Arial, 'Times New Roman';"></textarea> <br> <br>
            <input type="submit" value="Thêm" style="width: 100px; height: 35px; margin-left: 170px;" />
        </form>
        <div id="danh_sach_san_pham">
            <p>Danh sách sản phẩm</p>
            <table border="2">
                <th>Mã</th>
                <th>Tên</th>
                <th>Giá(VNĐ)</th>
                <th>Dài(cm)</th>
                <th>Rộng(cm)</th>
                <th>Ngày thêm</th>
                <th>Hình ảnh</th>
                <th>Mới/Cũ</th>
                <th>Tác vụ</th>
                <?php 
                    require 'xuat.php';
                ?>
                <?php foreach ($ket_qua as $cot) : ?>
                    <tr style="text-align: center;">
                        <td style="color: red;">
                            <?php echo $cot['ma_sp']; ?>
                        </td>
                        <td>
                            <?php echo $cot['ten_san_pham']; ?>
                        </td>
                        <td>
                            <?php echo $cot['gia']; ?>
                        </td>
                        <td>
                            <?php echo $cot['chieu_dai']; ?>
                        </td>
                        <td>
                            <?php echo $cot['chieu_rong']; ?>
                        </td>
                        <td>
                            <?php echo $cot['ngay_cap_nhat']; ?>
                        </td>
                        <td>
                            <img src="<?php echo $cot['link_hinh_anh']; ?>" alt="ảnh sản phẩm" style="width: 100px; height: 100px;" />
                        </td>
                        <td>
                            <?php echo $cot['new']; ?>
                        </td>
                        <td>
                            <form action="delete.php" method="POST">
                                <input type='hidden' name='ma_sp' value="<?php echo $cot['ma_sp']; ?>" />
                                <input type="submit" value="Xóa" style="color:red;" />
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>