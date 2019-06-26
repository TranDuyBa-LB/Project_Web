<?php require 'php/check_dang_nhap.php'; ?>
<?php
    require 'php/ket_noi_database.php';
    $select_sql = "SELECT ten_chuyen_muc
                   FROM chuyen_muc";
    try {
        $ket_qua = $obj_database->query($select_sql);
    }
    catch (Exception $erro_select) {
        echo 'Lỗi: '.$erro_select;
    }
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
        <title>Soạn tin mới</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/css_home/home_blog_sinh_vien.css" />
        <link rel="stylesheet" type="text/css" href="CSS/css_tao_biet_viet_moi/soan_bai_viet.css" />
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
                        <a id="icon_nguoi_dung" href="nguoi_dung.php">
                            <img src="imgs/imgs_home/icon_nguoi_dung.png" />
                        </a>
                    </span>
                    <span>
                        <a id="dang_nhap" href="php/dang_xuat.php">
                            Đăng xuất
                        </a>
                    </span>
        </div>
        <div id="soan_tin_moi">
            <div id="loi_nhan">
                <p>Hãy nói những gì bạn muốn nói !<br>
                   Đây là không gian của bạn !
                </p>
            </div>
            <form method="POST" action="php/add_bai_viet.php">
                <p>Chọn chuyên mục </p>
                <select id="chuyen_muc" name="chuyen_muc">
                    <?php foreach($ket_qua as $chuyen_muc): ?>
                        <option> <?php echo $chuyen_muc['ten_chuyen_muc']; ?> </option>
                    <?php endforeach; ?>
                </select>
                <p>hoặc</p>
                <input id="chuyen_muc_moi" name="chuyen_muc_moi" placeholder="Tạo chuyên mục mới" />
                <textarea id="tieu_de" name="tieu_de" placeholder="Tiêu đề bài viết." ></textarea>
                <textarea id="tom_tat" name="tom_tat" placeholder="Tóm tắt bài viết." ></textarea>
                <textarea id="noi_dung" name="noi_dung" placeholder="Nội dung bài viết." ></textarea>
                <span>
                     <input id="submit_dang_bai" type="submit" value="Đăng bài" />
                </span>
            </form>
        </div>
    </body>
</html>