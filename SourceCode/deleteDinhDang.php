<?php
    session_start();
    if (isset($_SESSION['Login']) && $_SESSION['TypeUser'] == 0){
        include 'connect.php';
        $sql = $connect->prepare('DELETE FROM `blacklist` WHERE `STT` = ?');
        $sql->bind_param('s', $_GET['data']);
        $sql->execute();

        echo json_encode(array('status'=>1, 'mess'=>"Xóa thành công"));
    }else
    {
        echo json_encode(array('status'=>0, 'mess'=>"Lỗi không xác định"));
    }
?>