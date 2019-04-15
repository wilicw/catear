<?php
    session_start();
	require('function.php');
    if(isset($_SESSION['user'])){
        echo "<meta http-equiv='refresh' content='1;url=admin_edit.php'>";
    }else{
    }
?>
    <?php head(); ?>

    <body style="background-color: rgb(242, 240, 255)">
        <?php if(isset($_SESSION['user'])): ?>
        <h1>錯誤</h1>
        <?php else: ?>
        <div class="card panel-group">
            <!-- Title -->
            <div class="sec-title">
                <h4 class="container-fluid">
                    <span>後台 -- 登入</span>
                    <a href="index.html"><button type="button" class="btn">回首頁</button></a>
                </h4>
                <hr>
            </div>
            <form class="container-fluid" method="post" action="action.php">
                <input type="hidden" name="action" value=login_check>
                <div class="form-group col-sm-12">
                    <input type="text" name="acc" class="form-control" placeholder="帳號">
                </div>
                <div class="form-group col-sm-12">
                    <input type="password" name="pass" class="form-control" placeholder="密碼">
                </div>
                <div class="form-group col-sm-12">
                    <input type="text" name="code" class="form-control" placeholder="驗證碼">
                </div>
                <div class="form-group col-sm-12">
                    <?php
                        for($i=0;$i<4;$i++){
                            echo "<img src='img.php?q=".($i+1)."' id='img".($i+1)."'/>";
                        }
                    ?>
                </div>
                <div class="form-group col-sm-12">
                    <input type="button" name="change" class="btn btn-default" value="更換驗證碼">
                </div>
                <div class="form-group col-sm-12">
                    <input type=button class='btn btn-primary' value=登入 name="check">
                    <input type="reset" name="reset" class="btn btn-default" value="重設">
                    <input type=button class='btn btn-success' value=註冊新帳號 data-toggle="modal" data-target="#myModal">
                </div>
            </form>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">註冊新帳號</h4><small>只有三校四社的人能註冊，本系統採人工審核制</small>
                    </div>
                    <div class="modal-body">
                        <form class="container-fluid">
                            <div class="sec-title">
                                <h4 class="container-fluid">
                                    <span>個人資料</span>
                                    <span id="icon1" class="pull-right">
                                            <span class="glyphicon glyphicon-pencil" style="color:rgb(51, 51, 51)"></span>
                                    </span>
                                </h4>
                                <hr>
                            </div>

                            <div id="sec1" class="container-fluid row">

                                <div class="form-group col-sm-12">
                                    <input placeholder="姓名" name="name" type="text" class="form-control" required>
                                </div>

                                <div class="form-group col-sm-12">
                                    <input placeholder="email" name="email" type="text" class="form-control" required>
                                </div>

                                <div class="form-group col-sm-12">
                                    <select name="school" class="form-control">
                                        <option disabled selected='true' value="-">請選擇你的學校</option>
                                        <option value="1">大安高工電腦研究社</option>
                                        <option value="2">師大附中電子計算機研究社</option>
                                        <option value="3">師大附中校園網路管理小組</option>
                                        <option value="4">松山高中資訊研究社</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12">
                                    <input placeholder="請輸入你要的帳號" name="account" type="text" class="form-control" required>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input placeholder="請輸入你要的密碼" name="pass1" type="password" class="form-control" required>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input placeholder="請重新一次輸入密碼" name="pass2" type="password" class="form-control" required>
                                </div>
                                <button type=button class='btn btn-primary' name=submit_n>送出</button>
                                <button type=reset style="display:none;" name=reset></button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default close_this" data-dismiss="modal">關閉</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('[name=submit_n]').click(function(){
                var name=$('[name=name]').val();
                var school=$('[name=school]').val();
                var account=$('[name=account]').val();
                var pass1=$('[name=pass1]').val();
                var pass2=$('[name=pass2]').val();
                var email=$('[name=email]').val();
                if(name!=""&&school!=null&&account!=""&&pass1!=""&&pass2!=""&&email!=""){
                    if(pass1==pass2){
                        $.post("action.php", {
                            action: "new_member",
                            name: name,
                            school:school,
                            account:account,
                            pass:pass1,
                            email:email
                        },
                        function(resp) {
                            if(resp=="註冊成功，請耐心等待管理員作業"){
                                $('[name=reset]').click();
                                $('.close_this').click();
                            }
                            alert(resp);
                        });
                    }else{
                        alert('兩個密碼不相符');
                    }
                }else{
                    alert('格子請勿空白');
                }
            })
            $('[name=check]').click(function(){
                var pass=$('[name=pass]').val();
                var acc=$('[name=acc]').val();
                var code=$('[name=code]').val();
                $.post("action.php", {
                        action: "login_check",
                        acc: acc,
                        pass:pass,
                        code:code
                    },
                    function(resp) {
                        $('body').html(resp);
                    });
            })
            $('[name=change]').click(function(){
                var r = new Date().getTime();
                $('#img1').attr("src",'img.php?q=1&v=' + r);
                $('#img2').attr("src",'img.php?q=2&v=' + r);
                $('#img3').attr("src",'img.php?q=3&v=' + r);
                $('#img4').attr("src",'img.php?q=4&v=' + r);
            });
            $('[name=change]').click();
        </script>
        <?php endif; ?>
    </body>

    </html>