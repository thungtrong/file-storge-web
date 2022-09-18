<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $maThucThe = $_GET['maThucThe'];
        include 'connect.php';
        $sql = $connect->prepare('UPDATE `thucthe` SET `TRANGTHAI`= 1  WHERE `MATHUCTHE` = ?');
        $sql->bind_param('s', $maThucThe);
        $sql->execute();
        echo json_encode(array('status'=>1, 'mess'=>'Khôi phục thành công!'));
    } else {
        echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định'));
        exit(0);
    }
?>