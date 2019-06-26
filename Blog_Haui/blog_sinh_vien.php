<?php
    require 'php/check_dang_nhap.php';
    require 'php/ket_noi_database.php';
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
    //Đọc dữ liệu từ table bài viết
    $select_demo_bai_viet_sql = "SELECT biet_danh, id_bai_viet, chuyen_muc, tieu_de, tom_tat, luot_xem, so_binh_luan, luot_thich, luot_khong_thich
                                  FROM bai_viet, nguoi_dung 
                                  WHERE bai_viet.id_sinh_vien = nguoi_dung.id_sinh_vien 
                                  ORDER BY id_bai_viet DESC ";
    try {
        $bang_ket_qua_demo_bai_viet = $obj_database->query($select_demo_bai_viet_sql);
    } catch (Exception $erro_select){
        echo "Lỗi đọc bảng bài viết: ".$erro_select;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog Sinh Viên</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/css_home/home_blog_sinh_vien.css" />
        <link rel="stylesheet" type="text/css" href="CSS/css_home/demo_bai_viet.css" />
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
        <div id="gioi_thieu_trang">
            <img src="imgs/imgs_home/img_logo.jpg" />
        </div>
        <div id="noi_dung_trang">
            <div id="bai_viet">
                  <?php foreach($bang_ket_qua_demo_bai_viet as $mang): ?>
                  <div class="cac_bai_viet">
                      <div class="tieu_de">
                            <h1>
                                <a href="bai_viet.php?id_bai_viet=<?php echo $mang['id_bai_viet']; ?>">
                                    <?php echo $mang['tieu_de']; ?>
                                </a>
                            </h1>
                      </div>
                      <div class="tom_tat">
                            <p> <?php echo $mang['tom_tat'] ?> </p>
                      </div>
                      <div class="tuong_tac">
                          <span class="nguoi_viet">
                              <img src="imgs/imgs_bai_viet/img_nguoi_viet.png" /> <?php echo $mang['biet_danh']; ?>
                          </span>
                          <span class="chuyen_muc">
                              <img src="imgs/imgs_bai_viet/img_chuyen_muc.png" /> <a href=""> <?php echo $mang['chuyen_muc']; ?> </a>
                          </span>
                          <span class="luot_xem">
                              <img src="imgs/imgs_bai_viet/img_luot_xem.png" /> <?php echo $mang['luot_xem']; ?>
                          </span>
                          <span class="binh_luan">
                              <img src="imgs/imgs_bai_viet/img_luot_binh_luan.png" /> <?php echo $mang['so_binh_luan']; ?>
                          </span>
                          <span class="yeu_thich">
                              <img src="imgs/imgs_bai_viet/img_yeu_thich.png" /> <?php echo $mang['luot_thich']; ?>
                          </span>
                          <span class="khong_yeu_thich">
                              <img src="imgs/imgs_bai_viet/img_khong_yeu_thich.png" /> <?php echo $mang['luot_khong_thich']; ?>
                          </span>
                      </div>
                  </div>
                  <?php endforeach; ?>
            </div>
            <div id="quang_cao">
                
            </div>
        </div>
    </body>
</html>