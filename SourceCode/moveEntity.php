<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $maThucThe = $_GET['maThucThe'];
        $maThucTheMove2 = $_GET['maThucTheMove2'];
        // connect database
        include 'connect.php';

        $sql = $connect->prepare('SELECT `TEN`, `PATH_R` FROM `thucthe` WHERE  `MATHUCTHE` = ?');
        $sql->bind_param('s', $maThucThe);
        $sql->execute();
        $arr1 = $sql->get_result()->fetch_assoc();
        // lAY Duong dan cua thuc the 2
        $sql = $connect->prepare('SELECT `PATH_R` from `thucthe` where `mathucthe` = ?');
        $sql->bind_param('s', $maThucTheMove2);
        $sql->execute();
        $arr2 = $sql->get_result()->fetch_assoc();
        // Tao duong dan moi
        $subNewPath = $arr2['PATH_R'].'/'.$arr1["TEN"];
        if (substr($maThucThe,0,2) == 'FI'){
            // Neu la file
            if (!rename($arr1['PATH_R'], $subNewPath)){
                echo json_encode(array('status'=>0,'mess'=>'Lỗi không xác định!'));
                exit(0);
            }
            $sql = $connect->prepare('UPDATE `thucthe` SET `TRUCTHUOC` = ?, PATH_R = ? WHERE `MATHUCTHE` = ?');
            $sql->bind_param('sss', $maThucTheMove2, $subNewPath, $maThucThe);
            $sql->execute();
        
        } else{
            // DI chuyen thu muc trong he thong
            // // Cap nhat tat ca cac muc con
            if (!rename($arr1['PATH_R'], $subNewPath)){
                echo json_encode(array('status'=>0,'mess'=>'Lỗi không xác định!'));
                exit(0);
            }
            
            // DUong dan hien tai dung de lay tat ca cac thu muc con
            // bang SELECT * FROM `thucthe` WHERE PATH_R REGEXP ^PATH_R.[/A-z0-9]* vd './ROOT/MyDrive/asas[/A-z0-9]*'
            // Tao bang tam(MATHUCTHE, replace(PATH_R, oldPath, PATH_R(THUCTHE2))
            $sql = $connect->prepare('CREATE TEMPORARY TABLE bangtam(MATHUCTHE VARCHAR(12), NEWPATH VARCHAR(100), OLDPATH VARCHAR(100));');
            $sql->execute();
            $regex = '^'.$arr1['PATH_R'].'[/A-z0-9]*';            

            // Lay duong dan cua thu muc se duoc chuyen den, noi voi /.TEN de duoc duong dan moi gan vao mot bien
            // Cap nhat duong dan cua thu muc con  vd: REPLACE("SQL Tutorial", "SQL", "HTML");
            $sql = $connect->prepare("INSERT into bangtam
            SELECT `MATHUCTHE`, REPLACE(`PATH_R`, ?,?)as NEWPATH, `PATH_R` as OLDPATH
            FROM `thucthe`
            WHERE PATH_R REGEXP ?;");
            $sql->bind_param('sss',$arr1['PATH_R'], $subNewPath,$regex);
            $sql->execute();
            

            
            // // Cap nhat tat ca cac muc con
            // // Update THUCTHE SET PATH_R = (SELECT PATH_R FROM BANGTAM) WHERE MATHUCTHE IN (SELECT MATHUCTHE FROM BANGTAM)
            $sql = $connect->prepare('UPDATE THUCTHE as tt SET PATH_R = (SELECT NEWPATH 
                                                                        FROM bangtam 
                                                                        WHERE tt.MATHUCTHE = bangtam.MATHUCTHE)
                                     WHERE MATHUCTHE IN (SELECT MATHUCTHE FROM bangtam)');
            $sql->execute();
            // // // Cạp nhat thuc the,
            $sql = $connect->prepare('UPDATE `thucthe` SET `TRUCTHUOC`=? WHERE `MATHUCTHE` = ?');
            $sql->bind_param('ss', $maThucTheMove2, $maThucThe);
            $sql->execute();
        }
        
        echo json_encode(array('status'=>1,'mess'=>'Di chuyển thành công!', 'ten'=>$arr1['TEN']));
    } else {
        echo json_encode(array('status'=>0,'mess'=>'Lỗi không xác định!'));
    }
?>