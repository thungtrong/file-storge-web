<?php 
    include 'connect.php';
    if (mysqli_connect_errno()){
        echo json_encode(array('status' => 0,'mess' => "Lỗi không xác định"));
        die('Loi khong xac dinh' . mysqli_connect_error());
    }

    $sql = $connect->prepare('Select username from taikhoan where username = ?');
    $sql->bind_param('s', $_POST['tk']);
    $sql->execute();
    $check = $sql->get_result();
    if ($check->num_rows){
        echo json_encode(array('status'=>0,'mess'=>'Tài khoản đã tồn tại'));
    } else{
        // Them thong tin nguoi dung vao bang tai khoan
        $sql = $connect->prepare("INSERT INTO `taikhoan`(`USERNAME`, `PASSWORD_TK`) VALUES (?,?)");
        $sql->bind_param('ss', $_POST['tk'],$_POST['mk']);
        $sql->execute();

        // Tao khong gian cho tai khoan moi
        // Tim Last ID
        $sql = $connect->prepare("SELECT substring(max(MATHUCTHE),3,10) as tmp FROM thucthe WHERE `TYPETHUCTHE` = 0");
        $sql->execute();

        $lastid = $sql->get_result()->fetch_assoc()['tmp'];
        $lastid="FD".sprintf("%08d", $lastid+1);
        
        // Tao thu muc voi ten ngau nhien
        $chrs = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = substr(str_shuffle($chrs), 0, 10);
        $path = "./ROOT/".$name;
        while (file_exists($path)) {
            $name = substr(str_shuffle($chrs), 0, 10);
            $path = "./ROOT/".$name; // Path
        }
        
        if (!mkdir($path, 0777)){
            echo json_encode(array('status' => 0, 'mess'=>'Lỗi không xác định!'));
            exit(0);
        }

        $sql = $connect->prepare("INSERT INTO `thucthe`(`MATHUCTHE`, `CHUSOHUU`, `NGAYTAO`, `PATH_R`, `TEN`) VALUES (?,?,CURRENT_DATE(),?,?)");
        $sql->bind_param('ssss', $lastid, $_POST['tk'],$path, $name);
        $sql->execute();

        // Them du lieu vao Thong tin nguoi dung
        $sql = $connect->prepare("INSERT INTO `thongtinnguoidung`(`USERNAME`, `EMAIL`, `THUMUCROOT`,`FULLNAME`) VALUES (?,?,?,?)");
        $sql->bind_param('ssss', $_POST['tk'], $_POST['email'], $lastid, $_POST['fullname']);
        $sql->execute();
        // Them du lieu vao gan day
        $sql = $connect->prepare("INSERT INTO `ganday` values(?,CURRENT_DATE())");
        $sql->bind_param('s', $lastid);
        $sql->execute();


        echo json_encode(array('status' => 1, 'mess'=>'Đăng kỳ tài khoản thành công'));
    }

?>