<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $username = $_SESSION['Login'];
        $fileupload =  $_FILES['file-upload'];
        $trucThuoc = $_POST['maThucThe'];
        $daDung = $_POST['daDung'];
        $taiLen = $_POST['tailen'];
        $num = count($fileupload['name']);
        include "connect.php";
        
        // Lay duong dan truc thuoc
        $sql = $connect->prepare("SELECT `PATH_R` FROM `thucthe` WHERE `MATHUCTHE` = ?");
        $sql->bind_param('s', $trucThuoc);
        $sql->execute();
        // Duong dan
        $path = $sql->get_result()->fetch_assoc()['PATH_R'];

        $pathNew = array();
        for ($i = 0; $i < $num; $i++){
            $pathNew[] = $path . "/".$fileupload['name'][$i];
        }

        // DI chuyen ve thu muc
        for ($i = 0; $i < $num; $i++){
            move_uploaded_file($fileupload['tmp_name'][$i], $pathNew[$i]);
        }
        // Cap nhat database
        // Cap nhat dung luong da dung
        $sql = $connect->prepare('UPDATE `thongtinnguoidung` SET `DUNGLUONGDADUNG` = ? WHERE `USERNAME` = ?');
        $sql->bind_param('ss', $daDung, $username);
        $sql->execute();
        // Them file moi vao database
        // Lay ra lastid
        $sql = $connect->prepare("SELECT substring(max(MATHUCTHE),3,10) as tmp FROM thucthe WHERE `TYPETHUCTHE` = 1");
        $sql->execute();
        $lastid = $sql->get_result()->fetch_assoc()['tmp'] + 1;

        // Them dong vao thucthe
        $dataF = array();                              // (? ,            ?,    ? ,   CURRENT_DATE(),  ?,       ?,        ,?)
        $sql = $connect->prepare("INSERT INTO `thucthe`(`MATHUCTHE`, `TEN`, `CHUSOHUU`, `NGAYTAO`, `PATH_R`, `TRUCTHUOC` ,`size`, `TYPETHUCTHE`) VALUES (?,?,?,CURRENT_DATE(),?,?,?,'1')");
        for ($i = 0; $i < $num; $i++){
            $maThucThe = "FI".sprintf("%08d", $lastid);
            $size = $fileupload['size'][$i]/1048576;
            $sql->bind_param('ssssss', $maThucThe, $fileupload['name'][$i], $username, $pathNew[$i], $trucThuoc, $size);
            $sql->execute();
            $dataF[] = array('maThucThe'=>$maThucThe, 'ten'=>$fileupload['name'][$i]);
            $lastid+=1;
        }
        // Cap nhat dung luong cho tung thuc the co chứa file upload database
        $sql = $connect->prepare('UPDATE `thucthe` set `size` = `size` + ? WHERE `MATHUCTHE` = ?');
        $sql1 = $connect->prepare('SELECT `TRUCTHUOC` from `thucthe` WHERE `MATHUCTHE` = ?');
        do {
            // Cap Nhat cho $maThucThe
            $sql->bind_param('ss', $taiLen, $trucThuoc);
            $sql->execute();
            // Lay ra ma truc thuoc tiep theo
            $sql1->bind_param('s', $trucThuoc);
            $sql1->execute();
            $trucThuoc = $sql1->get_result()->fetch_assoc()['TRUCTHUOC'];
        } while ($trucThuoc != 'FD00000000');
        echo json_encode($dataF);
    }
?>