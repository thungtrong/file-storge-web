<?php
    session_start();
    if (isset($_SESSION['Login'])){
       include 'connect.php';

        $sql = $connect->prepare('SELECT `PATH_R` from `thucthe` where `MATHUCTHE` = ?');
        $sql->bind_param('s', $_GET['maThucThe']);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc()['PATH_R'];

        $sql = $connect->prepare('UPDATE `ganday` SET `MOLANCUOI`=CURRENT_DATE() WHERE `MAFILE` = ?');
        $sql->bind_param('s', $_GET['maThucThe']);
        $sql->execute();

        echo json_encode(array('status'=>1, 'mess'=>'Success','path'=>$result));
    } else{
        echo json_encode(array('status'=>0, 'mess'=> 'Lỗi không xác định!'));
    }
?>