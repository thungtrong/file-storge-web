<?php
    session_start();
    if (isset($_SESSION['Login'])){
        include 'connect.php';
        $subQuery = '`CHUSOHUU` = ? and ';
        $kw = $_GET['search-file'];
        if ($_SESSION['TypeUser']==0){
            $subQuery = "";
        }
        $sql = $connect->prepare('SELECT * FROM `thucthe` Where '. $subQuery.' `TEN` REGEXP ?');
        if ($_SESSION['TypeUser']===0){
            $sql->bind_param('s', $kw);            
        } else {
            $sql->bind_param('ss', $_SESSION['Login'], $kw);
        }
        $sql->execute();
        $result = $sql->get_result();
        while ($row= $result->fetch_assoc()){
            $dataF[] = $row;
        }
        echo json_encode(array('status'=>1, 'mess'=>'Success', 'dataF'=>$dataF));
    } else {
        echo json_encode(array('status'=>0, 'mess'=>"Lỗi không xác định"));
    }
?>