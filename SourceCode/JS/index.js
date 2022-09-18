var MD5 = function(d){var r = M(V(Y(X(d),8*d.length)));return r.toLowerCase()};function M(d){for(var _,m="0123456789ABCDEF",f="",r=0;r<d.length;r++)_=d.charCodeAt(r),f+=m.charAt(_>>>4&15)+m.charAt(15&_);return f}function X(d){for(var _=Array(d.length>>2),m=0;m<_.length;m++)_[m]=0;for(m=0;m<8*d.length;m+=8)_[m>>5]|=(255&d.charCodeAt(m/8))<<m%32;return _}function V(d){for(var _="",m=0;m<32*d.length;m+=8)_+=String.fromCharCode(d[m>>5]>>>m%32&255);return _}function Y(d,_){d[_>>5]|=128<<_%32,d[14+(_+64>>>9<<4)]=_;for(var m=1732584193,f=-271733879,r=-1732584194,i=271733878,n=0;n<d.length;n+=16){var h=m,t=f,g=r,e=i;f=md5_ii(f=md5_ii(f=md5_ii(f=md5_ii(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_ff(f=md5_ff(f=md5_ff(f=md5_ff(f,r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+0],7,-680876936),f,r,d[n+1],12,-389564586),m,f,d[n+2],17,606105819),i,m,d[n+3],22,-1044525330),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+4],7,-176418897),f,r,d[n+5],12,1200080426),m,f,d[n+6],17,-1473231341),i,m,d[n+7],22,-45705983),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+8],7,1770035416),f,r,d[n+9],12,-1958414417),m,f,d[n+10],17,-42063),i,m,d[n+11],22,-1990404162),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+12],7,1804603682),f,r,d[n+13],12,-40341101),m,f,d[n+14],17,-1502002290),i,m,d[n+15],22,1236535329),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+1],5,-165796510),f,r,d[n+6],9,-1069501632),m,f,d[n+11],14,643717713),i,m,d[n+0],20,-373897302),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+5],5,-701558691),f,r,d[n+10],9,38016083),m,f,d[n+15],14,-660478335),i,m,d[n+4],20,-405537848),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+9],5,568446438),f,r,d[n+14],9,-1019803690),m,f,d[n+3],14,-187363961),i,m,d[n+8],20,1163531501),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+13],5,-1444681467),f,r,d[n+2],9,-51403784),m,f,d[n+7],14,1735328473),i,m,d[n+12],20,-1926607734),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+5],4,-378558),f,r,d[n+8],11,-2022574463),m,f,d[n+11],16,1839030562),i,m,d[n+14],23,-35309556),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+1],4,-1530992060),f,r,d[n+4],11,1272893353),m,f,d[n+7],16,-155497632),i,m,d[n+10],23,-1094730640),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+13],4,681279174),f,r,d[n+0],11,-358537222),m,f,d[n+3],16,-722521979),i,m,d[n+6],23,76029189),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+9],4,-640364487),f,r,d[n+12],11,-421815835),m,f,d[n+15],16,530742520),i,m,d[n+2],23,-995338651),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+0],6,-198630844),f,r,d[n+7],10,1126891415),m,f,d[n+14],15,-1416354905),i,m,d[n+5],21,-57434055),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+12],6,1700485571),f,r,d[n+3],10,-1894986606),m,f,d[n+10],15,-1051523),i,m,d[n+1],21,-2054922799),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+8],6,1873313359),f,r,d[n+15],10,-30611744),m,f,d[n+6],15,-1560198380),i,m,d[n+13],21,1309151649),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+4],6,-145523070),f,r,d[n+11],10,-1120210379),m,f,d[n+2],15,718787259),i,m,d[n+9],21,-343485551),m=safe_add(m,h),f=safe_add(f,t),r=safe_add(r,g),i=safe_add(i,e)}return Array(m,f,r,i)}function md5_cmn(d,_,m,f,r,i){return safe_add(bit_rol(safe_add(safe_add(_,d),safe_add(f,i)),r),m)}function md5_ff(d,_,m,f,r,i,n){return md5_cmn(_&m|~_&f,d,_,r,i,n)}function md5_gg(d,_,m,f,r,i,n){return md5_cmn(_&f|m&~f,d,_,r,i,n)}function md5_hh(d,_,m,f,r,i,n){return md5_cmn(_^m^f,d,_,r,i,n)}function md5_ii(d,_,m,f,r,i,n){return md5_cmn(m^(_|~f),d,_,r,i,n)}function safe_add(d,_){var m=(65535&d)+(65535&_);return(d>>16)+(_>>16)+(m>>16)<<16|65535&m}function bit_rol(d,_){return d<<_|d>>>32-_}

function loadDataType2(maThucThe){
    let sortA = $('#sort-entity').attr('data-sort');
    let check = true;
    $.post(
        'loadData.php',
        {types: 2, maThucThe: maThucThe, sort: sortA},
        function(data) {
            let dataF = data.dataF;
            $('.folder,.file').remove();
            
            creatFolderFiles(dataF);
        }, 'json'
    ).fail(function(){
        check = false;
    });
    return check;
}

