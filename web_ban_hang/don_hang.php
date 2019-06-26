<?php
    session_start();
    if(!isset($_SESSION['tai_khoan'])){
        header('Location: index.php');
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đơn hàng</title>
        <meta charset="UTF-8" />
        <link href="CSS/don_hang.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <p id="tieu_de">Quản lý đơn hàng</p>
        <div id="thanh_cong_cu">
            <ul>
                <li><a href="index.php" target="_blank">Trang chủ</a></li>
                <li><a href="admin.php" target="_blank">Trang quản trị</a></li>
            </ul>
        </div>
        <div id="don_hang">
            <?php
                require 'ket_noi_database.php';
                $xuat='SELECT * FROM don_hang';
                $ket_qua = $obj->query($xuat);
             ?>
            <table border="2">
                <th bgcolor="#69b1fb">Mã đơn hàng</th>
                <th bgcolor="#69b1fb">Tên sản phẩm</th>
                <th bgcolor="#69b1fb">Số lượng</th>
                <th bgcolor="#69b1fb">Giá 1 sản phẩm(VNĐ)</th>
                <th bgcolor="#69b1fb">Đơn giá(VNĐ)</th>
                <th bgcolor="#69b1fb">Tên người nhận</th>
                <th bgcolor="#69b1fb">SĐT người nhận</th>
                <th bgcolor="#69b1fb">Địa chỉ người nhận</th>
                <th bgcolor="#69b1fb">Ngày đặt</th>
                <th bgcolor="#69b1fb">Tình trạng</th>
                <th bgcolor="#69b1fb">Xóa đơn</th>
                <?php foreach($ket_qua as $cot) : ?>
                    <tr>
                        <td><?php echo $cot['ma_don']; ?></td>
                        <td><?php echo $cot['ten_san_pham']; ?></td>
                        <td><?php echo $cot['so_luong']; ?></td>
                        <td><?php echo $cot['gia_san_pham']; ?></td>
                        <td><?php echo $cot['don_gia']; ?></td>
                        <td><?php echo $cot['ten_nguoi_nhan']; ?></td>
                        <td><?php echo $cot['sdt_nguoi_nhan']; ?></td>
                        <td><?php echo $cot['dia_chi_nguoi_nhan']; ?></td>
                        <td><?php echo $cot['ngay_dat']; ?></td>
                        <td></td>
                        <td>
                            <form action="delete_don.php" method="GET">
                                <input type="hidden" name="ten_nguoi_nhan" value="<?php echo $cot['ten_nguoi_nhan']; ?>" />
                                <input type="submit" value="Xóa" style="color:red;"/>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>