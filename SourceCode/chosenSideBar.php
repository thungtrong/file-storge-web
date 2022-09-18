<?php
    session_start();
    if (isset($_SESSION['Login'])){
        $username = $_SESSION['Login'];
        include 'connect.php';
        $query = '';
        $chosen = $_GET['chosen'];
        $typeUser = $_SESSION['TypeUser'];
        if ($chosen==2){
            // Load ve nhung file duoc chia se tu bang chia se
            $subQuery = " `USERNAME` = ? AND ";
            if ($typeUser == 0){
                $subQuery = "";
            }
            $query = "SELECT cs.`MATHUCTHE`, `TEN`, `TYPETHUCTHE`, `DAUSAO` 
            from `chiase` as cs JOIN `thucthe` as tt
            WHERE ".$subQuery." cs.MATHUCTHE = tt.MATHUCTHE";
            
        } else {
            $subQuery = "AND `chusohuu` = ?";
            if ($typeUser == 0){
                $subQuery = "";
            }
            if ($chosen==3){
                // Load nhung file gan day cua chu so huu, bang ganday
                $query = "SELECT `MAFILE` as `MATHUCTHE`,`TEN`, `TYPETHUCTHE`, `DAUSAO` 
                FROM `ganday` as gd JOIN `thucthe` as tt 
                WHERE gd.Mafile = tt.`Mathucthe` ".$subQuery." 
                and gd.MAFILE <> (SELECT `THUMUCROOT` FROM `thongtinnguoidung` WHERE `username` = ?) ORDER by MOLANCUOI DESC";
            } else if ($chosen==4){
                // Load nhung file gan dau sao cua chu so huu
                $query = "SELECT `MATHUCTHE`,`TEN`, `TYPETHUCTHE`, `DAUSAO` FROM `thucthe` WHERE `DAUSAO`= 1 ".$subQuery." ORDER by TEN";
            } else if ($chosen==5){
                // Load nhung thuc the da xoa, trong vong 30 ngay, dong thoi nhung file tren 30 ngay se bi xoa han
                $sql = $connect->prepare("DELETE FROM thucthe WHERE `MATHUCTHE` IN (SELECT `MATHUCTHE` FROM thungrac WHERE (DATEDIFF(CURRENT_DATE(), `NGAYXOA`)) > 30);");
                $sql->execute();
                $sql->prepare("DELETE FROM thungrac WHERE (DATEDIFF(CURRENT_DATE(), `NGAYXOA`)) > 30;");
                $sql->execute();
                $query = "SELECT `MATHUCTHE`,`TEN`, `TYPETHUCTHE`, `DAUSAO` FROM `thucthe` WHERE `TRANGTHAI`= 0 ".$subQuery." ORDER by TEN";
            }
        }
        $sql = $connect->prepare($query);
        if ($typeUser == 0){
            if ($chosen==3){
                $sql->bind_param('s', $username);
            } 
        } else {
            if ($chosen==3){
                $sql->bind_param('ss', $username, $username);
            } else{
                $sql->bind_param('s', $username);
            }
        }
        
        $sql->execute();
        $result = $sql->get_result();
        $dataF = array();
        while ($row = $result->fetch_assoc()){
            $dataF[] = $row;
        }
        echo json_encode(array('status'=>1,'mess'=>'Success', 'dataF'=>$dataF));
    } else{
        echo json_encode(array ('status'=>0, 'mess'=>'Lỗi không xác định!'));
    }
?>