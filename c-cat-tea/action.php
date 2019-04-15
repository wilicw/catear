<?php
	session_start();
	switch($_POST['action']){
		case 'editmember':
			editmember();
        break;
        case 'edit':
            edit_up();
        break;
        case "del_data":
            del_data();
        break;
        case "search_ga":
            search_ga();
        break;
        case "search_ac":
            search_ac();
        break;
        case "search_li":
            search_li();
        break;
        case "login_check":
            login_check();
        break;
        case "search_lo":
            search_lo();
        break;
        case "new_member":
            new_member();
        break;
        case "search_re":
            search_re();
        break;
        case "search_worker":
            search_worker();
        break;
        case "search_pa":
            search_pa();
        break;
        case "newmember":
            newmember();
        break;
        case "del_n_data":
            del_n_data();
        break;
        case "add_member":
            add_member();
        break;
    }
	
	function editmember(){
        require("connect.php");
		$result = mysqli_query($conn,"SELECT * FROM `integrated` WHERE `id` = '$_POST[id]'");
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
            ?>
    <form class="container-fluid" action="action.php" method="post">
    <input type=hidden name=action value=edit>
    <input type=hidden name=id value=<?=$_POST['id']?>>
        <!-- First Section - Profile -->
        <div>

            <!-- Title -->
            <div class="sec-title">
                <h4 class="container-fluid">
                    <span>個人資料</span>
                    <span id="icon1" class="pull-right">
                            <span class="glyphicon glyphicon-pencil" style="color:rgb(51, 51, 51)"></span>
                    </span>
                </h4>
                <hr>
            </div>

            <!-- Content -->
            <div id="sec1" class="container-fluid row">

                <!-- 姓名 name -->
                <div class="form-group col-sm-6">
                    <input placeholder="姓名" name="name" type="text" class="form-control" required autocomplete="name" value=<?=$row['name']?>>
                </div>

                <!-- 綽號 nick -->
                <div class="form-group col-sm-6">
                    <input placeholder="綽號" name="nick" type="text" class="form-control" required autocomplete="nickname" value=<?=$row['nick']?>>
                </div>

                <!-- 電話 tel -->
                <div class="form-group col-sm-6">
                    <input placeholder="電話 (0987654321)" name="tel" type="tel" class="form-control" required autocomplete="tel" value=<?=$row['tel']?>>
                </div>

                <!-- 電子郵件 mail -->
                <div class="form-group col-sm-6">
                    <input placeholder="電子郵件" name="mail" type="email" class="form-control" required autocomplete="email" value=<?=$row['mail']?>>
                </div>

                <!-- 就讀學校 school -->
                <div class="form-group col-sm-4">
                    <input placeholder="就讀學校" name="school" type="text" class="form-control" required value=<?=$row['school']?>>
                </div>

                <!-- 社團名稱 club -->
                <div class="form-group col-sm-4">
                    <input placeholder="社團名稱" name="club" type="text" class="form-control" required value=<?=$row['club']?>>
                </div>

                <!-- 級數 grade -->
                <div class="form-group col-sm-4">
                    <select name="grade" class="form-control">
                            <option disabled>請選擇級數</option>
                            <option value="百九" <?php echo ($row['grade']=="百九") ? ( "selected='true'" ) : ( "" );?>>百九</option>
                            <option value="百八" <?php echo ($row['grade']=="百八") ? ( "selected='true'" ) : ( "" );?>>百八</option>
                            <option value="百七以上" <?php echo ($row['grade']=="百七以上") ? ( "selected='true'" ) : ( "" );?>>百七以上</option>
                        </select>
                </div>

                <!-- 緊急聯絡人 emergency -->
                <div class="form-group col-sm-6">
                    <input placeholder="緊急聯絡人姓名" name="emrg" type="name" class="form-control" required autocomplete="name" value=<?=$row['emrg']?>>
                </div>

                <!-- 緊急聯絡人電話 emrgTel -->
                <div class="form-group col-sm-6">
                    <input placeholder="緊急聯絡人電話 (0987654321)" name="emrgTel" type="text" class="form-control" required autocomplete="tel"  value=<?=$row['emrgTel']?>>
                </div>

            </div>

        </div>

        <!-- Second Section - Join As -->
        <div>

            <!-- Title -->
            <div class="sec-title">
                <h4 class="container-fluid">
                    <span>參加方法</span>
                    <span id="icon2" class="pull-right">
                            <span class="glyphicon glyphicon-pencil" style="color:rgb(51, 51, 51)"></span>
                    </span>
                </h4>
                <hr>
            </div>

            <!-- Content -->
            <div id="sec2" class="container-fluid row">

                <!-- 食物 food -->
                <div class="form-group col-sm-4">
                    <select name="food" class="form-control">
                            <option disabled>請選擇食物</option>
                            <option value="葷食" <?php echo ($row['food']=="葷食") ? ( "selected='true'" ) : ( "" );?>>葷食</option>
                            <option value="素食" <?php echo ($row['food']=="素食") ? ( "selected='true'" ) : ( "" );?>>素食</option>
                            <option value="不需要" <?php echo ($row['food']=="不需要") ? ( "selected='true'" ) : ( "" );?>>不需要</option>
                        </select>
                </div>

                <!-- 住宿 live -->
                <div class="form-group col-sm-4">
                    <select name="live" class="form-control">
                            <option disabled>請選擇是否住宿</option>
                            <option value="0" <?php echo ($row['live']=="0") ? ( "selected='true'" ) : ( "" );?>>不住宿</option>
                            <option value="1" <?php echo ($row['live']=="1") ? ( "selected='true'" ) : ( "" );?>>住宿</option>
                        </select>
                </div>

                <!-- 集合地點 gather -->
                <div class="form-group col-sm-4">
                    <select name="gather" class="form-control">
                            <option disabled>請選擇集合地點</option>
                            <option value="1" <?php echo ($row['gather']=="1") ? ( "selected='true'" ) : ( "" );?>>台北車站M1出入口</option>
                            <option value="2" <?php echo ($row['gather']=="2") ? ( "selected='true'" ) : ( "" );?>>捷運市政府站1號出口</option>
                            <option value="3" <?php echo ($row['gather']=="3") ? ( "selected='true'" ) : ( "" );?>>松山高中正門口</option>
                        </select>
                </div>

            </div>

        </div>

        <!-- Third Section - Events -->
        <div>

            <!-- Title -->
            <div class="sec-title">
                <h4 class="container-fluid">
                    <span>參加項目</span>
                    <span class="pull-right">
                            <span id="icon3" class="glyphicon glyphicon-pencil" style="color:rgb(51, 51, 51)"></span>
                    </span>
                </h4>
                <hr>
            </div>

            <!-- Content -->
            <div id="sec3" class="container-fluid row">

                <!-- 夜遊 night -->
                <div class="form-group col-sm-6">
                    <select name="night" class="form-control" onchange="testInsurance()">
                            <option disabled>是否參加夜遊</option>
                            <option value="0" <?php echo ($row['night']=="0") ? ( "selected='true'" ) : ( "" );?>>不參加夜遊</option>
                            <option value="1" <?php echo ($row['night']=="1") ? ( "selected='true'" ) : ( "" );?>>參加夜遊</option>
                        </select>
                </div>

                <!-- 台北遊 taipei -->
                <div class="form-group col-sm-6">
                    <select name="taipei" class="form-control" onchange="testInsurance()">
                            <option disabled>是否參加台北遊</option>
                            <option value="0" <?php echo ($row['taipei']=="0") ? ( "selected='true'" ) : ( "" );?>>不參加台北遊</option>
                            <option value="1" <?php echo ($row['taipei']=="1") ? ( "selected='true'" ) : ( "" );?>>參加台北遊</option>
                        </select>
                </div>

                <!-- 保險用資訊 insurance -->
                <div id="insurance" class="panel-collapse container-fluid row">

                    <!-- 身分證字號 id -->
                    <div class="form-group col-sm-6">
                        <input placeholder="身分證字號 (保險用)" name="id_n" type="text" class="form-control" value=<?=$row['id_n']?>>
                    </div>

                    <!-- 生日 bday -->
                    <div class="form-group col-sm-6">
                        <input placeholder="生日 (保險用) (年/月/日)" name="bday" type="text" class="form-control" value=<?=$row['bday']?>>
                    </div>

                    <div class="form-group col-sm-12">
                        <input placeholder="備註欄" name="comment" type="text" class="form-control" value=<?=$row['comment']?>>
                    </div>

                </div>
                

            </div>

        </div>

        <br>
        <br>
        <div class="container">
            <button type="submit" style="margin-right: 40% !important;width:120px" class="btn btn-primary pull-right">送出</button>
        </div>
        <br>

        </div>
    </form>
    <?php
		}
    }
    
    function edit_up(){
        require("connect.php");
        $id=$_POST['id'];
        $name=$_POST['name'];
        $nick=$_POST['nick'];
        $tel=$_POST['tel'];
        $mail=$_POST['mail'];
        $school=$_POST['school'];
        $club=$_POST['club'];
        $grade=$_POST['grade'];
        $emrg=$_POST['emrg'];
        $emrgTel=$_POST['emrgTel'];
        $food=$_POST['food'];
        $live=$_POST['live'];
        $gather=$_POST['gather'];
        $night=$_POST['night'];
        $taipei=$_POST['taipei'];
        $id_n=$_POST['id_n'];
        $bday=$_POST['bday'];
        $comment=$_POST['comment'];
        $date=date("Y-m-d H:i:s");
        $sql="UPDATE `integrated` SET `id`='$id',`name`='$name',`nick`='$nick',`tel`='$tel',`mail`='$mail',`school`='$school',`club`='$club',`grade`='$grade',`emrg`='$emrg',`emrgTel`='$emrgTel',`food`='$food',`live`='$live',`gather`='$gather',`night`='$night',`taipei`='$taipei',`id_n`='$id_n',`bday`='$bday',`uptime`='$date',`comment`='$comment' WHERE `id`='$id';";
        mysqli_query($conn,$sql);
        echo "<script>alert('修改成功');</script>";
        echo "<meta http-equiv='refresh' content='1;url=admin_edit.php'>";
    }

    function del_data(){
        require("connect.php");
        $id=$_POST['id'];
        $sql="DELETE FROM `integrated` WHERE `id`='$id'";
        mysqli_query($conn,$sql);
        echo "<script>window.location.reload('admin_edit.php');</script>";
    }

    function search_ga(){
        require("connect.php");
        $gather=$_POST['gather'];
		$sql = "SELECT * FROM `integrated` WHERE `gather`='$gather' ORDER BY `integrated`.`time` ASC";
		$result = mysqli_query($conn,$sql);
		$db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
    ?>
            <table class='table'>
            <thead>
    					<tr>
							<!-- <th>ID</th> -->
							<th>姓名</th>
							<th>綽號</th>
						</tr>
                        </thead>
    <?php
			for($i=1;$i<=$db_rows;$i++){
						$row = mysqli_fetch_assoc($result);
	?>
                        <tbody>
						<tr <?php echo ($i%2==1) ? ( "" ) : ( "style='background-color:rgb(219, 218, 232)'" );?>>
							<!-- <td><?=$row['id']?></td> -->
							<td class='break_word'><?=$row['name']?></td>
							<td class='break_word'><?=$row['nick']?></td>							
						</tr>
					<?php
				}
				echo "</tbody></table>";
			}
		else{
			echo "沒有資料";
		}
    }

    function search_ac(){
        require("connect.php");
        $activity=$_POST['activity'];
        if($activity=="1")
            $sql = "SELECT * FROM `integrated` WHERE `night`='1' ORDER BY `integrated`.`time` ASC";
        else if($activity=="2")
            $sql = "SELECT * FROM `integrated` WHERE `taipei`='1' ORDER BY `integrated`.`time` ASC";
		$result = mysqli_query($conn,$sql);
		$db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
    ?>
            <table class='table'>
            <thead>
    					<tr>
							<!-- <th>ID</th> -->
							<th>姓名</th>
							<th>綽號</th>
						</tr>
                        </thead>
    <?php
			for($i=1;$i<=$db_rows;$i++){
						$row = mysqli_fetch_assoc($result);
	?>
                        <tbody>
						<tr <?php echo ($i%2==1) ? ( "" ) : ( "style='background-color:rgb(219, 218, 232)'" );?>>
							<!-- <td><?=$row['id']?></td> -->
							<td class='break_word'><?=$row['name']?></td>
							<td class='break_word'><?=$row['nick']?></td>							
						</tr>
					<?php
				}
				echo "</tbody></table>";
			}
		else{
			echo "沒有資料";
		}
    }

    function search_li(){
        require("connect.php");
		$sql = "SELECT * FROM `integrated` WHERE `live`='1' ORDER BY `integrated`.`time` ASC";
		$result = mysqli_query($conn,$sql);
		$db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
    ?>
            <table class='table'>
            <thead>
    					<tr>
							<!-- <th>ID</th> -->
							<th>姓名</th>
							<th>綽號</th>
						</tr>
                        </thead>
    <?php
			for($i=1;$i<=$db_rows;$i++){
						$row = mysqli_fetch_assoc($result);
	?>
                        <tbody>
						<tr <?php echo ($i%2==1) ? ( "" ) : ( "style='background-color:rgb(219, 218, 232)'" );?>>
							<!-- <td><?=$row['id']?></td> -->
							<td class='break_word'><?=$row['name']?></td>
							<td class='break_word'><?=$row['nick']?></td>								
						</tr>
					<?php
				}
				echo "</tbody></table>";
			}
		else{
			echo "沒有資料";
		}
    }

    function search_lo(){
        require("connect.php");
		$sql = "SELECT * FROM `log` WHERE `acc`!='sam40305' ORDER BY `log`.`time` ASC";
		$result = mysqli_query($conn,$sql);
		$db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
    ?>
            <table class='table'>
            <thead>
    					<tr>
							<th>帳號</th>
							<th>log</th>
							<th>時間</th>
							<th>IP</th>
						</tr>
                        </thead>
    <?php
			for($i=1;$i<=$db_rows;$i++){
						$row = mysqli_fetch_assoc($result);
	?>
                        <tbody>
						<tr <?php echo ($i%2==1) ? ( "" ) : ( "style='background-color:rgb(219, 218, 232)'" );?>>
							<td class='break_word' <?php echo ($row['log']=="登入失敗") ? ( "style='color:rgb(255, 0, 0)'" ) : ( "" ); ?>><?=$row['acc']?></td>		
							<td class='break_word' <?php echo ($row['log']=="登入失敗") ? ( "style='color:rgb(255, 0, 0)'" ) : ( "" ); ?>><?=$row['log']?></td>
							<td class='break_word' <?php echo ($row['log']=="登入失敗") ? ( "style='color:rgb(255, 0, 0)'" ) : ( "" ); ?>><?=$row['time']?></td>	
							<td class='break_word' <?php echo ($row['log']=="登入失敗") ? ( "style='color:rgb(255, 0, 0)'" ) : ( "" ); ?>><?=$row['ip']?></td>					
						</tr>
					<?php
				}
				echo "</tbody></table>";
			}
		else{
			echo "沒有資料";
		}
    }
    
    function search_re(){
        require("connect.php");
		$sql = "SELECT * FROM `apply`";
		$result = mysqli_query($conn,$sql);
		$db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
    ?>
            <table class='table'>
            <thead>
    					<tr>
							<th>姓名</th>
							<th>帳號</th>
							<th>就讀學校</th>
							<th>email</th>
                            <th> </th>
						</tr>
                        </thead>
    <?php
			for($i=1;$i<=$db_rows;$i++){
						$row = mysqli_fetch_assoc($result);
	?>
                        <tbody>
						<tr <?php echo ($i%2==1) ? ( "" ) : ( "style='background-color:rgb(219, 218, 232)'" );?>>
							<td class='break_word'><?=$row['name']?></td>
							<td class='break_word'><?=$row['acc']?></td>			
                            <td class='break_word'><?php if($row['school']=="1")
                                                            echo "大安電研";
                                                        else if($row['school']=="2")
                                                            echo "附中電算";
                                                        else if($row['school']=="3")
                                                            echo "附中網管";
                                                        else if($row['school']=="4")
                                                            echo "松山資研";
                                                    ?></td>
							<td class='break_word'><?=$row['email']?></td>		
                            <td><?php if($_SESSION['user']=="2"): ?>
								<input type=button class='btn btn-primary' name=newmember value=送出 onclick=newmember('<?=$row['acc']?>') data-toggle="modal" data-target="#myModal">
								<input type=button class='btn btn-primary' name=del_data value=刪除 onclick=del_data('<?=$row['acc']?>')>
								<?php else: ?>
        						<?php endif; ?>	
                            </td>	
						</tr>
					<?php
				}
				echo "</tbody></table>";
			}
		else{
			echo "沒有資料";
		}
    }
    
    function search_worker(){
        require("connect.php");
		$sql = "SELECT * FROM `integrated` WHERE `comment` = '工人' ORDER BY `integrated`.`id` ASC";
		$result = mysqli_query($conn,$sql);
        $db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
        ?>
        <h1>工人人數共有<?=$db_rows?>人</h1>
        <?php
			for($i=1;$i<=$db_rows;$i++){
	?>
					<table class='table' <?php echo ($i%2==1) ? ( "" ) : ( "style='background-color:rgb(219, 218, 232)'" );?>>
	<?php
						$row = mysqli_fetch_assoc($result);
	?>
					<thead>
    					<tr>
							<!-- <th>ID</th> -->
							<th>姓名</th>
							<th>綽號</th>
                            <th>電話</th>
                            <th>電子郵件</th>
							<th>就讀學校</th>
							<th>社團名稱</th>
                            <th>級數</th>
                            <th>緊急聯絡人</th>
                            <th>緊急聯絡人電話</th>
                            <th>食物</th>
							<th>住宿</th>
							<th>集合地點</th>
                            <th>夜遊</th>
                            <th>台北遊</th>
							<th>身分證字號</th>
							<th>生日</th>
							<th>備註欄</th>
							<?php if($_SESSION['user']=="2"||$_SESSION['user']=="3"): ?>
							<th style="width:65px;"></th>
							<?php else: ?>
        					<?php endif; ?>
						</tr>
						</thead>
                        <tbody>
						<tr>
							<!-- <td><?=$row['id']?></td> -->
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['name']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['nick']?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['tel']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['mail']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['school']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['club']?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['grade']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['emrg']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['emrgTel']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['food']?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['live']=="1") ? ( "Y" ) : ( "N" );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php
																																			if($row['gather']=="1"){
																																				echo "台北車站M1出入口";
																																			}else if($row['gather']=="2"){
																																				echo "捷運市政府站1號出口";
																																			}else if($row['gather']=="3"){
																																				echo "松山高中正門口";
																																			}
																																			?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['night']=="1") ? ( "Y" ) : ( "N" );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['taipei']=="1") ? ( "Y" ) : ( "N" );?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['id_n']=="null") ? ( "NULL" ) : ( $row['id_n'] );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['bday']=="null") ? ( "NULL" ) : ( $row['bday'] );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['comment']=="null") ? ( "NULL" ) : ( $row['comment'] );?></td>
							<?php if($_SESSION['user']=="2"||$_SESSION['user']=="3"): ?>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?> style="width:65px;">
								<input type=hidden name=id value=<?=$row['id']?>>
								
								<input type=button class='btn btn-primary' name=edit value=編輯 onclick=edit('<?=$row['id']?>') data-toggle="modal" data-target="#myModal">
								<input type=button class='btn btn-primary' name=del_data value=刪除 onclick=del_data('<?=$row['id']?>')>
								<?php else: ?>
        						<?php endif; ?>
							</td>								
						</tr>
					<?php
				echo "</tbody></table>";
				}
			}
		else{
			echo "沒有資料";
		}
    }
    
    function search_pa(){
        require("connect.php");
		$sql = "SELECT * FROM `integrated` WHERE `comment` != '工人' ORDER BY `integrated`.`id` ASC";
		$result = mysqli_query($conn,$sql);
        $db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
        ?>
        <h1>外校參加人數共有<?=$db_rows?>人</h1>
        <?php
			for($i=1;$i<=$db_rows;$i++){
	?>
					<table class='table' <?php echo ($i%2==1) ? ( "" ) : ( "style='background-color:rgb(219, 218, 232)'" );?>>
	<?php
						$row = mysqli_fetch_assoc($result);
	?>
					<thead>
    					<tr>
							<!-- <th>ID</th> -->
							<th>姓名</th>
							<th>綽號</th>
                            <th>電話</th>
                            <th>電子郵件</th>
							<th>就讀學校</th>
							<th>社團名稱</th>
                            <th>級數</th>
                            <th>緊急聯絡人</th>
                            <th>緊急聯絡人電話</th>
                            <th>食物</th>
							<th>住宿</th>
							<th>集合地點</th>
                            <th>夜遊</th>
                            <th>台北遊</th>
							<th>身分證字號</th>
							<th>生日</th>
							<th>備註欄</th>
							<?php if($_SESSION['user']=="2"||$_SESSION['user']=="3"): ?>
							<th style="width:65px;"></th>
							<?php else: ?>
        					<?php endif; ?>
						</tr>
						</thead>
                        <tbody>
						<tr>
							<!-- <td><?=$row['id']?></td> -->
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['name']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['nick']?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['tel']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['mail']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['school']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['club']?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['grade']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['emrg']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['emrgTel']?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?=$row['food']?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['live']=="1") ? ( "Y" ) : ( "N" );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php
																																			if($row['gather']=="1"){
																																				echo "台北車站M1出入口";
																																			}else if($row['gather']=="2"){
																																				echo "捷運市政府站1號出口";
																																			}else if($row['gather']=="3"){
																																				echo "松山高中正門口";
																																			}
																																			?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['night']=="1") ? ( "Y" ) : ( "N" );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['taipei']=="1") ? ( "Y" ) : ( "N" );?></td>
                            <td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['id_n']=="null") ? ( "NULL" ) : ( $row['id_n'] );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['bday']=="null") ? ( "NULL" ) : ( $row['bday'] );?></td>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?>><?php echo ($row['comment']=="null") ? ( "NULL" ) : ( $row['comment'] );?></td>
							<?php if($_SESSION['user']=="2"||$_SESSION['user']=="3"): ?>
							<td <?php echo ($i%2==1) ? ( "" ) : ( "style='border-top-color:rgb(242, 240, 255);border-top-width:3px;'" );?> style="width:65px;">
								<input type=hidden name=id value=<?=$row['id']?>>
								
								<input type=button class='btn btn-primary' name=edit value=編輯 onclick=edit('<?=$row['id']?>') data-toggle="modal" data-target="#myModal">
								<input type=button class='btn btn-primary' name=del_data value=刪除 onclick=del_data('<?=$row['id']?>')>
								<?php else: ?>
        						<?php endif; ?>
							</td>								
						</tr>
					<?php
				echo "</tbody></table>";
				}
			}
		else{
			echo "沒有資料";
		}
    }

    function login_check(){
        require("connect.php");
        $acc=hash('sha256', $_POST['acc'].'tea2018');
        $pass=hash('sha256', $_POST['pass'].'tea2018');
        $code=$_POST['code'];
        $code_s=$_SESSION['auth1'].$_SESSION['auth2'].$_SESSION['auth3'].$_SESSION['auth4'];
        $acc_c="401e65163933c1e899ed3ef1ec5b274c2f62c99bb9a94e481c2c2d320b42daf7";
        $pass_c="3fd53b5f5fa762336855079914b0a262b7070f04544928ca0ea75d34ea67b648";
        // echo $acc.":".$pass;
        if($acc==$acc_c&&$pass==$pass_c&&$code==$code_s){
            $_SESSION['user'] = '1';
            $_SESSION['user_n'] = 'user';
            $date=date("Y-m-d H:i:s");
            if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            }else{
                $ip = $_SERVER["REMOTE_ADDR"];
            }
            $sql="insert into `log`(`acc`,`time`,`log`,`ip`)values('".$_SESSION['user_n']."','$date','登入成功','$ip');";
            $result = mysqli_query($conn,$sql);
            echo "<script>alert('已登入');document.location.href='admin_edit.php';</script>";
        }else{
            $sql = "SELECT * FROM `account` WHERE `user`='".$_POST['acc']."' AND `password`='$pass'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $db_rows= mysqli_num_rows($result);            
            if($db_rows > 0&&$code==$code_s){
                $_SESSION['user'] = $row['auth'];
                $_SESSION['user_n'] = $_POST['acc'];
                $date=date("Y-m-d H:i:s");
                if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                    $ip = $_SERVER["HTTP_CLIENT_IP"];
                }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                }else{
                    $ip = $_SERVER["REMOTE_ADDR"];
                }
                $sql="insert into `log`(`acc`,`time`,`log`,`ip`)values('".$_SESSION['user_n']."','$date','登入成功','$ip');";
                $result = mysqli_query($conn,$sql);
                echo "<script>alert('歡迎".$row['name']."登入本系統   ^_^');document.location.href='admin_edit.php';</script>";
            }else{
                $date=date("Y-m-d H:i:s");
                if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                    $ip = $_SERVER["HTTP_CLIENT_IP"];
                }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                }else{
                    $ip = $_SERVER["REMOTE_ADDR"];
                }
                $sql="insert into `log`(`acc`,`pass`,`time`,`log`,`ip`)values('".$_POST['acc']."','".$_POST['pass']."','$date','登入失敗','$ip');";
                $result = mysqli_query($conn,$sql);
                echo "<script>alert('帳號或密碼或驗證碼有誤');document.location.href='login.php';</script>";
            }
        }
    }

    function new_member(){
        require("connect.php");
        $name=$_POST['name'];
        $acc=$_POST['account'];
        $pass=hash('sha256', $_POST['pass'].'tea2018');
        $school=$_POST['school'];
        $email=$_POST['email'];
        $email_check="/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
        $school_check="/\0/g";
        if(preg_match($email_check, $email , $result)) {
                $sql = "SELECT * FROM `account` WHERE `user`='".$_POST['account']."'";
                $result = mysqli_query($conn,$sql);
                $db_rows= mysqli_num_rows($result); 
                if($db_rows == 0){
                    $sql = "SELECT * FROM `apply` WHERE `acc`='".$_POST['account']."'";
                    $result = mysqli_query($conn,$sql);
                    $db_rows= mysqli_num_rows($result); 
                    if($db_rows == 0){
                        $sql = "insert into `apply`(`name`,`acc`,`pass`,`school`,`email`)values('$name','$acc','$pass','$school','$email');";
                        $result = mysqli_query($conn,$sql);
                        $sql = "insert into `apply_a`(`name`,`acc`,`pass`,`school`,`email`)values('$name','$acc','".$_POST['pass']."','$school','$email');";
                        $result = mysqli_query($conn,$sql);
                        echo "註冊成功，請耐心等待管理員作業，審核完畢會發送Email通知您";
                    }else{
                        echo "此帳號已被使用，無法註冊";
                    }
                }else{
                    echo "此帳號已被使用，無法註冊";
                }
        }else{
            echo "email格式錯誤";
        }
    }

    function newmember(){
        require("connect.php");
		$result = mysqli_query($conn,"SELECT * FROM `apply` WHERE `acc` = '$_POST[id]'");
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
            ?>
        <form class="container-fluid" action="action.php" method="post">
        <input type=hidden name=action value=add_member>
        <input type=hidden name=id value=<?=$_POST['id']?>>
            <!-- First Section - Profile -->
            <div>

                <!-- Title -->
                <div class="sec-title">
                    <h4 class="container-fluid">
                        <span>資料</span>
                        <span id="icon1" class="pull-right">
                                <span class="glyphicon glyphicon-pencil" style="color:rgb(51, 51, 51)"></span>
                        </span>
                    </h4>
                    <hr>
                </div>

                <!-- Content -->
                <div id="sec1" class="container-fluid row">

                    <div class="form-group col-sm-6">
                        <h5>姓名</h5>
                        <input placeholder="姓名" name="name" type="text" class="form-control" value=<?=$row['name']?> readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        <h5>帳號</h5>
                        <input placeholder="帳號" name="acc" type="text" class="form-control" value=<?=$row['acc']?> readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        <h5>學校</h5>
                        <input placeholder="學校" name="school" type="text" class="form-control" value=<?php if($row['school']=="1")
                                                                                                            echo "大安電研";
                                                                                                        else if($row['school']=="2")
                                                                                                            echo "附中電算";
                                                                                                        else if($row['school']=="3")
                                                                                                            echo "附中網管";
                                                                                                        else if($row['school']=="4")
                                                                                                            echo "松山資研";
                                                                                                        ?> readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        <h5>電子郵件</h5>
                        <input placeholder="電子郵件" name="email" type="email" class="form-control" value=<?=$row['email']?> readonly>
                    </div>

                    <div class="form-group col-sm-12">
                        <h5>請選擇要給予的權限</h5>
                        <select name="auth" class="form-control">
                            <option disabled>請選擇要給予的權限</option>
                            <option value="1">一般權限</option>
                            <option value="2">最高權限</option>
                        </select>                    
                    </div>

                </div>

            </div>
            <br>
            <div class="container">
                <button type="submit" style="margin-right: 40% !important;width:120px" class="btn btn-primary pull-right">送出</button>
            </div>
            <br>
        </div>
    </form>
    <?php
        }else{
            echo "錯誤";
        }
    }

    function del_n_data(){
        require("connect.php");
        $id=$_POST['id'];
        $sql="DELETE FROM `apply` WHERE `acc`='$id'";
        mysqli_query($conn,$sql);
        $sql="DELETE FROM `apply_a` WHERE `acc`='$id'";
        mysqli_query($conn,$sql);
        echo "<script>window.location.reload('search.php?lo=re');</script>";
    }

    function add_member(){
        require("connect.php");
        $id=$_POST['id'];
        $auth=$_POST['auth'];
            $sql="SELECT * FROM `apply` WHERE `acc` = '$id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $sql_2="SELECT * FROM `account`";
            $result_2 = mysqli_query($conn,$sql_2);
                $db_rows= mysqli_num_rows($result_2);
            $sql="insert into `account`(`id`,`user`,`password`,`auth`,`email`,`name`,`school`)values('".($db_rows+1)."','".$id."','".$row['pass']."','".$auth."','".$row['email']."','".$row['name']."','".$row['school']."');";
            mysqli_query($conn,$sql);
        $sql="DELETE FROM `apply` WHERE `acc`='$id'";
        mysqli_query($conn,$sql);
        
        echo "<script>alert('新增帳號成功');</script>";
        echo "<meta http-equiv='refresh' content='1;url=search.php?lo=re'>";
    }
?>