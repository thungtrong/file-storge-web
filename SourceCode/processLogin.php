<?php
session_start();
include 'connect.php';
if (mysqli_connect_errno()){
    die('Loi khong xac dinh' . mysqli_connect_error());
}


// Execute SQL
$sql = $connect->prepare("Select * from `taikhoan` where username = ? and password_tk = ?");
$sql->bind_param('ss', $_POST['tk'], $_POST['mk']);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows){
    $_SESSION['Login'] = $_POST['tk'];
    $_SESSION['TypeUser'] = $result->fetch_assoc()['TYPE_TAIKHOAN'];
    echo json_encode(array('status'=>1, 'message'=>'Login successful!'));
} else {
    echo json_encode(array('status'=>0, 'message'=>'Tài khoản hoặc mật khẩu không đúng!'));
}

?>