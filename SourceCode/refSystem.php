<?php
    session_start();
    if (isset($_SESSION['Login']) && $_SESSION['TypeUser'] == 0){
        include 'connect.php';
        if (count($_GET) == 4){
            $sql = $connect->prepare('UPDATE `loaitaikhoan` SET `TENLOAI`=?,`DUNGLUONGMAX`=?,`DUNGLUONGUPLOAD`=? WHERE `MATYPE`=?');
            $sql->bind_param('ssss', $_GET['tenLoai'],$_GET['dungLuongMax'], $_GET['dungLuongUpload'],$_GET['maType']);
            $sql->execute();
        } else {
            $sql = $connect->prepare('UPDATE `blacklist` SET `DINHDANG`=? WHERE `STT`=?');
            $sql->bind_param('ss', $_GET['dinhDang'],$_GET['STT']);
            $sql->execute();
        }

        echo json_encode(array('status'=>1, 'mess'=>"Cập nhật thành công"));
    } else
    {
        echo json_encode(array('status'=>0, 'mess'=>"Lỗi không xác định"));
    }
?>