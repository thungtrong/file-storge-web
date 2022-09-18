<?php
    session_start();
    if (isset($_SESSION['Login'])){
        include 'connect.php';
        $sql = $connect->prepare('SELECT `Dungluongupload` FROM `taikhoan` join loaitaikhoan WHERE `TYPE_TAIKHOAN` = `MaType` AND `USERNAME` = ?');
        $sql->bind_param('s', $_SESSION['Login']);
        $sql->execute();
        $condition = $sql->get_result()->fetch_assoc()['Dungluongupload'];

        echo json_encode(array('status' =>1, 'mess'=>'Success', 'condition' => $condition));        
    } else {
        echo json_encode(array('status' =>0, 'mess'=>'Lỗi không xác định'));
    }

?>