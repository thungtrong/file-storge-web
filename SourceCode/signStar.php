<?php
    session_start();
    if (isset($_SESSION['Login'])){
        if (isset($_GET['maThucThe'])){
            include 'connect.php';
            $result = 0;
            $mess = '';
            if ($_GET['signedStar'] == 0){
                $sql = $connect->prepare('UPDATE `thucthe` SET `DAUSAO` = 1 where `MATHUCTHE` = ?');
                
                $result = 1;
                $mess = "Đánh dấu sao thành công!";
            } else{
                $sql = $connect->prepare('UPDATE `thucthe` SET `DAUSAO` = 0 where `MATHUCTHE` = ?');
                $mess = "Gỡ dấu sao thành công!";
            }
            $sql->bind_param('s', $_GET['maThucThe']);
            $sql->execute();
            echo json_encode(array('status'=>1, 'mess'=>$mess, 'result'=>$result));
        }
        else{
            echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định!'));
            exit();
        }
    } else {
        echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định!'));
    }
?>