function switchPath(e) {
    let maThucThe = e.id;
    let tmp = $(e).index();
    loadDataType2(maThucThe);

    $('ul#path-bar :gt('+tmp+')').remove();
}
function creatFolderFiles(dataF){
    let folderA = $('.container-folder');
    let FileA = $('.container-files');
    for (let i = 0; i < dataF.length; i++){
        if (dataF[i]['TYPETHUCTHE'] == 0){
            folderA.append("<div data-signedstar='"+dataF[i]['DAUSAO']+"' class='folder' id='"+dataF[i]['MATHUCTHE']+"'><i class='fas fa-folder' id='folder-text'></i>"+dataF[i]['TEN']+"</div>");
        } else {
            let extend = dataF[i]['TEN'].substring(dataF[i]['TEN'].lastIndexOf(".")+1);
            FileA.append("<div data-signedstar='"+dataF[i]['DAUSAO']+"' class='file' id = '"+dataF[i]['MATHUCTHE']+"'><div class='type-file'><span id = 'file-text'>"+extend.toUpperCase()+"</span></div><div class='file-name'><span id = 'file-text'>"+dataF[i]['TEN']+"</span></div>");
        }
    }

}

function cancelMove(e){
    console.log('Cancel move');
    $('.dom-active').removeClass('dom-active');
    $('.removeElement').remove();
}

function submitMove(e){
    console.log("submit move");
    let maThucThe = $(e).attr('data-maThucThe');
    let star = $(e).attr('data-star');
    let maThucTheMove2 = $('ul#path-bar li:last-child')[0].id;
    $.get(
        'moveEntity.php',
        {maThucThe: maThucThe, maThucTheMove2: maThucTheMove2},
        function (data) {
            alert(data['mess']);
            if (data['status']){
                if (maThucThe.substring(0,2) == "FD"){
                    $('.container-folder').append("<div data-signedstar='"+star+"' class='folder' id='"+maThucThe+"'><i class='fas fa-folder' id='folder-text'></i>"+data['ten']+"</div>")
                } else{
                    let extend = data['ten'].substring(data['ten'].lastIndexOf('.')+1);
                    $('.container-files').append("<div data-signedstar='"+star+"' class='file' id = '"+maThucThe+"'><div class='type-file'><span id = 'file-text'>"+extend.toUpperCase()+"</span></div><div class='file-name'><span id = 'file-text'>"+data['ten']+"</span></div>")
                }
            }
            $('.removeElement').remove();
        },
        'json'
    );

}
function chosenSidebar(e){
    let chosen = $(e).parents('.sub-tuychon').attr('data-chosen');
    if (!chosen){
        chosen = $(e).attr('data-chosen');
    }
    let header = ['MyDrive', 'Được chia sẻ với tôi', 'Gần đây', 'Có gắn dấu sao', 'Thùng rác'];
    $.get(
        'chosenSideBar.php',
        {chosen: chosen},
        function(data) {
            console.log(data);
            if (data['status']){
                $('.active').removeClass('active');
                $('ul.DStuychon li:eq('+(chosen-1)+') a').addClass('active');
                $('ul#path-bar :gt(0)').remove();
                let fristchild = $('ul#path-bar li:first-child');
                fristchild.text(header[chosen-1]);
                
                fristchild.attr('onclick', 'chosenSidebar(this);');
                fristchild.attr('data-chosen', chosen);

                $('.file, .folder').remove();
                creatFolderFiles(data['dataF']);
                
                if (chosen == 5){
                    $('.folder, .file').addClass('deleted');
                    
                    $('.folder.deleted').on('click',function(e){
                        alert('Thư mục đã xóa! Hãy khôi phục để có thể truy cập');
                    });
                    $('.folder.deleted').on('contextmenu', function(e){
                        let maThucThe;
                        if (e.target.tagName == 'DIV'){
                            maThucThe = $(e.target)[0].id;
                        } else {
                            maThucThe = $(e.target).parent()[0].id;
                        }
                        $('.manager-trash div').attr('data-mathucthe', maThucThe);
                        let x = event.clientX - 255;
                        let y = event.clientY - 70;
                        let manager = $('.manager-trash').show({width: '100%'});
                        manager.css('top', y+'px');
                        manager.css('left', x+'px');
                    });
                    $('.file.deleted').on('contextmenu',function(e) {
                        let maThucThe;
                        if (e.target.className === 'file deleted'){
                            
                            maThucThe = e.target.id;
                        } else{
                            maThucThe = $(e.target).parents('.file.deleted')[0].id;
                        }
                        $('.manager-trash div').attr('data-mathucthe', maThucThe);
                        let x = event.clientX - 255;
                        let y = event.clientY - 70;
                        let manager = $('.manager-trash').show({width: '100%'});
                        manager.css('top', y+'px');
                        manager.css('left', x+'px');
                    });
                }

            }
        }, 
        'json'
    ); 
}

function repairRow(e){
    let rowNum = $(e).attr('data-rownum');
    let table = $(e).attr('data-table');
    if (table==0){
        $('.input-row').attr('disabled', 'disabled');
        $('.row-user-'+rowNum+' .input-row:gt(0)').removeAttr('disabled');
        $('.row-user-'+rowNum+' .input-row:eq(1)').focus();
    } else{
        $('.input-row').attr('disabled', 'disabled');
        $('.row-blacklist-'+rowNum+' .input-row:gt(0)').removeAttr('disabled');
        $('.row-blacklist-'+rowNum+' .input-row:eq(1)').focus();
    }
    
}
function refSystem(rowData) {
    $.get(
        'refSystem.php',
        rowData,
        function(data) {
            console.log(data);
            alert(data.mess);
        },
        'json'
    )
}
function refAccout(e){
    let keyCode = event.keyCode || event.which;
    if (keyCode == 13){
        $('.input-row').attr('disabled', 'disabled');
        let rowInput = $(e).parents('tr').children().children('.input-row');
        let rowData = {'maType': rowInput[0].value, tenLoai: rowInput[1].value, 'dungLuongMax': rowInput[2].value, 'dungLuongUpload': rowInput[3].value};
        refSystem(rowData);
    }

}
function refBlackList(e){
    let keyCode = event.keyCode || event.which;

    if (keyCode == 13){
        $('.input-row').attr('disabled', 'disabled');
        let rowInput = $(e).parents('tr').children().children('.input-row');
        let rowData = {'STT': rowInput[0].value, 'dinhDang':rowInput[1].value};
        refSystem(rowData);
    }
}
function deleteRow(e){
    let table = $(e).attr('data-table');
    let rownum = $(e).attr('data-rownum');
    if (table == 1){
        let stt = $('.row-blacklist-'+rownum+' td:first-child .input-row').val();
        $.get(
            'deleteDinhDang.php',
            {data: stt},
            function(data){
                alert(data.mess);
                if (data.status==1){
                    $('.row-blacklist-'+rownum).remove();
                }
            },
            'json'
        )
    } 


}

