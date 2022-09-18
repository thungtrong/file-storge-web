<?php
    session_start();
    // Phai cap nhat thoi gian mo vao bang gan day
    if (isset($_SESSION['Login'])){
        // Type, username, id 
        $userName = $_SESSION['Login'];
        include 'connect.php';
        $maThucThe = '';
        $sort1 = 'ASC';
        if (isset($_POST['sort'])){
            $sort1 = $_POST['sort'];
        }
        if ($_POST['types']==1 || $_POST['types']==3) {
            
            // Data thu hai cho tap cac Folder truc thuoc $result['MATHUCTHE']
            if ($_POST['types']==1){     
                $sql = $connect->prepare('SELECT `PATH_R`, `MATHUCTHE` FROM `thucthe` WHERE `MATHUCTHE` = (SELECT `THUMUCROOT` from `thongtinnguoidung` where `username` = ?)');
                $sql->bind_param('s', $userName);
                $sql->execute();
                $result = $sql->get_result();
                // Data dau tien cho PathBar
                $pathBar = $result->fetch_assoc();
                
                $pathBar['PATH_R'] = ltrim($pathBar['PATH_R'],'./');
                if (strripos($pathBar['PATH_R'], '/') != 0){
                    $pathBar['PATH_R'] = 'MyDrive';
                }
                $maThucThe = $pathBar['MATHUCTHE'];
            } else {
                $idread = $_POST['idread'];
                $sql = $connect->prepare("SELECT cs.`MATHUCTHE`, `TEN` FROM `chiaseall` as cs JOIN `thucthe` as tt WHERE  cs.`MATHUCTHE` = tt.`MATHUCTHE` and cs.IDREAD =  ?;");
                $sql->bind_param('s', $idread);
                $sql->execute();
                $result = $sql->get_result()->fetch_assoc();
                $maThucThe = $result['MATHUCTHE'];
                $pathBar = array();
                $pathBar[] = $result;
                
                $i = 0;
                $sql = $connect->prepare('SELECT tt2.`TRUCTHUOC` as `MATHUCTHE`, tt1.`TEN` FROM `thucthe` as tt1 JOIN `thucthe` as tt2 WHERE tt1.`MATHUCTHE` = tt2.`TRUCTHUOC` AND tt2.`MATHUCTHE` = ?');
                while ($pathBar[$i]['MATHUCTHE'] != 'FD00000001'){
                    $sql->bind_param('s', $pathBar[$i]['MATHUCTHE']);
                    $sql->execute();
                    $pathBar[] = $sql->get_result()->fetch_assoc();
                    $i += 1;
                }
                
                if ($_SESSION['TypeUser'] != 0){
                    array_pop($pathBar);
                }
            }

            $query = "SELECT `MATHUCTHE`, `TEN`, `TYPETHUCTHE`, `DAUSAO` FROM thucthe WHERE `TRUCTHUOC` = ? AND TRANGTHAI = 1 ORDER BY `TEN` $sort1";
            
            $sql = $connect->prepare($query);
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
            
            $result = $sql->get_result();
            $dataF = array();
            while ($row = $result->fetch_assoc()) {
                $dataF[] = $row;
            }
            // Dung luong da dung
            $sql = $connect->prepare('SELECT `DUNGLUONGDADUNG`,`FULLNAME` FROM `THONGTINNGUOIDUNG` WHERE `USERNAME` = ?');
            $sql->bind_param('s', $userName);
            $sql->execute();
            $memory = array();
            // Dung luong Da dung
            $result = $sql->get_result()->fetch_assoc();
            $memory['FULLNAME'] = $result['FULLNAME'];
            $memory[] = $result['DUNGLUONGDADUNG'];

            $sql = $connect->prepare('SELECT `DUNGLUONGMAX` from `loaitaikhoan` join `taikhoan` WHERE TYPE_TAIKHOAN = MATYPE and `USERNAME` = ?');
            $sql->bind_param('s', $userName);
            $sql->execute();
            $result = $sql->get_result()->fetch_assoc();
            // Dung luong MAX
            $memory[] = $result['DUNGLUONGMAX'];
            // Loai Tai khoan
           
            
            echo json_encode(array('pathBar'=>$pathBar, 'dataF'=>$dataF, 'memory'=>$memory));
            exit(0);
        } else if ($_POST['types']==2){
            $maThucThe = $_POST['maThucThe'];
            $query = "SELECT `MATHUCTHE`, `TEN`, `TYPETHUCTHE`, `DAUSAO` FROM thucthe WHERE `TRUCTHUOC` = ? AND TRANGTHAI=1 ORDER BY `TEN` $sort1";
            $sql = $connect->prepare($query);
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
            $result = $sql->get_result();
            $dataF = array();
            while ($row = $result->fetch_assoc()) {
                $dataF[] = $row;
            }
            echo json_encode(array('status' => 1,'dataF'=>$dataF));
            
        }
        if ($maThucThe !== ''){
            // Da co thi dung update, chua thi insert
            $sql = $connect->prepare('UPDATE `ganday` SET `MOLANCUOI` = CURRENT_DATE() where `MAFILE` = ?');
            $sql->bind_param('s', $maThucThe);
            $sql->execute();
        }
    } else {
        echo json_encode(array('status'=> -1, 'mess'=>'Chua dang nhap'));
    }
?>