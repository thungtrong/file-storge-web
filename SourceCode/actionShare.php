<?php
    session_start();
    if (isset($_SESSION['Login'])){

        include 'connect.php';
        $username = $_POST['username'];
        $passwordShare = $_POST['passwordShare'];
        $maThucThe = $_POST['MATHUCTHE'];

        $sql = $connect->prepare('SELECT `USERNAME` from `taikhoan` where `USERNAME` = ?');
        $sql->bind_param('s', $username);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows === 0){
            echo json_encode(array('status'=>0, 'mess'=>'Người dùng không tồn tại!'));
            exit(0);
        }
        if (isset($_POST['setpassword'])){
            $sql = $connect->prepare("SELECT `MATHUCTHE` FROM `matkhaushare` where `MATHUCTHE` = ?");
            $sql->bind_param('s', $username);
            $sql->execute();
            $result = $sql->get_result()->num_rows;
            if ($result > 0){
                $sql = $connect->prepare("UPDATE `matkhaushare` set `matkhau` = ? where `mathucthe` = ?");
                $sql->bind_param('ss', $passwordShare,$maThucThe);
            } else {
                $sql = $connect->prepare('INSERT INTO `matkhaushare` values(?,?)');
                $sql->bind_param('ss', $maThucThe, $passwordShare);
            }
            $sql->execute();
        }
       
        $sql = $connect->prepare("INSERT INTO `chiase`(`MATHUCTHE`, `USERNAME`) VALUES (?,?)");
        $sql->bind_param('ss', $_POST['MATHUCTHE'], $username);
        $sql->execute();
        
        if ($sql->affected_rows){
            echo json_encode(array('status' =>1, 'mess'=> 'Chia sẻ thành công!'));
        }
    } else {
        echo json_encode(array('status' =>0,'mess'=>'Lỗi không xác định!'));
    }
?>