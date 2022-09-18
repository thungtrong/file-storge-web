<?php
    session_start();
    if (isset($_SESSION['Login'])){
        include 'connect.php';
        $sql = $connect->prepare('SELECT `DINHDANG` FROM `blacklist`');
        $sql->execute();
        $result = $sql->get_result();
        $blackList = array();
        while ($row = $result->fetch_row()) {
            $blackList[] = $row;
        }
        echo json_encode(array ('status'=>1, 'mess'=>'Nhận được blackList', 'blackList'=>$blackList));
    } else{
        echo json_encode(array('status' =>0, 'mess'=>'Lỗi không xác định'));
    }

?>