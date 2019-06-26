<?php
    require 'admin/php/check_admin.php';
    require 'php/ket_noi_database.php';
    require 'admin/php/danh_sach_sinh_vien.php';
    require 'admin/php/danh_sach_bai_viet.php';
    require 'admin/php/danh_sach_gop_y.php';
?>
<?php
    //Đọc dữ liệu từ table chuyên mục
    $select_chuyen_muc_sql = "SELECT ten_chuyen_muc
                              FROM chuyen_muc ";
    try {
        $bang_ket_qua_chuyen_muc = $obj_database->query($select_chuyen_muc_sql);
    } catch(Exception $erro_select){
      echo "Lỗi đọc bảng chuyên mục: ".$erro_select;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog Sinh Viên</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/css_home/home_blog_sinh_vien.css" />
        <link rel="stylesheet" type="text/css" href="admin/css/admin.css" />
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
                <a href="#">
                    Góp ý
                </a>
            </span>
            <span class="cong_cu">
                <a href="#">
                    Giới thiệu
                </a>
            </span>
            <span>
                <a id="dang_nhap" href="php/dang_xuat.php">
                    Đăng xuất
                </a>
            </span>
        </div>
        <div id="noi_dung_trang">
            <div class="danh_sach">
                <p>Danh sách sinh viên:</p>
                <table border="2">
                    <thead>
                        <tr>
                            <td>ID sinh viên</td>
                            <td>Biệt danh</td>
                            <td>Trường đang học</td>
                            <td>Email</td>
                            <td>Thời gian đăng ký</td>
                            <td>Tác vụ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bang_ket_qua_sv as $mang_ket_qua_sv) : ?>
                            
                            <tr style="background-color:<?php echo $b_color ?>">
                                <td> <?php echo $mang_ket_qua_sv['id_sinh_vien']; ?></td>
                                <td> <?php echo $mang_ket_qua_sv['biet_danh']; ?> </td>
                                <td> <?php echo $mang_ket_qua_sv['truong_dang_hoc']; ?> </td>
                                <td> <?php echo $mang_ket_qua_sv['email']; ?> </td>
                                <td> <?php echo $mang_ket_qua_sv['ngay_dang_ky']; ?> </td>
                                <td>Tác vụ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div id="cong_cu_admin">
                <form action="admin/php/add_chuyen_muc.php" method="GET">
                    <input type="text" name="ten_chuyen_muc" placeholder="Tạo chuyên mục mới" />
                    <input type="submit" style="display: none" />
                </form>
            </div>
            <div class="danh_sach">
                <p>Danh sách bài viết:</p>
                <table border="2">
                    <thead>
                        <tr>
                            <td>ID bài viết</td>
                            <td>ID sinh viên</td>
                            <td>Tiêu đề</td>
                            <td>Chuyên mục</td>
                            <td>Lượt xem</td>
                            <td>Số bình luận</td>
                            <td>Lượt thích</td>
                            <td>Lượt không thích</td>
                            <td>Ngày đăng</td>
                            <td>Tác vụ</td>
                        </tr>
                        <tbody>
                            <?php foreach($bang_ket_qua_bv as $mang_ket_qua_bv): ?>
                                <tr>
                                    <td> <?php echo $mang_ket_qua_bv['id_bai_viet']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['id_sinh_vien']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['tieu_de']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['chuyen_muc']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['luot_xem']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['so_binh_luan']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['luot_thich']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['luot_khong_thich']; ?></td>
                                    <td> <?php echo $mang_ket_qua_bv['ngay_dang']; ?></td>
                                    <td>Tác vụ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </thead>
                </table>
            </div>
            <div class="danh_sach">
                <p>Danh sách góp ý</p>
                <table border="2">
                    <thead>
                        <tr>
                            <td>ID sinh viên</td>
                            <td>Biệt danh</td>
                            <td>Tiêu đề góp ý</td>
                            <td>Nội dung góp ý</td>
                            <td>Ngày gửi</td>
                            <td>Tác vụ</td>
                        </tr>
                        <tbody>
                            <?php foreach($bang_gop_y as $mang_gop_y): ?>
                                <tr>
                                    <td> <?php echo $mang_gop_y['id_sinh_vien']; ?></td>
                                    <td> <?php echo $mang_gop_y['biet_danh']; ?></td> 
                                    <td> <?php echo $mang_gop_y['tieu_de_gop_y']; ?></td>
                                    <td> <?php echo $mang_gop_y['noi_dung_gop_y']; ?></td>
                                    <td> <?php echo $mang_gop_y['ngay_gui']; ?></td>
                                    <td>Tác vụ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </body>
</html>