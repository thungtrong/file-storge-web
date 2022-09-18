<?php 
    session_start();
    $check = isset($_SESSION['Login']);
    $idread = $_GET['idread'];
    $image = ['jpg', 'gif', 'png'];
    $audio = ['mp3', 'wma', 'wav', 'aac'];
    $video = ['mp4', 'avi', 'flv'];
    $documentT = ['pdf', 'txt'];
    include 'connect.php';
    $sql = $connect->prepare("SELECT `QUYENTRUYCAP`, `MATHUCTHE` FROM `chiaseall` WHERE `IDREAD` = ?");
    $sql->bind_param('s', $idread);
    $sql->execute();
    $result = $sql->get_result()->fetch_assoc();
    if ($result['QUYENTRUYCAP'] == 0){
        if (!$check){
            header('Location: login.php');
            exit(0);
        }
    }
    $maThucThe = $result['MATHUCTHE'];
    // Xac dinh mat khau
    $sql = $connect->prepare("SELECT `MATKHAU` FROM `matkhaushare` WHERE `MATHUCTHE`= ?");
    $sql->bind_param('s', $maThucThe);
    $sql->execute();
    $resultM = $sql->get_result();
    if ($resultM->num_rows != 0) {
        $resultM = $resultM->fetch_assoc()['MATKHAU'];
    } 

    if (isset($_POST['pass'])){
        print_r(md5($_POST['pass']));
        if ($resultM == md5($_POST['pass'])){
            $_SESSION['check'] = $resultM;
        }
    }
    if ($resultM == "" || isset($_SESSION['check'])){
        $sql = $connect->prepare("SELECT `TEN`,`TYPETHUCTHE`, `MATHUCTHE`, `PATH_R`, `CHUSOHUU` FROM `thucthe` as tt WHERE  tt.`MATHUCTHE` = ?");
        $sql->bind_param('s', $maThucThe);
        $sql->execute();
        $result = $sql->get_result();
        $typeF = $result->fetch_assoc();
        if ($check && $typeF['CHUSOHUU'] != $_SESSION['Login']){
            $sql = $connect->prepare("SELECT * FROM `chiase` WHERE `MATHUCTHE` = ?");
            $sql->bind_param('s', $typeF['MATHUCTHE']);
            $sql->execute();
            if ($sql->get_result()->num_rows == 0){
                $sql = $connect->prepare("INSERT INTO `chiase` VALUES(?,?)");
                $sql->bind_param('ss', $typeF['MATHUCTHE'], $_SESSION['Login']);
                $sql->execute();
            }  
        }
        if ($typeF['TYPETHUCTHE'] == 0 && $_SESSION['check']==$resultM){
            header('Location: index.php#'.$idread);
        }
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Form login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- link file JS -->
        <script src="JS/jquery-3.4.1.min.js"></script>
        <!-- Link thư viện để dùng icon -->
        <!-- <script src="JS/290545dfed.js" crossorigin="anonymous"></script> -->
        
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            .background-view-file{
                width: 100%;
                height: 100%;
                background-color: black;
                position: fixed;
                top: 0;
                z-index: 0;
                opacity: 0.6;
            }
            
            .container-audio {
                display: flex;
                height: 100%;
                align-items: center;
                justify-content: center;
            }

            .container-audio video {
                height: 80%;
                min-width: 70%;
                background-color: black;
                border: none;
            }
            
            .screen-file {
                position: fixed;
                z-index: 10;
                width: 100%;
                height: 100%;
                margin: 0px auto;
                text-align: center;
                top: 0;
            }

            .screen-file img{
                margin-top: 60px;
                height: 80%;
            }
            .screen-file iframe{
                height:100%;
                width:70%;
                background-color: white;
            }


            #form {
                position: absolute;
                top: 30%;
                left: 37%;
                z-index: 99;
                background: white;
                color: black;
                width: 25%;
                padding: 5px;
                border-radius: 15px;
            }
            input#Name {
                width: 60%;
                height: 20px;
                font-size: 21px;
                padding-left: 9px;
            }
            #form #cancel {
                background-color: black;
                opacity: 0.6;
                color: white;
                border: none;
                float: right;
                font-size: 20px;
                margin: 10px 5px;
                height: 30px;
            }

            #form #submit-form {
                background-color: white;
                color: black;
                padding: 4px;
                float: right;
                margin: 10px;
                border: 1px solid;
                font-size: 18px;
                opacity: 0.6;
            }
            #form #submit-form:hover, #form #cancel:hover{
                opacity: 1;
            }

            #form label {
                color: black;
                display: inline-block;
                height: 25px;
                margin-top: 10px;
                font-size: 19px;
            }
            .view-file {
                height: 100%;
                width: 100%;
            }
        </style>
    </head>
    <body>
    <?php 
    print_r($_SESSION['check']);
    print_r($resultM);
        if ($resultM == "" || (isset($_SESSION['check']) && $_SESSION['check'] == $resultM)){
            $exten = substr($typeF['TEN'], strripos($typeF['TEN'], '.')+1);
    ?>
    <div class="view-file">
    
        <div class="background-view-file">
        </div>
        
        <div class="screen-file">
        <?php 
            $path = $typeF['PATH_R'];
            
            if (in_array($exten, $image)){
                echo "<img src='$path' alt=''>";
            } elseif(in_array($exten, $audio)){
                echo "<div class='container-audio'><audio controls><source src='$path' ></audio></div>";
            } else {
                echo "<div class='container-audio'>
                <video controls>
                    <source src='$path'>
                </video>
            </div>";
            }
        ?>
            <!-- <iframe src="./img/img1/file1.pdf" frameborder="0" ></iframe> -->
            <!-- <div class="container-audio">
                <video controls>
                    <source src="./img/img1/Resume-1.mp4">
                </video>
            </div> -->
        </div>
    </div>
    <?php } else { ?>
        <div class="view-file">
        <div class="background-view-file"></div>
        <form action="" method="post" id="form" >
            <label for="Name" id="label-name">Mật khẩu:</label><br />
            <input type="password" name="pass" id="Name" value=""><br />

            <input type="button" name='cancel' value="Cancel" id="cancel" class='close'>
            <input type="submit" name='submit' value="Sumit" id="submit-form">

        </form>
    </div>
    <?php }?>

</body></html>