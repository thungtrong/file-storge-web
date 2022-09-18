<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $pattern = '/^[a-zA-Z0-9]*\.$/';
        $MATHUCTHE = $_GET['MATHUCTHE'];
        $Name = $_GET['Name'];
        if (preg_match($pattern, $Name)){
            echo json_encode(array('status'=>0, 'mess'=>'Tên không hợp lệ!'));
            exit(0);
        }
        $action = $_GET['actionPer'];
       include 'connect.php';
        // Tao thu muc
        if ($action==1){
            // Kiểm tra thư mục có tồn tại chưa
            $sql = $connect->prepare('SELECT `TEN` FROM `thucthe` WHERE TRUCTHUOC = ? AND `TEN` = ?');
            $sql->bind_param('ss', $MATHUCTHE, $Name);
            $sql->execute(); 
            $result = $sql->get_result();
            if ($result->num_rows > 0){
                echo json_encode(array('status'=>0,'mess'=>'Thư mục đã tồn tại!'));
                exit(0);
            }
            // Lấy path_R để tạo thư mục
            $sql = $connect->prepare('SELECT `PATH_R` FROM `thucthe` WHERE `MATHUCTHE` = ?');
            $sql->bind_param('s', $MATHUCTHE);
            $sql->execute(); 
            $result = $sql->get_result()->fetch_assoc();
            // Tao duong dan thu muc can tao
            $path_R = $result['PATH_R'];
            $path_R = $path_R . "/".$Name;

            if (mkdir($path_R, 0777)){
                // Tim Last ID
                $sql = $connect->prepare("SELECT substring(max(MATHUCTHE),3,10) as tmp FROM thucthe WHERE `TYPETHUCTHE` = 0");
                $sql->execute();

                $lastid = $sql->get_result()->fetch_assoc()['tmp'];
                $lastid="FD".sprintf("%08d", $lastid+1);
                // Them vao database
                $sql = $connect->prepare("INSERT INTO `thucthe`(`MATHUCTHE`, `CHUSOHUU`, `NGAYTAO`, `PATH_R`, `TEN`, `TRUCTHUOC`) VALUES (?,?,CURRENT_DATE(),?,?,?)");
                $sql->bind_param('sssss', $lastid, $_SESSION['Login'],$path_R, $Name,$MATHUCTHE);
                $sql->execute();
                // Them vao thoi gian
                $sql = $connect->prepare('INSERT INTO `ganday`(`MAFILE`, `MOLANCUOI`) VALUES (?,CURRENT_DATE())');
                $sql->bind_param('s', $lastid);
                $sql->execute();
                echo json_encode(array ('status'=>1, 'mess'=>'Tạo thư mục thành công!', 'dataF'=>array('MATHUCTHE'=>$lastid, 'TEN'=>$Name)));
            } else{
                echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định'));
                exit(0);
            }
        } else{
            // Action đổi tên
              
            $sql = $connect->prepare('SELECT `PATH_R` ,`TRUCTHUOC` FROM `thucthe` WHERE `MATHUCTHE` = ? AND `CHUSOHUU`=?');
            $sql->bind_param('ss', $MATHUCTHE, $_SESSION['Login']);
            $sql->execute();

            if ($row1 = $sql->get_result()->fetch_assoc()) {
                $row1['PATH_N'] = substr($row1['PATH_R'],0, strripos($row1['PATH_R'],"/"))."/".$Name;

                if (!rename($row1['PATH_R'], $row1['PATH_N'])){
                    echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định'));
                    exit(0);
                } else{
                    $sql = $connect->prepare('UPDATE `thucthe` SET `TEN`= ?, `PATH_R`= ? WHERE `MATHUCTHE` = ?');
                    $sql->bind_param('sss', $Name, $row1['PATH_N'], $MATHUCTHE);
                    $sql->execute();

                    echo json_encode(array('status'=>1, 'mess'=>'Đổi tên thư mục thành công!'));
                }
                
            } else {
                echo json_encode(array('status'=>0, 'mess'=>'Lỗi không xác định'));
                exit(0);
            }
            

        }
        
    }

?>