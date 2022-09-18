<?php
    session_start();
    if (isset($_SESSION['Login'])){ 
        include 'connect.php';
        $typeW = 0;
        if ($_SESSION['TypeUser'] == 0){
            $sql = $connect->prepare('SELECT `FULLNAME`, `GIOITINH`, `NGAYSINH`,`USERNAME`, `EMAIL`, `DIENTHOAI` FROM `thongtinnguoidung`');
        } else{
            $sql = $connect->prepare('SELECT `FULLNAME`, `GIOITINH`, `NGAYSINH`,`USERNAME`, `EMAIL`, `DIENTHOAI` FROM `thongtinnguoidung` WHERE `USERNAME` = ?');
            $sql->bind_param('s', $_SESSION['Login']);
            $typeW = 1;
        }
        
        $sql->execute();
        $result = $sql->get_result();
        $profile = array();
        while ($row = $result->fetch_assoc()){
            $profile[] = $row;
        }
        echo json_encode(array('status'=>1,'mess'=>'success', 'profile'=>$profile, 'typeW'=>$typeW));
    } else {
        echo json_encode(array('status'=>0, 'mess'=>"Lỗi không xác định"));
    }

?>