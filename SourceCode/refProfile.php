<?php
    session_start();
    if (isset($_SESSION['Login'])){
        if ($_SESSION['TypeUser'] == 0){
            echo json_encode(array('status' => 3, 'mess'=>"Admin không được sửa đổi thông tin người dùng"));
            exit(0);
        }
        include 'connect.php';
        $query = 'UPDATE `thongtinnguoidung` SET '.$_GET['column'].' = ? WHERE USERNAME = ?';
        $sql = $connect->prepare($query);
        $sql->bind_param('ss', $_GET['value'], $_SESSION['Login']);
        $sql->execute();
        if ($connect->affected_rows==0){
            echo json_encode(array('status'=>0, 'mess'=> 'Cập nhật không thành công!'));
        } else {
            echo json_encode(array('status'=>1, 'mess'=> 'Cập nhật thành công!'));
        }
    } else {
        header('Location: login.php');
    }
?>  