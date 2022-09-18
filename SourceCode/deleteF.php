<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $maThucThe = $_GET['maThucThe'];
        $username = $_SESSION['Login'];
        include 'connect.php';
        // Lay ra chu so huu
        $sql = $connect->prepare("SELECT `CHUSOHUU` FROM `thucthe` where `MATHUCTHE` = ?");
        $sql->bind_param('s', $maThucThe);
        $sql->execute();
        $chusohuu = $sql->get_result()->fetch_assoc()['CHUSOHUU'];

        // Neu la cua chu so huu
        if ($chusohuu === $username){
            $sql = $connect->prepare('UPDATE `thucthe` SET `TRANGTHAI`= 0  WHERE `MATHUCTHE` = ?');
            $sql->bind_param('s', $maThucThe);
            $sql->execute();

            $sql->prepare('INSERT INTO `thungrac`(`MATHUCTHE`, `NGAYXOA`) VALUES (?,CURRENT_DATE())');
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
        } else {
            $sql = $connect->prepare('DELETE from `chiase` where `MATHUCTHE` = ? and `username` = ?');
            $sql->bind_param('ss', $maThucThe, $username);
            $sql->execute();
        }
        

        echo json_encode(array('status' =>1, 'mess'=>'Xóa thành công'));
    } else {
        echo json_encode(array('status'=>0, 'mess'=>"Lỗi không xác định!"));
    }
?>