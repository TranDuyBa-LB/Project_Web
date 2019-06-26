<?php
    require 'php/check_dang_nhap.php';
    require 'php/ket_noi_database.php';
    require 'php/them_luot_xem.php';
?>
<?php 
    $id_bai_viet = (int)$_GET['id_bai_viet'];
    $id_sinh_vien = (int)$_SESSION['id_sinh_vien'];
    $select_chuyen_muc_sql = "SELECT ten_chuyen_muc
                              FROM chuyen_muc ";
    try {
        $bang_ket_qua_chuyen_muc = $obj_database->query($select_chuyen_muc_sql);
    } catch(Exception $erro_select){
        echo "Lỗi đọc bảng chuyên mục: ".$erro_select;
    }
    $select_bai_viet_sql = "SELECT biet_danh, chuyen_muc, tieu_de, noi_dung, luot_xem, so_binh_luan, luot_thich, luot_khong_thich
                            FROM bai_viet, nguoi_dung 
                            WHERE (bai_viet.id_sinh_vien = nguoi_dung.id_sinh_vien) and (id_bai_viet=$id_bai_viet) ";
    try {
        $bang_ket_qua_bai_viet = $obj_database->query($select_bai_viet_sql);
        $mang_ket_qua = $bang_ket_qua_bai_viet->fetch();
    } catch(Exception $erro_select) {
        echo "Lỗi select bảng bai viết: ".$erro_select;
    }
    $select_binh_luan_va_biet_danh = "SELECT biet_danh, noi_dung_binh_luan
                                      FROM binh_luan, nguoi_dung
                                      WHERE (binh_luan.id_sinh_vien=nguoi_dung.id_sinh_vien) and (id_bai_viet = $id_bai_viet) ";
    try {
        $bang_ket_qua_binh_luan_va_biet_danh = $obj_database->query($select_binh_luan_va_biet_danh);
    } catch (Exception $erro_select) {
        echo "Lỗi select bảng bình luận: ".$erro_select;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog Haui</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="CSS/css_home/home_blog_sinh_vien.css" />
        <link rel="stylesheet" type="text/css" href="CSS/css_home/demo_bai_viet.css" />
        <link rel="stylesheet" type="text/css" href="CSS/css_bai_viet/bai_viet.css" />
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
        <!--Sử dụng chung mẫu file css và html của trang chủ-->
        <div id="noi_dung_trang">
            <div id="bai_viet">
                  <div class="cac_bai_viet">
                      <div class="tieu_de">
                            <h1>
                                <a>
                                    <?php echo $mang_ket_qua['tieu_de']; ?>
                                </a>
                            </h1>
                      </div>
                      <div class="tuong_tac">
                          <span class="nguoi_viet">
                              <img src="imgs/imgs_bai_viet/img_nguoi_viet.png" /> <?php echo $mang_ket_qua['biet_danh']; ?>
                          </span>
                          <span class="chuyen_muc">
                              <img src="imgs/imgs_bai_viet/img_chuyen_muc.png" /> <a href="#"><?php echo $mang_ket_qua['chuyen_muc']; ?></a>
                          </span>
                          <span class="luot_xem">
                              <img src="imgs/imgs_bai_viet/img_luot_xem.png" /> <?php echo $mang_ket_qua['luot_xem']; ?>
                          </span>
                          <span class="binh_luan">
                              <img src="imgs/imgs_bai_viet/img_luot_binh_luan.png" /> <?php echo $mang_ket_qua['so_binh_luan']; ?>
                          </span>
                          <span class="yeu_thich">
                              <img src="imgs/imgs_bai_viet/img_yeu_thich.png" /> <?php echo $mang_ket_qua['luot_thich']; ?>
                          </span>
                          <span class="khong_yeu_thich">
                              <img src="imgs/imgs_bai_viet/img_khong_yeu_thich.png" /> <?php echo $mang_ket_qua['luot_khong_thich']; ?>
                          </span>
                      </div>
                      <div class="noi_dung_bai">
                          <p>
                            <?php echo $mang_ket_qua['noi_dung']; ?>
                          </p>
                      </div>
                      <div id="nhan_xet">
                            <a href="php/add_luot_thich_hoac_khong_thich.php?thich=1&id_bai_viet=<?php echo $id_bai_viet ?>" >
                                <img src="imgs/imgs_bai_viet/img_yeu_thich.png" />
                            </a>
                            <a href="php/add_luot_thich_hoac_khong_thich.php?khong_thich=1&id_bai_viet=<?php echo $id_bai_viet ?>" >
                                <img src="imgs/imgs_bai_viet/img_khong_yeu_thich.png" />
                            </a>
                            <form method="POST" action="php/add_binh_luan.php">
                                <input type="text" id="binh_luan_moi" name="binh_luan_moi" placeholder="Viết bình luận" autocomplete="off" />
                                <input type="hidden" name="id_sinh_vien" value="<?php echo $id_sinh_vien ?>" />
                                <input type="hidden" name="id_bai_viet" value="<?php echo $id_bai_viet ?>" />
                                <input type="submit" style="display:none;" />
                            </form>
                            <div id="binh_luan_cu">
                                <?php foreach($bang_ket_qua_binh_luan_va_biet_danh as $mang_binh_luan_va_biet_danh): ?>
                                <div class="binh_luan">
                                    <p class="ten_nguoi_binh_luan"> 
                                        <?php echo $mang_binh_luan_va_biet_danh['biet_danh'] ?> 
                                    </p>
                                    <p class="noi_dung_binh_luan">
                                        <?php echo $mang_binh_luan_va_biet_danh['noi_dung_binh_luan'] ?>
                                    </p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                      </div>
                  </div>
            </div>
            <div id="quang_cao">
                
            </div>
        </div>
    </body>
</html>