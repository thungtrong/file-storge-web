<?php
    session_start();
    if (isset($_SESSION['Login']) && $_SESSION['TypeUser']==0){
        include 'connect.php';
        $sql = $connect->prepare('INSERT INTO `blacklist`(`DINHDANG`) VALUES (?)');
        $sql->bind_param('s', $_GET['data']);
        $sql->execute();
        echo json_encode(array('status' =>1, 'mess'=>'Thêm định dạng thành công'));
    } else {
        echo json_encode(array('status' =>0, 'mess'=>'Lỗi không xác định'));

    }
?>