function addRow(){
    console.log('submit-add-black-list');
    var dinhdang = $('#add-black-list').val();
    if (dinhdang!==''){
        $.get(
            'insertBlackList.php',
            {data: dinhdang},
            function (data) {
                console.log(data);
                alert(data.mess);
                if (data.status == 1){
                    let laststt = Number($('#body-black-list tr:last-child input')[0].value)+1;
                    let rownum = $('#body-black-list tr:last-child .repair-user-row').attr('data-rownum')+1;
                    $('#body-black-list').append('<tr class="row-blacklist-'+rownum+'"><td><input class="input-row" onkeyup="refBlackList(this)" type="text" disabled="disabled" value="'+laststt+'"></td><td><input class="input-row" onkeyup="refBlackList(this)" type="text" disabled="disabled" value="'+dinhdang+'"></td><td><div class="repair-user-row" data-rownum="'+rownum+'" data-table="1" onclick="repairRow(this);">Chỉnh sửa</div>|<div class="delete-user-row" data-rownum="'+rownum+'" data-table="1" onclick="deleteRow(this);">Xóa</div></td></tr>');
                }
            },
            'json'
        )
    } else{
        alert('Định dạng không được để trống!');
    }
}
$(document).ready(function () {
    // Function
    function contextClick(manager, managerF, managerFi){
        let x = event.clientX - 255;
        let y = event.clientY - 70;
        managerFi.hide();
        managerF.hide();
        manager.show({width: '100%'});
        manager.css('top', y + 'px');
        manager.css('left', x + 'px');
    }
    // Xac dinh Noi nhan
    var determine = function(tmp){
        let isFolder = 0;
        let isFile = 0;
        let currentF = 0;
        
        if (tmp.target.className != 'folder' && tmp.target.className != 'file'){
            isFolder = $(tmp.target).parents('.folder').length;
            isFile = $(tmp.target).parents('.file').length;
            
            if (isFolder >0){
                currentF = $(tmp.target).parents('.folder')[0].id; 
            } else if (isFile >0){
                currentF = $(tmp.target).parents('.file')[0].id;
            }
            
        } else {
            isFolder = 0;
            isFile = 1;

            if (tmp.target.className == 'folder'){
                isFolder = 1;
                isFile = 0;
            }
            currentF = tmp.target.id;
            
        }
        
        return [isFolder, isFile, currentF];
    }

    // Ajax load dữ liệu vào trang
    // Luc vua moi load trang
    let sortA = $('#sort-entity').attr('data-sort');
    var dataT = {types: 1, sort: sortA};

    if (location.hash.length > 10){
        dataT['types'] = 3;
        dataT['idread'] = location.hash.substring(1);;
    }
    $.post(
        "loadData.php",
        dataT,
        function (data) {
            // Tao Path bar &rsaquo;
            console.log(data);
            $('#dadung').text(data.memory[0]);
            $('#gioihan').text(data.memory[1]);
            $('.state-bar').css('width', (data.memory[0]*100)/data.memory[1]+'%');
            $('.user-name').text(data.memory['FULLNAME']);
            let pathBar = data.pathBar;
            let dataF = data.dataF;
            
            creatFolderFiles(dataF)
            if (dataT['types']===1){
                $('ul#path-bar').append("<li id='"+pathBar['MATHUCTHE']+"' onclick='switchPath(this);'>"+pathBar['PATH_R']+"</li>");            
            } else {
                let tmp = pathBar.pop();
                $('ul#path-bar').append("<li id= "+tmp['MATHUCTHE']+" onclick='switchPath(this);'> "+tmp['TEN']+"</li>");
                while (pathBar.length>0){
                    tmp = pathBar.pop();
                    $('ul#path-bar').append("<strong id='rsaquo'>&rsaquo;</strong><li id= "+tmp['MATHUCTHE']+" onclick='switchPath(this);'> "+tmp['TEN']+"</li>");
                }
            }
        },
        'json'
    );
    // Load khi click vao folder hoac file
    var loadFile = function(maThucThe){
        let image = ['JPG', 'GIF', 'PNG'];
        let audio = ['MP3', 'WMA', 'WAV', 'AAC'];
        let video = ['MP4', 'AVI', 'FLV'];
        let documentT = ['PDF', 'TXT']
        $.get(
            "openFile.php",
            {maThucThe: maThucThe},
            function (data) {
                let ex = $('#'+maThucThe+' span')[0].innerText;
                let name = $('#'+maThucThe+' span')[1].innerText;
                let screen = $('.screen-file');
                if (image.lastIndexOf(ex)!== -1){
                    screen.html("<img src='"+data["path"]+"' alt='"+name+"'>");
                } else if (audio.lastIndexOf(ex) !==-1){
                    // audio
                    screen.html('<div class="container-audio"><audio controls><source src="'+data["path"]+'" ></audio></div>');
                } else if (video.lastIndexOf(ex) !== -1){
                    // video
                    screen.html('<div class="container-audio"><video controls><source src="'+data["path"]+'"></video></div>');
                } else if (documentT.lastIndexOf(ex) !== -1){
                    screen.html('<iframe src="'+data["path"]+'" frameborder="0"></iframe>')
                }
                $('.view-file').show({width: '100%'});
            },
            'json'
        );
    }
    $(document).click(function (e) {
        var maThucThe = e.target.id;
        var determined = determine(e);
        maThucThe = determined[2];
        if (determined[1]==1){
            loadFile(maThucThe);
        } else if (determined[0]==1)
        {
            // Khi la folder
            if (loadDataType2(maThucThe))
                $('ul#path-bar').append("<strong id='rsaquo'>&rsaquo;</strong><li id= "+maThucThe+" onclick='switchPath(this);'> "+$('#'+maThucThe).text()+"</li>");
        }

        manager.hide();
        managerF.hide();
        managerFi.hide();
        $('.manager-trash').hide();
    });

    
    // Phan thao tac sau
    var manager = $('.manager-container');
    var managerF = $('.manager-folder');
    var managerFi = $('.manager-file');

    // Menu chuoi phai
    $(document).contextmenu(function (e) {
        let chosen = $('.active').parent('li').attr('data-chosen');
        if (chosen != 5){
            let determined = determine(e);
            let signed = $('#'+determined[2]).attr('data-signedstar');
            if (signed == 1){
                $('.options.sign-star').html("<i class='fas fa-star'></i>Gỡ dấu sao");
            } else{
                $('.options.sign-star').html("<i class='far fa-star'></i>Đánh dấu sao");
            }
            // Folder
            if (determined[0]==determined[1] && determined[0]!=2 ) {
                contextClick(manager,managerF,managerFi);
            } else{
                if (determined[1]==1){
                    contextClick(managerFi,managerF,manager);
                    managerFi.attr('id', determined[2]);
                } else
                {
                    contextClick(managerF,managerFi,manager);  
                    managerF.attr('id', determined[2]);
                }
            }
            $('manager-trash').hide();
        }
        e.preventDefault();
    });

    // Open bằng menu chuot phai
    $('.options.open').click(function(e) {
        let maThucThe = $(e.target).parent()[0].id;
        let types = maThucThe.substring(0,2);
        if (types == 'FD'){
            loadDataType2(maThucThe);
            $('ul#path-bar').append("<strong id='rsaquo'>&rsaquo;</strong><li id= "+maThucThe+" onclick='switchPath(this);'> "+$("#"+maThucThe).text()+"</li>");

        } else if (types == "FI"){
            console.log(maThucThe);
            loadFile(maThucThe);
        }
        
    });

    $('.options.creat-folder').click(function(){
        // Tao thu muc
        let maThucThe = $('ul#path-bar :last-child')[0].id;
        $('#label-name').text('Thư mục mới');
        $('#text-hide1').val(maThucThe);
        // Action = 1, tao thu muc
        $('#text-hide2').val('1');
        $('.view-function').show({width: '100%'});
     });
     $('.options.rename').click(function(e){
        // Doi ten
        let maThucThe = $(e.target).parent()[0].id;
        $('#text-hide1').val(maThucThe);
        
        $('#label-name').text('Đổi tên:');
        let typeF = maThucThe.substring(0,2);
        $('#text-hide2').val(typeF);
        if (typeF == "FI"){
            $('#Name').val($('#'+maThucThe+' .file-name #file-text:last-child').text()).focus();
        } else{
            $('#Name').val($('#'+maThucThe).text());
        }
        $('.view-function').show({width: '100%'});
    });
    $('#submit-form').click(function(){
        // submit form dung chu rename va create
        event.preventDefault();
        let dataForm = $('#form').serializeArray();
        $.get(
            'actionData.php',
            {MATHUCTHE:dataForm[0]['value'],actionPer:dataForm[1]['value'],Name:dataForm[2]['value']},
            function (data) {
                console.log(data);
                alert(data['mess']);
                if (data['status']){
                    
                    let folderA = $('.container-folder');
                    if (dataForm[1]['value']=='1'){ 
                        folderA.append("<div class='folder' id='"+data.dataF['MATHUCTHE']+"'><i class='fas fa-folder' id='folder-text'></i>"+dataForm[2]['value']+"</div>");
                    } else {
                        // Dổi tên file or thư mục bằng ID trong dataForm[0]
                        if (dataForm[1]['value']==="FD"){
                            $('#'+dataForm[0]['value']).html("<i class='fas fa-folder' id='folder-text' aria-hidden='true'></i>"+dataForm[2]['value']);
                        } else{
                            $('#'+dataForm[0]['value']+' #file-text:last-child')[0].innerText = dataForm[2]['value'].substring(dataForm[2]['value'].lastIndexOf('.'));
                        }
                    }
                    $('#form')[0].reset();
                    
                }
            },
            'json'
        );
        $('.view-function').hide();
        return false;
    });
    // Danh dau sao
    $('.options.sign-star').click(function (e){
        console.log(e.target);
        let maThucThe = $(e.target).parent()[0].id;
        let currentF = $('#'+maThucThe);
        let signStar = currentF.attr('data-signedstar');
        console.log(signStar);
        $.get(
            'signStar.php',
            {maThucThe: maThucThe, signedStar: signStar},
            function(data){
                alert(data.mess);
                if (data.status === 1){
                    currentF.attr('data-signedstar', data.result);
                }
            }, 'json'
        )
    });

    // Xem thong tin folder hoac file
    let loadInfo = function(maThucThe){
        $.get(
            'infoData.php',
            {maThucThe: maThucThe},
            function (data) {
                console.log(data);
                let dataInfo = data['result'];
                let targetI = $('.data-info:gt(0)');
                for (let i = 0; i < dataInfo.length;i++){
                    targetI[i].innerText = dataInfo[i];
                }
                $('.details-table-container').show({width: '100%'});
            },
            'json'
        );
    }
    // Xem thong tin folder
    $('.options.detailFD').click(function(e) {
        let maThucThe = $(e.target).parent('.manager-folder')[0].id;
        $('.detail-name').text($('#'+maThucThe).text());
        $('#info-type').text('Thư mục');
        // loadInfo(maThucThe);
        loadInfo(maThucThe);
    });
    // Xem thong tin folder hien tai
    $('.options.properties').click(function(e){
        let currentF = $('ul#path-bar li:last-child');
        let check = currentF.index();
        $('.detail-name').text(currentF.text());
        $('#info-type').text('Thư mục');
        let maThucThe = currentF[0].id;
        loadInfo(maThucThe);
        
        if (check === 0){
            $('#info-location').text('');
        } 
        $('.details-table-container').show({width: '100%'});

    });
    // Xem thoong tin file
    $('.options.detailFI').click(function(e) {
        let maThucThe = $(e.target).parent('.manager-file')[0].id;
        $('.detail-name').text($('#'+maThucThe+ ' #file-text')[1].innerText);
        $('#info-type').text('Tập tin');
        console.log('Nhan file');
        loadInfo(maThucThe);
        $('.details-table-container').show({width: '100%'});
    });
    // Di chuyen file or folder
    let chosenFMove = function(maThucThe){
        $('.dom-active').removeClass('dom-active');
        $('#'+maThucThe).addClass('dom-active');
        $('.removeElement').remove();
        $('.manager-container').prepend("<div onclick='cancelMove(this);'  class='options removeElement' ><i class='fas fa-people-carry'></i><span>Hủy chọn</span></div>");
        $('.manager-container').prepend("<div onclick='submitMove(this);'  class='options removeElement' data-star='"+$("#"+maThucThe).attr("data-signedstar")+"' data-maThucThe='"+maThucThe+"'><i class='fas fa-people-carry'></i><span>Di chuyển đến đây</span></div>");
    }
    $('.options.move1').click(function(e){
        let maThucThe = $(e.target).parent('.manager-folder')[0].id;
        chosenFMove(maThucThe);
    });

    $('.options.move2').click(function(e){
        let maThucThe = $(e.target).parent('.manager-file')[0].id;
        chosenFMove(maThucThe);
    });

    // Delete file or folder
    let deleteFDorFI = function(maThucThe){
        $.get(
            'deleteF.php',
            {maThucThe: maThucThe},
            function (data) {
                console.log(data);
                alert(data['mess']);
                if (data['status']){
                    $('#'+maThucThe).remove();
                }
            },'json'
        );
    }
    
    
    $('.options.deleteFI').click(function(e) {
        let maThucThe = $(e.target).parent('.manager-file')[0].id;
        deleteFDorFI(maThucThe);
    });

    $('.options.deleteFD').click(function(e){
        let maThucThe = $(e.target).parent('.manager-folder')[0].id;
        deleteFDorFI(maThucThe);
    });


   
    $('.close').click(function(){
        $('#form')[0].reset();
        $('.view-function').hide({width:0});
        $('#form-share')[0].reset();
        $('.view-share').hide({width:0});
    });
    
    $('.Cancel').click(function (e) {
        $('.view-file').hide({opacity: 0});
    });
    $('.cancel-detail').click(function (e) {
        $('.details-table-container').hide({width: 0});
    });
    $('#close-background').click(function (e) {
        $('.container-information-user').hide({opacity: 0});
    });
    $('.chieu-sapxep').click(function (e) {
        let check = $(e.target).attr('data-sort');
        let maThucThe = $('ul#path-bar li:last-child')[0].id;
        if (check === "ASC"){
            $('.chieu-sapxep').html('<i id="sort-entity" class="fas fa-arrow-up" data-sort= "DESC"></i>');    
            $('.chieu-sapxep').attr('data-sort', 'DESC');
        } else{
            $('.chieu-sapxep').html('<i id="sort-entity" class="fas fa-arrow-down" data-sort= "ASC"></i>');    
            $('.chieu-sapxep').attr('data-sort', 'ASC');
        }

        loadDataType2(maThucThe);
    });
    
    $('.sub-tuychon').click(function(e) {
        let chosen = $(e.target).parents('.sub-tuychon').attr('data-chosen');
        let maThucThe;
        let header = ['MyDrive', 'Được chia sẻ với tôi', 'Gần đây', 'Có gắn dấu sao', 'Thùng rác'];
        console.log(chosen);

        if (chosen == 1){
            maThucThe = $('ul#path-bar li:first-child').attr('id');
            if (loadDataType2(maThucThe)){
                $('.active').removeClass('active');
                $('ul.DStuychon li:eq(0) a').addClass('active');
                $('ul#path-bar :gt(0)').remove();
                if ($('.user-info').attr('data-typeuser') === "0"){
                    $('ul#path-bar li:first-child').text('ROOT');
                } else {
                    $('ul#path-bar li:first-child').text(header[chosen-1]);
                }
                $('ul#path-bar li:first-child').attr('onclick', 'switchPath(this);');
            }
        } else {
            chosenSidebar(e.target);
        }
        
    });
    
    //  Khôi phục file or folder trong thung rac trong
    $('.options.recovery').click(function(e){
        let maThucThe = $(e.target).attr('data-mathucthe');
        $.get(
            'recovery.php',
            {maThucThe: maThucThe},
            function(data){
                alert(data.mess);
                if (data['status'] == 1){
                    $('#'+maThucThe).remove();
                }
            }, 'json'
        );
    });
    // Xoa file vinh vien deleteFF -> delete File Folder Forever
    $('.options.deleteFF').click(function(e){
        console.log('Da chay');
        let maThucThe = $(e.target).attr('data-mathucthe');
        let types = maThucThe.substring(0,2);
        $.get(
            'deleteFF.php',
            {maThucThe: maThucThe, types: types},
            function(data){
                console.log(data);
                alert(data.mess);
                if (data['status'] == 1){
                    $('#'+maThucThe).remove();
                }
            }, 
            'json'
        );
    });

    // Them nguoi chia se
    $('.options.shareFD').click(function(e) {
        let maThucThe = $(e.target).parent('.manager-folder')[0].id;
        $('#text-hide').val(maThucThe);
        $('#form-share')[0].reset();
        $('.view-share').show({width: '100%'});
    });

    $('.options.shareFI').click(function(e) {
        let maThucThe = $(e.target).parent('.manager-file')[0].id;
        $('#text-hide').val(maThucThe);
        $('#form-share')[0].reset();
        $('.view-share').show({width: '100%'});
    });
    // Chia se bang link
    $('#cancel2').click(function(e){
        $('#share-link').hide({opacity: 0});
    });
    $('.options.share-link').click(function(e){
        let maThucThe = $(e.target).parents('.manager-file')[0];
        if (!$(e.target).parents('.manager-file')[0]){
            maThucThe = $(e.target).parents('.manager-folder')[0].id;
        } else{
            maThucThe = maThucThe.id;
        }
        let idread ;
        $.post(
            'shareAll.php',
            {maThucThe: maThucThe},
            function (data) {
                if (data.status==1){
                    idread = data.idread;
                    let link = 'http://localhost/php/DOAN/open.php?idread='+idread+'&state='+data.state;
                    $('#link-share').val(link);
                    if (data.state){
                        $('#share-permiss option:eq(0)').attr('selected','selected');

                    } else {
                        $('#share-permiss option:eq(1)').attr('selected','selected');
                    }
                    $('#share-link').show({opacity: 1});
                } else{
                    alert(data.mess);
                }
            },
            'json'
        );
        $('#share-permiss').on('change', function(e){
            let trangThai = $(e.target).val();
            if (trangThai){
                $('.content-permiss').text('Bất kỳ ai có kết nối Internet và có đường liên kết này đều có thể xem');
            }else{
                $('.content-permiss').text('Chỉ những người được thêm mới có thể mở bằng đường liên kết này');
            }
            $.get(
                'changePermiss.php',
                {maThucThe: maThucThe, trangThai: trangThai},
                function(data){
                    if (data['status'] == 1){
                        console.log('Da chay');
                        let link = 'http://localhost/php/DOAN/open.php?idread='+idread+'&state='+trangThai;
                        $('#link-share').val(link);
                        alert(data.mess);
                    }
                }, 
                'json'
            );
        });
    });
    // Copy link
    $('.copy-link').click(function (e) {
        let copyLink = $('#link-share')[0];
        copyLink.select();
        copyLink.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert('Đã copy đường dẫn');
    })
    // Ẩn/Hiện ô nhập mật khẩu
    $('#setpassword').change(function(){
        let typepw = $('#typespw');
        typepw.slideToggle('slow');
    });
    // Chia se file thu muc
    $('#submit-form1').click(function(){
        let dataForm = $("#form-share").serializeArray();
        if (dataForm[1]['value'] == ''){
            alert('Mời nhập người chia sẻ!');
            return false;
        }
        if (dataForm.length == 5){
            if (dataForm[3]['value'] == ''){
                alert('Mời chọn mật khẩu');
                return false;
            } else if (dataForm[3]['value'].length < 5){
                alert('Mật khẩu quá yếu!');
                return false;
            } 
            else if (dataForm[3]['value'] !== dataForm[4]['value']){
                alert('Xác nhận mật khẩu không chính xác');
                return false;
            }
            dataForm[3]['value'] = MD5(dataForm[3]['value']);
            dataForm.pop();
        }
        $.post(
            'actionShare.php',
            dataForm,
            function(data) {
                console.log(data);
                if (data.status == 1){
                    $("#form-share")[0].reset();
                    $('.view-share').hide({opacity: 0});
                }
            },
            'json'
        );
        event.preventDefault();
        return false;
    });
    let percentE = $('.upload-process-percent');
    let alertUpload = $('.alert-upload-process');
    
    $('#upload').ajaxForm({
        dataType: 'json',
        beforeSend: function() {
            // Tao danh sach tai len
            console.log('Da chay truoc khi upload');
            let Files = $('#file-upload')[0].files;
            let container = $('.container-upload-process');
            for (let i = 0; i < Files.length;i++){
                container.append('<div class="content-upload-process"><div class="info-file-upload"><div class="icon-type-file"><i class="fas fa-file"></i></div><div class="name-file">'+Files[i].name+'</div></div></div>');
            }
            alertUpload.text('Đang tải lên '+Files.length+' mục');
            percentE.css('width',0);
            container.show({opacity:1});
        },
        uploadProgress: function(event, position, total, percentComplete) {
            // trong qua trinh
            // Lam process bar
            
            
            console.log('Da chay trong khi upload');
            percentE.css('width', percentComplete+'%');

        },
        success: function(data) {
            // Khi thanh cong
            console.log(data);
            let FileA = $('.container-files');
            let extend;
            for (let i = 0; i < data.length; i++) {
                extend = data[i]['ten'].substring(data[i]['ten'].lastIndexOf('.'))
                FileA.append("<div data-signedstar='0' class='file' id = '"+data[i]['maThucThe']+"'><div class='type-file'><span id = 'file-text'>"+extend.toUpperCase()+"</span></div><div class='file-name'><span id = 'file-text'>"+data[i]['ten']+"</span></div>");
            }
            percentE.css('width', '100%');
            $('.content-upload-process').css('opacity',1);
            alertUpload.text('Đã tải lên '+data.length+' mục');
            let curent = $('#daDung').val();
            let max = Number($('#gioihan').text());
            $('#dadung').text(Math.ceil(curent));
            $('.state-bar').css('width', curent*100/max+'%');
        },
        complete: function(){
            $('#upload')[0].reset();
        }
    }); 

    $('#file-upload').change(function(){
        if ($('#file-upload')[0].files.length){
            // Kiem tra dinh dang truoc khi upload
            let Files = $("#file-upload")[0].files;
            let dadung = Number($('#dadung').text());
            let gioihan = Number($('#gioihan').text());
            let sum = 0;
            for (let i = 0; i < Files.length; i++){
                sum += Files[i].size;
            }
            sum = sum/1048576; 
            if (dadung + sum < gioihan){
                $('#daDung').val(dadung + sum);
                $('#tailen').val(sum);
                $.get(
                    'getCondition.php',
                    function(data) {
                        if (data.status == 1){
                            if (data['condition'] < sum){
                                alert("Vượt quá dung lượng tải lên cho phép!");
                            } else {
                                $.get(
                                    'getBlackList.php',
                                    function(data) {
                                        console.log(data);
                                        blackList = data.blackList.join(';');
                                        let check = true;
                                        let i = 0;
                                        while (i < Files.length && check){
                                            let nameF = Files[i].name;
                                            let arrE = nameF.split('.');
                                            let j = 0;
                                            while (j < arrE.length && check){
                                                if (blackList.lastIndexOf(arrE[j]) != -1){
                                                    check = false;
                                                }
                                                j+=1;
                                            }
                                            i+=1;
                                        }
                                        if (check){
                
                                            let locationU = $('ul#path-bar li:last-child')[0].id;
                                            $('#location-upload').val(locationU);
                                            $('#upload').submit();
                                        }
                                        
                                    },
                                    'json'
                                );
                            }
                        }
                    },
                    'json'
                );
                
               
            } else{
                alert("Vượt quá dung lượng lưu trữ cho phép");
            }
            
            
        }
    });
    
    $('#hide-box-upload').click(function(e){
        $(".content-upload-process").remove();
        $(".container-upload-process").hide({opacity: 1, width: "100%", height: 0});
    });
    $('#toggle-content').click(function(e){
        $(".content-upload-process").slideToggle({opacity: 0});
        $("#toggle-icon").toggleClass("fa-angle-down");
        $("#toggle-icon").toggleClass("fa-angle-up");
    });

   $('#search-file').keyup(function(e){
        let keycode = e.which || e.keyCode;
        if (keycode === 13) {
            console.log("Da chay");
            let kw = $('#search-file').val();
            
            $.get(
                'search.php',
                {'search-file':kw},
                function(data) {
                    console.log(data);
                    if (data.status === 1){
                        dataF = data.dataF;
                        $('.file, .folder').remove();
                        creatFolderFiles(dataF);
                        $('ul#path-bar :gt(0)').remove();
                        $('ul#path-bar li').text("Tìm kiếm");
                        $('#search-file').val("");
                    } else{
                        alert("Lỗi không xác định");
                    }
                   
                }, 
                'json'
            )
            
            

        }
        event.preventDefault();
        return false;
    });
    $('.search-box').submit(function(event) {
       event.preventDefault();
       return false;
    });

    $('.avata, #profile').click(function(event) {
       event.preventDefault();
       $.get(
           'getProfile.php',
            function(data){
                if (data.status === 1){
                    let profile = data.profile;
                    let dataInfo = $('.data-information');
                    console.log(profile);
                    
                    if (data.typeW == 1){
                        let j = 0;
                        for (let i in profile[0]){
                            dataInfo[j].value = profile[0][i];
                            j+=1;
                        }
                    } else {
                        let fullname, gioitinh, ngaysinh, tentaikhoan, email, dienthoai;
                            
                        let container = $('.container-information-user');
                        $('.box-information').remove();
                        for (let i = 0; i < profile.length; i++){
                            fullname = profile[i]['FULLNAME'];
                            gioitinh = profile[i]['GIOITINH'];
                            ngaysinh = profile[i]['NGAYSINH'];
                            tentaikhoan = profile[i]['USERNAME'];
                            email = profile[i]['EMAIL'];
                            dienthoai = profile[i]['DIENTHOAI'];
                            container.append('<div class="box-information"><div class="box-information-header">Thông tin tài khoản chung</div><hr/><div class="content-information"><div class="detail-information"><div class="label-information">Tên</div><input class="data-information" name="fullname" value="'+fullname+'" type="text" disabled placeholder="Tên"></input><div class="button-repair">Chỉnh sửa</div></div><div class="detail-information"><div class="label-information">Giới tính</div><input class="data-information" name="gioitinh" value="'+gioitinh+'" type="text" disabled placeholder="Giới tính"></input><div class="button-repair">Chỉnh sửa</div></div><div class="detail-information"><div class="label-information">Ngày sinh</div><input class="data-information" name="ngaysinh" value="'+ngaysinh+'" type="text" disabled placeholder="Ngày sinh"></input><div class="button-repair">Chỉnh sửa</div></div><div class="detail-information"><div class="label-information">Tên tài khoản</div><input class="data-information" name="username" value="'+tentaikhoan+'" type="text" disabled placeholder="Username"></input><div class="button-repair">Chỉnh sửa</div></div><div class="detail-information"><div class="label-information">Email</div><input class="data-information" name="email" value="'+email+'" type="text" disabled placeholder="Email"></input><div class="button-repair">Chỉnh sửa</div></div><div class="detail-information"><div class="label-information">Số điện thoại</div><input class="data-information" value="'+dienthoai+'" name="dienthoai" type="text" disabled placeholder="Số điện thoại"></input><div class="button-repair">Chỉnh sửa</div></div><input type="hidden" id="preInput" /></div></div>');
                        }
                        $('.box-information:gt(0)').hide();
                        $('.box-information:eq(0)').addClass('selected');
    
                    }
                } 
            },'json'
       ),
       $('.container-information-user').show({opacity:1});
    });

    // su kien nut chuyen slide
    $('#slide-next').click(function() {
        let currentSlide = $('.box-information.selected');
        let nextSlide = currentSlide.next('.box-information');
        
        if (nextSlide.length === 0) {
            alert('Đã tới trang cuối');
        } else {
            nextSlide.show({opacity:1});
            currentSlide.removeClass('selected');
            nextSlide.addClass('selected');
            currentSlide.hide({opacity:0});
        }
    });
    $('#slide-pre').click(function() {
        let currentSlide = $('.box-information.selected');
        let preSlide = currentSlide.prev('.box-information');;
        
        if (preSlide.length === 0) {
            alert('Đã tới trang đầu');
        } else {
            preSlide.show({opacity:1});
            currentSlide.removeClass('selected');
            preSlide.addClass('selected');
            currentSlide.hide({opacity:0});
        }
    });
    
    $('.button-repair').click(function (e){
        let locat = $(e.target).index('.button-repair');
        let targetI = $('.data-information:eq('+locat+')');
        targetI.removeAttr('disabled');
        targetI.focus();
        $("#preInput").val(targetI.val());
    });
    $('.data-information').keyup(function(e){
        let keycode = e.which || e.keyCode;
        if (keycode === 13) {
            let targetI = $(e.target);
            targetI.attr('disabled','disabled');
            let nameI = targetI[0].name;
            let valueI = targetI[0].value;
            $.get(
                'refProfile.php',
                {column: nameI, value: valueI},
                function(data) {
                    console.log(data);
                    if (data.status == 1){
                        alert(data.mess);
                        if (nameI == 'fullname'){
                            $('.user-name').text(valueI);
                        }
                    } else{
                        targetI.val($('#preInput').val());
                        alert(data.mess);
                    }
                }, 
                'json'
            ); 
        } 
    });
    $('#close-manager-user').click(function(){
        $('.manager-user').hide({opacity: 0});
    });

    $('#managerType').click(function(){
        console.log('Da chay');
        $.get(
            'getInfoSystem.php',
            function(data) {
                console.log(data);
                let blackList = data.BlackList;
                let typeUser = data.TypeUser;
                let bodyT = $('#body-type-user');
                let bodyB = $('#body-black-list');
                for (let i = 0; i < typeUser.length; i++) {
                    bodyT.append('<tr class="row-user-'+i+'"><td><input class="input-row" onkeyup="refAccout(this)" type="text" disabled="disabled" value="'+typeUser[i]['MATYPE']+'"></td><td><input class="input-row" onkeyup="refAccout(this)" type="text" disabled="disabled" value="'+typeUser[i]['TENLOAI']+'"></td><td><input class="input-row" onkeyup="refAccout(this)" type="text" disabled="disabled" value="'+typeUser[i]['DUNGLUONGMAX']+'"></td><td><input class="input-row" onkeyup="refAccout(this)" type="text" disabled="disabled" value="'+typeUser[i]['DUNGLUONGUPLOAD']+'"></td><td><div class="repair-user-row" data-rownum="'+i+'" data-table="0" onclick="repairRow(this);">Chỉnh sửa</div>');
                }
                for (let i = 0; i <blackList.length;i++){
                    bodyB.append('<tr class="row-blacklist-'+i+'"><td><input class="input-row" onkeyup="refBlackList(this)" type="text" disabled="disabled" value="'+blackList[i]['STT']+'"></td><td><input class="input-row" onkeyup="refBlackList(this)" type="text" disabled="disabled" value="'+blackList[i]['DINHDANG']+'"></td><td><div class="repair-user-row" data-rownum="'+i+'" data-table="1" onclick="repairRow(this);">Chỉnh sửa</div>|<div class="delete-user-row" data-rownum="'+i+'" data-table="1" onclick="deleteRow(this);">Xóa</div></td></tr>');
                }
            },
            'json'
        );
        $('.manager-user').show({opacity:1});
    });

    $('#addBlackList').click(function (e){
        $('#form-add-black-list').toggle({width: '100%'});
        $('.input-row').attr('disable', 'disabled');
        $('#add-black-list').removeAttr('disabled');
        $('#add-black-list').focus();
    });
    $('.submit-add-black-list').click(function (e){
        addRow();
    });

    $('#add-black-list').keyup(function(e) {
        let keycode = e.which || e.keyCode;
        if (keycode === 13) {
            addRow();
        }
    })
});

