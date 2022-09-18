<?php
    session_start();
    // Neu chua dang nhap thi phai dang nhap
    if (!isset($_SESSION['Login'])){
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Index</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="JS/jquery-3.4.1.min.js"></script>
        <script src="JS/290545dfed.js" crossorigin="anonymous"></script>
        <link href="fontawesome-free/css/fontawesome.css" rel="stylesheet">
        <link href="fontawesome-free/css/brands.css" rel="stylesheet">
        <link href="fontawesome-free/css/solid.css" rel="stylesheet">
        <link rel="stylesheet" href="css/index.css">
        <script src = "js/index.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script> 
    </head>
    <body>
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <a href="index.php" class="logo-link">
                    <i class="fab fa-artstation"></i>
                    <span class="label">Drive</span>
                </a>
            </div>
            <div class = "container-search-box">
                <form action="" class="search-box">
                    <button style="border-radius: 50%;height: 40px; width: 40px;" type ="search">
                        <i class="fas fa-search"></i>
                    </button>
                    <input type="text" name="search-file" placeholder="Search" id="search-file">
                </form>
            </div>
            <div class="user-info" data-typeuser="<?php echo $_SESSION['TypeUser']?>">
                <a href="" class="avata">
                    <i class="fas fa-user"></i>
                    <span class="user-name">Ho va ten</span>
                </a>
                <ul class="info-of-user">
                    <li><a href="#" id="profile">Quản lý tài khoản</a></li>
                    <?php
                    if ($_SESSION['TypeUser'] !=0)
                        echo "<li><a href='#' id='upTypeMemory'>Nâng cấp bộ nhớ</a></li>";
                    else
                        echo "<li><a href='#' id='managerType'>Quản lý hệ thống</a></li>";
                    if ($_SESSION['TypeUser']){
                    ?>
                    <li><a href="#">Hỗ trợ</a></li>
                    <?php
                    }?>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <hr width="99%" style="background-color: red; height: 5px; margin: 0px auto;border-radius: 50% "/>
    </div>
    <div class="container">
        <div class="side-bar">
            <div class="details-table-container">
                <div class="detail-table">
                        <div class="header-detail">
                            <i class="fas fa-folder"></i>
                            <div class="detail-name">Name file or folder</div>
                            <div class="cancel-detail">	&times;</div>
                        </div>
                        <div class="body-detail">
                            <div class="details">
                                <div class="label-info">Loại</div>
                                <div class="data-info" id="info-type">Thư mục</div>
                            </div>
                            <div class="details">
                                <div class="label-info">Vị trí</div>
                                <div class="data-info" id="info-location">Truc Thuộc</div>
                            </div>
                            <div class="details">
                                <div class="label-info">Chủ sở hữu</div>
                                <div class="data-info" id="info-ower">Username</div>
                            </div>
                            <div class="details">
                                <div class="label-info">Kích thước</div>
                                <div class="data-info" id="info-size">0</div>
                            </div>
                            <div class="details">
                                <div class="label-info">Mở lần cuối</div>
                                <div class="data-info" id="info-lastopen">Ngay</div>
                            </div>
                            <div class="details">
                                <div class="label-info">Được tạo</div>
                                <div class="data-info" id="info-location">Date</div>
                            </div>
                            
                        </div>
                    </div>
                <hr/>
            </div>
            <div class="tuychon">
                <ul class="DStuychon">
                    <li class="sub-tuychon" data-chosen='1'><a href="#" class="active">
                        <i class="fas fa-cloud"></i>
                        <span>Drive của tôi</span>
                    </a></li>
                    <li class="sub-tuychon" data-chosen='2'><a href="#">
                        <i class="fas fa-user-friends"></i>   
                        <span>Được chia sẻ với tôi</span>
                    </a></li>
                    <li class="sub-tuychon" data-chosen='3'><a href="#">
                        <i class="fas fa-history"></i>
                        <span>Gần đây</span>
                    </a></li>
                    <li class="sub-tuychon" data-chosen='4'><a href="#">
                        <i class="fas fa-star"></i>
                        <span>Có gắn dấu sao</span>
                    </a></li>
                    <li class="sub-tuychon" data-chosen='5'><a href="#">
                        <i class="fas fa-trash-alt"></i>
                        <span>Thùng rác</span>
                    </a></li>
                </ul>

            </div>
            <hr/>

            <div class="state-memory">
                <div>
                    <i class="fas fa-database"></i>
                    <span>Bộ nhớ</span>
                </div>
                <div class="state-group">
                    <div class="state">
                        <div class="state-bar"></div>
                    </div>
                    <p>Đã sử dụng <span id="dadung">2.5</span> MB trong tổng số <span id="gioihan">10</span> MB</p>
                </div>
            </div>
    
        </div>
        <div class="explorer">
            <div class="path-bar">
                <!-- Co the dung ul>li display: inline-table -->
                <ul id='path-bar'>
                    
                </ul>
            </div>
            <div class="container-explorer" >
                <div>
                    <div class="header-explorer" >
                            <span>
                            Thư mục
                        </span>
                        <button class="chieu-sapxep" id="sort-entity" data-sort="ASC">
                            <i class="fas fa-arrow-down" data-sort="ASC"></i>
                        </button>
                        
                    </div>
                    
                    <div class="container-folder">
                        
                    </div>
                    <div class="container-files">
                        <p>Tệp</p>
                        
                    </div>
                </div>
                <div class="manager-container">
                    <div class="options creat-folder">
                        <i class="fas fa-folder-plus"></i>
                        <span>Tạo thư mục</span>
                    </div>

                    <div class="options upload-file">
                        <i class="fas fa-file-upload"></i>
                        <span>Tải tệp lên</span>
                        <form action="upload.php" enctype="multipart/form-data" method="post" class= "upload" id="upload">
                            <input multiple="multiple" type="file" name="file-upload[]" id="file-upload">
                            <input type="hidden" name="maThucThe" value="" id='location-upload'>
                            <input type="hidden" name="daDung" value="" id="daDung">
                            <input type="hidden" name="tailen" value="" id="tailen">
                        </form>
                    </div>
                    <hr>
                    <div class ="options properties">
                        <i class="fas fa-info-circle"></i>
                        <span>Chi tiết</span>
                    </div>
                </div>
                <div class="manager-folder">
                    <div class="options open">
                        <i class="fas fa-folder-open"></i>
                        Mở
                    </div>
                    <hr/>
                    <div class="options shareFD">
                        <i class="fas fa-user-plus"></i>
                        Chia sẻ
                    </div>
                    <div class="options share-link">
                        <i class="fas fa-link"></i>
                        Nhận link kết chia sẻ
                    </div>
                    <div class="options move1">
                        <i class="fas fa-people-carry"></i>
                        Di chuyển tới
                    </div>
                    <div class="options rename">
                        <i class="fas fa-edit"></i>
                        Đổi tên
                    </div>
                    <div class="options sign-star" data-star="1">
                        <i class="far fa-star"></i>
                        Đánh dấu sao
                    </div>
                    <hr>
                    <div class="options detailFD">
                        <i class="fas fa-info-circle"></i>
                        Xem chi tiết
                    </div>
                    <div class="options deleteFD">
                        <i class="fas fa-trash-alt"></i>
                        Xóa
                        
                    </div>
                </div>
                <div class="manager-file">
                    <div class="options open">
                        <i class="fas fa-eye"></i>
                        Xem
                    </div>
                    <hr/>
                    <div class="options shareFI">
                        <i class="fas fa-user-plus"></i>
                        Chia sẻ
                    </div>
                    <div class="options share-link">
                        <i class="fas fa-link"></i>
                        Nhận link kết chia sẻ
                    </div>
                    <div class="options move2">
                        <i class="fas fa-people-carry"></i>
                        Di chuyển tới
                    </div>
                    <div class="options rename">
                        <i class="fas fa-edit"></i>
                        Đổi tên
                    </div>
                    <div class="options sign-star" data-star="0">
                        <i class="far fa-star"></i>
                        Đánh dấu sao
                    </div>
                    <div class="options copy">
                        <i class="fas fa-copy"></i>
                        Tạo bản sao
                    </div>
                    <hr>
                    <div class="options detailFI">
                        <i class="fas fa-info-circle"></i>
                        Xem chi tiết
                    </div>
                    <div class="options deleteFI">
                        <i class="fas fa-trash-alt"></i>
                        Xóa
                    </div>
                </div>
                <div class="manager-trash">
                    <div class="options recovery">
                        <i class="fas fa-eye"></i>
                        Khôi phục
                    </div>
                    
                    <div class="options deleteFF">
                        <i class="fas fa-user-plus"></i>
                        Xóa vĩnh viễn
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Khoi  -->
    

    <div class="view-function">
        <div class="background-function"></div>
        <form action="actionData.php" method="post" id="form" >
            <input type="hidden" name="MATHUCTHE" id="text-hide1" value="">
            <input type="hidden" name="actionPer" id="text-hide2" value="">

            <label for="Name" id="label-name">Đổi tên:</label><br />
            <input type="text" name="Name" id="Name" value=""><br />

            <input type="button" name='cancel' value="Cancel" id="cancel" class='close'>
            <input type="submit" name='submit' value="Sumit" id="submit-form">

        </form>
    </div>
    
    <div class="view-file">
        <div class="background-view-file">

        </div>
        <div class="Cancel">
            <i class="fas fa-arrow-left" style="color:white; font-size: 20px"></i>
        </div>
        <div class="screen-file">
            <!-- <img src="./img/img1/Background.jpg" alt=""> -->
            <!-- <iframe src="./img/img1/51800943_TranHungTrong.docx" frameborder="0" ></iframe> -->
            <!-- <div class="container-audio">
                <video controls>
                    <source src="./img/img1/Resume-1.mp4">
                </video>
            </div> -->
        </div>
    </div>
    <div class="view-share">
        <div class="background-share"></div>
        <form action="" method="post" id="form-share" autocomplete="disable">
            <input type="hidden" name="MATHUCTHE" id="text-hide" value="">
            <div class="group-input">
                <label for="Name" id="label-username">Chia sẻ với</label><br />
                <input type="text" name="username" id="input-username" value="" autocomplete="disable"><br />
            </div>
            <div class="group-input">
            
                <input type='checkbox' name="setpassword" id='setpassword' autocomplete="disable">
        
                <label for="setpassword" id="setpwcheck" >Đặt mật khẩu</label>
            </div>
            
            <div class="group-input" id ='typespw'>
                <label for="Name" id="label-password">Mật khẩu</label><br />
                <input type="password" name="passwordShare" id="passwordShare" value="" autocomplete="disable"><br />

                <label for="Name" id="label-password">Xác nhận mật khẩu</label><br />
                <input type="password" name="repasswordShare" id="repasswordShare" value="" autocomplete="disable"><br />
            </div>
            <input type="button" name='cancel' value="Cancel" id="cancel1" class="close cancel1">
            <input type="submit" name='submit' value="Sumit" id="submit-form1" class="submit-form1">

        </form>
    </div>

    <div id="share-link">
        <div class="background-share"></div>
        <div class="box-share-link">
            <div class="box-share-link-header">
                Chia sẻ với mọi người
            </div>
            <div class="box-share-link-content">
                <input type="text" id='link-share' value=''>
                <button class="copy-link">Copy link</button>
            </div>
            <div class="box-share-permiss">
                <select id="share-permiss">
                    <option value="1" >Bất kỳ ai có liên kết</option>
                    <option value="0">Bị hạn chế</option>
                </select>
                <div class="content-permiss">
                    Bất kỳ ai có kết nối Internet và có đường liên kết này đều có thể xem
                </div>
            </div>
            <div class="group-input">
            <input type="button" name='Xong' value="Xong" id="cancel2" class="cancel1">
            
            </div>
        </div>
    </div>
    <div class="container-upload-process">
        <div class="header-box-upload-process">
            <div class="alert-upload-process">Đang tải lên 1 mục</div>
            <div class="group-button-box">
                <div class="button-box" id='toggle-content'>
                    <i class="fas fa-angle-down" id="toggle-icon"></i>
                    <!-- <i class="fas fa-angle-up"></i> -->
                </div>
                <div class="button-box" id='hide-box-upload'>
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </div>
        <div class="upload-process-bar">
            <div class="upload-process-percent"></div>
        </div>
        <div class="container-content-upload-process">
            
        </div>
    </div>

    <!-- Thong tin tai khoan-->
    <div class="container-information-user">
        <div class="background-share"></div>
        <div class="Cancel" id="close-background">
            <i class="fas fa-arrow-left" style="color:white; font-size: 20px"></i>
        </div>
        <div class="box-information">
            <div class="box-information-header">
                Cài đặt tài khoản chung
            </div>
            <hr>
            <div class="content-information">
                
                <div class="detail-information">
                    <div class="label-information">
                        Tên
                    </div>
                    <input class="data-information" name='fullname' value="Tên" type="text" disabled placeholder="Tên">
                 
                    </input>
                    <div class="button-repair">
                        Chỉnh sửa
                    </div>
                </div>
                <div class="detail-information">
                    <div class="label-information">
                        Giới tính
                    </div>
                    <input class="data-information" name='gioitinh' value="Giới tính" type="text" disabled placeholder="Giới tính">
                 
                    </input>
                    <div class="button-repair">
                        Chỉnh sửa
                    </div>
                </div>
                <div class="detail-information">
                    <div class="label-information">
                        Ngày sinh
                    </div>
                    <input class="data-information" name="ngaysinh" value="Ngày sinh" type="text" disabled placeholder="Ngày sinh">
             
                    </input>
                    <div class="button-repair">
                        Chỉnh sửa
                    </div>
                </div>
                <div class="detail-information">
                    <div class="label-information">
                        Tên tài khoản
                    </div>
                    <input class="data-information" name="username" value="Username" type="text" disabled placeholder="Username">
         
                    </input>
                    <div class="button-repair">
                        Chỉnh sửa
                    </div>
                </div>
                <div class="detail-information">
                    <div class="label-information">
                        Email
                    </div>
                    <input class="data-information" name="email" value="Email" type="text" disabled placeholder="Email">
                   
                    </input>
                    <div class="button-repair">
                        Chỉnh sửa
                    </div>
                </div>
                <div class="detail-information">
                    <div class="label-information">
                        Số điện thoại
                    </div>
                    <input class="data-information" value="Số điện thoại" name="dienthoai" type="text" disabled placeholder="Số điện thoại">
            
                    </input>
                    <div class="button-repair">
                        Chỉnh sửa
                    </div>
                </div>
                <input type="hidden" id="preInput" >
            </div>
            
        </div>
        <?php
        if ($_SESSION['TypeUser']==0){
        ?>
        <div class="button-slide" id="slide-next">
            <i class="fas fa-angle-right"></i>
        </div>
        <div class="button-slide" id="slide-pre">
            <i class="fas fa-angle-left"></i>
        </div>
        <?php
        }
        ?>
    </div>
    
    <?php
        if ($_SESSION['TypeUser']==0){
    ?>
    <div class="manager-user">
        <div class="background-share"></div>
        <div class="Cancel" id="close-manager-user">
            <i class="fas fa-arrow-left" style="color:white; font-size: 20px"></i>
        </div>
        <div class="contentainer-table">
            <div class="container-body">
                <table class="table-type-user" id="type-user">
                    <thead>
                        <tr>
                            <th>Mã Loại</th>
                            <th>Tên loại</th>
                            <th>Dung lượng tối đa</th>
                            <th>Tải lên tối đa</th>
                            <th>        </th>
                        </tr>
                    </thead>
                    <tbody id="body-type-user">
                        
                    </tbody>
                </table>
            </div>
            <!-- Bang danh sach black list -->
            <div class="container-body">
                <table class="table-black-list" id="black-list">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Định dạng</th>
                            <th>    </th>
                        </tr>
                        <tr>
                            <th colspan="3" id='addBlackList'>Thêm định dạng</th>
                        </tr>
                        <tr id="form-add-black-list">
                            <td colspan="2"><input type="text" class="input-row" id='add-black-list'></td>
                            <td><div class="submit-add-black-list">Thêm</div></td>
                        </tr>
                    </thead>
                    <tbody id="body-black-list">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    }?>
    
</body>