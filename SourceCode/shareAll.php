<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $maThucThe = $_POST['maThucThe'];

        include "connect.php";
        $sql = $connect->prepare('SELECT `IDREAD`, `QUYENTRUYCAP` FROM `chiaseall` WHERE `MATHUCTHE`=?');
        $sql->bind_param('s', $maThucThe);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows == 0) {
            $chrs = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $idread = substr(str_shuffle($chrs), 0, 10);
            $sql = $connect->prepare("INSERT INTO `chiaseall`(`MATHUCTHE`, `IDREAD`) VALUES (?,?)");
            $sql->bind_param('ss', $maThucThe, $idread);
            $sql->execute();
            echo json_encode(array('status' =>1, 'mess'=>'Tạo mới', 'idread'=>$idread, 'state'=>1));
            exit(0);
        } else{
            $idread = $result->fetch_assoc();
            echo json_encode(array('status'=>1, 'mess'=>'Có sẵn', 'idread'=>$idread['IDREAD'], 'state'=> $idread['QUYENTRUYCAP']));
            exit(0);
        }

    } else {
        echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định!'));
    }
?>