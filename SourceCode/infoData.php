<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $maThucThe = $_GET['maThucThe'];
       include 'connect.php';

        $sql = $connect->prepare('SELECT `TRUCTHUOC` as "0" ,`CHUSOHUU` as "1", `size` as "2",`MOLANCUOI` as "3" ,`NGAYTAO` as "4" FROM `thucthe` as tt JOIN `ganday` as gd WHERE tt.`MATHUCTHE` = ? AND tt.`MATHUCTHE` = gd.`MAFILE`');
        $sql->bind_param('s', $maThucThe);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        
        $sql = $connect->prepare('SELECT `TEN` from `thucthe` where `MATHUCTHE` = ?');
        $sql->bind_param('s', $result[0]);
        $sql->execute();
        $result[0] = $sql->get_result()->fetch_assoc()['TEN'];
        echo json_encode(array('status'=>1, 'result'=>$result));
    } else{
        echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định'));
        exit(0);
    }
?>