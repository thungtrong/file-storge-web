<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $maThucThe = $_GET['maThucThe'];
        $trangThai = $_GET['trangThai'];

        include 'connect.php';
        $sql = $connect->prepare('UPDATE `chiaseall` set `QUYENTRUYCAP` = ? WHERE `MATHUCTHE` = ?');
        $sql->bind_param('ss', $trangThai, $maThucThe);
        $sql->execute();

        echo json_encode(array('status'=>1, 'mess'=>'Đã thay đổi quyền truy cập'));
    } else{
        echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định!'));
    }
?>