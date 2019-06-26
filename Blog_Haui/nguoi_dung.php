<?php
    require 'php/check_dang_nhap.php';
    require 'php/ket_noi_database.php';
 ?>
 <?php
    $select_chuyen_muc_sql = "SELECT ten_chuyen_muc
                              FROM chuyen_muc ";
    try {
        $bang_ket_qua_chuyen_muc = $obj_database->query($select_chuyen_muc_sql);
    } catch(Exception $erro_select){
        echo "Lỗi đọc bảng chuyên mục: ".$erro_select;
    }
    $id_sinh_vien = (int)$_SESSION['id_sinh_vien'];
    $select_sql = "SELECT id_bai_viet, chuyen_muc, tieu_de, tom_tat, noi_dung, luot_xem, so_binh_luan, luot_thich, luot_khong_thich, ngay_dang
                   FROM bai_viet
                   WHERE (id_sinh_vien=$id_sinh_vien)";
    $bang_ket_qua = $obj_database->query($select_sql);             
  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog Haui</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/css_home/home_blog_sinh_vien.css" />
        <link rel="stylesheet" type="text/css" href="CSS/css_tai_khoan/nguoi_dung.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    </head>
    <body>
            <div id="thanh_cong_cu">
                <a id="logo" href="blog_sinh_vien.php">
                    <img src="imgs/imgs_home/img_logo.jpg" />
                </a>
                <span class="cong_cu">
                    <a href="blog_sinh_vien.php">
                        Trang chủ
                    </a>
                </span>
                <span class="cong_cu">
                    <a href="#">
                        Chuyên mục
                    </a>
                    <ul id="cac_chuyen_muc">
                    <?php foreach($bang_ket_qua_chuyen_muc as $mang): ?>
                    <li>
                        <a href="#"> <?php echo $mang['ten_chuyen_muc'] ?> </a>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                </span>
                <span class="cong_cu">
                    <a href="dong_gop_y_kien.html">
                        Góp ý
                    </a>
                </span>
                <span class="cong_cu">
                    <a href="gioi_thieu_ve_trang.html">
                        Giới thiệu
                    </a>
                </span>
                <span class="cong_cu">
                    <a id="icon_nguoi_dung" href="#">
                        <img src="imgs/imgs_home/icon_nguoi_dung.png" />
                    </a>
                </span>
                <span>
                    <a id="dang_nhap" href="php/dang_xuat.php">
                         Đăng xuất
                    </a>
                </span>
            </div>
            <div id="khu_vuc_quan_ly">
                <span id="danh_sach_chon">
                    <ul>
                        <li>
                            <a href="soan_bai_viet.php">Viết tin mới</a>
                        </li>
                        <li>
                            <a href="sua_thong_tin.php">Sửa thông tin</a>
                        </li>
                        <li>
                            <a href="trang_doi_mat_khau.php?error=">Đổi mật khẩu</a>
                        </li>
                    </ul>
                </span>
                <table id="bang_quan_ly_bai" border="2" >
                    <thead> 
                        <tr>
                            <th>ID Bài</th>
                            <th>Ngày đăng</th>
                            <th>Tiêu đề</th>
                            <th>Chuyên mục</th>
                            <th>Lượt xem</th>
                            <th>Số bình luận</th>
                            <th>Thích</th>
                            <th>Không thích</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php foreach($bang_ket_qua as $mang) : ?>
                        <tr>
                            <td> <?php echo $mang['id_bai_viet']; ?> </td>
                            <td> <?php echo $mang['ngay_dang']; ?> </td>
                            <td> <?php echo $mang['tieu_de']; ?> </td>
                            <td> <?php echo $mang['chuyen_muc']; ?> </td>
                            <td> <?php echo $mang['luot_xem']; ?> </td>
                            <td> <?php echo $mang['so_binh_luan']; ?> </td>
                            <td> <?php echo $mang['luot_thich']; ?> </td>
                            <td> <?php echo $mang['luot_khong_thich']; ?> </td>
                            <td> 
                                <a href="php/xoa_bai_viet.php?id_bai_viet=<?php echo $mang['id_bai_viet']; ?>">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </body>
</html>