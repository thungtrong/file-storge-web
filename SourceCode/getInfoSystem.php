<?php
    session_start();
    if (isset($_SESSION['Login']) && $_SESSION['TypeUser']==0){
        include 'connect.php';
        $sql = $connect->prepare('SELECT * from `blacklist`');
        $sql->execute();
        $result = $sql->get_result();
        $blackList = array();
        while ($row = $result->fetch_assoc()){
            $blackList[] = $row;
        }
        $sql = $connect->prepare('SELECT * from `loaitaikhoan`');
        $sql->execute();
        $result=$sql->get_result();
        $typeUser = array(); 
        while ($row = $result->fetch_assoc()){
            $typeUser[] = $row;
        }
        echo json_encode(array('TypeUser' => $typeUser, 'BlackList' => $blackList));
    }
?>