<?php
    $ma_san_pham=$_POST['ma_san_pham'];
    $ten_san_pham=$_POST['ten_san_pham'];
    $gia=$_POST['gia'];
    $chieu_dai=(float)$_POST['chieu_dai'];
    $chieu_rong=(float)$_POST['chieu_rong'];
    if(isset($_POST['checkbox'])){
        $san_pham_moi = 1;
    } else {
        $san_pham_moi = 0;
    }
    $mo_ta=$_POST['mo_ta'];
    if(empty($mo_ta))
        $mo_ta='Chưa có mô tả';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay=date('h:i-d/m/y');
    require 'ket_noi_database.php';
    if($obj){
        if ($_FILES['hinh_anh']['error'] > 0)
            echo "Upload file bị lỗi!";
        else {
            move_uploaded_file($_FILES['hinh_anh']['tmp_name'], 'IMG/IMG_san_pham/' . $_FILES['hinh_anh']['name']);
            $link_hinh_anh = $_FILES['hinh_anh']['name'];
            $link_hinh_anh = 'IMG/IMG_san_pham/'.$link_hinh_anh;
            $add="INSERT INTO san_pham(ma_sp, ten_san_pham, gia, chieu_dai, chieu_rong, mo_ta, ngay_cap_nhat, new, link_hinh_anh)
                  VALUES ('$ma_san_pham', '$ten_san_pham', '$gia', $chieu_dai, $chieu_rong, '$mo_ta', '$ngay','$san_pham_moi', '$link_hinh_anh')";
            $obj->query($add);
            header('Location: admin.php');
        }
    } else {
        echo 'Có vấn đề trong việc cập nhật sản phẩm !';
    }
 ?>