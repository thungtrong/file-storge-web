<?php
    session_start();
    if (isset($_SESSION['Login'])){
        
        $maThucThe = $_GET['maThucThe'];
        if ($maThucThe == 'FD00000001' || $maThucThe == 'FD00000000' || $maThucThe == ''){
            echo json_encode(array('status'=>0, 'mess'=> 'Lỗi không xác định','dong'=>1));
            exit(0);
        }
        $types = $_GET['types'];
        include 'connect.php';
        
        $sql = $connect->prepare('SELECT `PATH_R`, `size`, `TRUCTHUOC` FROM `thucthe` WHERE `MATHUCTHE` = ?');
        $sql->bind_param('s', $maThucThe);
        $sql->execute();
        // Duong dan cua file or folder
        $result = $sql->get_result()->fetch_assoc();
        $pathR = $result['PATH_R'];
        $size = $result['size'];
        $trucThuoc = $result['TRUCTHUOC'];
        if ($types === "FD"){
            $sql = $connect->prepare('CREATE TEMPORARY TABLE bangtam(MATHUCTHE VARCHAR(12));');
            $sql->execute();
            // Vuong khoa ngoai -> Chon het cac MATHUCTHE -> xóa từng bảng

            $sql = $connect->prepare("INSERT INTO `bangtam` 
                                    SELECT `MATHUCTHE` 
                                    from `thucthe` 
                                    WHERE INSTR(`PATH_R`, ?) = 1 or `MATHUCTHE` = ?;");
            $sql->bind_param('ss', $pathR, $maThucThe);
            $sql->execute();
            // Bang chia se
            $sql = $connect->prepare('DELETE FROM `chiase` WHERE `MATHUCTHE` IN (SELECT `MATHUCTHE` from bangtam)');
            $sql->execute();
            // Bang chia se all
            $sql = $connect->prepare('DELETE FROM `chiaseall` WHERE `MATHUCTHE` IN (SELECT `MATHUCTHE` from bangtam)');
            $sql->execute();
            // Bang gan day 
            $sql = $connect->prepare('DELETE FROM `ganday` WHERE `MAFILE` IN (SELECT `MATHUCTHE` from bangtam)');
            $sql->execute();
            // Thung rac
            $sql = $connect->prepare('DELETE FROM `thungrac` WHERE `MATHUCTHE` IN (SELECT `MATHUCTHE` from bangtam)');
            $sql->execute();

            // thucthe
            $sql = $connect->prepare("DELETE FROM `thucthe` WHERE `MATHUCTHE` IN (SELECT `MATHUCTHE` from bangtam)");
            $sql->execute();
            $path = $pathR;
            $arr = array();
            
            while ($arr[] = glob($path)){
                $path .= '/*';
            }
            for ($i = count($arr) - 2;$i >= 0;$i--){
                for ($j = 0; $j < count($arr[$i]); $j++){
                    if (is_dir($arr[$i][$j])){
                        rmdir($arr[$i][$j]);
                    } else {
                        unlink($arr[$i][$j]);
                    }
                }
            }
        } else{
            
            if (!unlink($pathR)){
                echo json_encode(array('status'=>0, 'mess'=> 'Lỗi không xác định'));
                exit(0);
            }
            // Vuong khoa ngoai
            // Bang chia se
            $sql = $connect->prepare("DELETE from `chiase` WHERE `MATHUCTHE` = ?");
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
            // Bang chia se all
            $sql = $connect->prepare("DELETE from `chiaseall` WHERE `MATHUCTHE` = ?");
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
            // Bang gan day 
            $sql = $connect->prepare("DELETE FROM `ganday` WHERE `MAFILE` = ?");
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
            // Thung rac
            $sql = $connect->prepare("DELETE from `thungrac` WHERE `MATHUCTHE` = ?");
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
            // thucthe
            $sql = $connect->prepare("DELETE from `thucthe` WHERE `MATHUCTHE` = ?");
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
        }

        $sql = $connect->prepare('UPDATE `thucthe` set `size` = `size` - ? WHERE `MATHUCTHE` = ?');
        $sql1 = $connect->prepare('SELECT `TRUCTHUOC` from `thucthe` WHERE `MATHUCTHE` = ?');
        do {
            // Cap Nhat cho $maThucThe
            $sql->bind_param('ss', $size, $trucThuoc);
            $sql->execute();
            // Lay ra ma truc thuoc tiep theo
            $sql1->bind_param('s', $trucThuoc);
            $sql1->execute();
            $trucThuoc = $sql1->get_result()->fetch_assoc()['TRUCTHUOC'];
        } while ($trucThuoc != 'FD00000000');

        echo json_encode(array('status'=>1,'mess'=>'Xóa thành công!'));

    } else{
        echo json_encode(array('status'=>0, 'mess'=> 'Lỗi không xác định'));
    }
?>