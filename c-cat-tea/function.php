<?php 
	function echodata(){
		require("connect.php");
		$sql = "SELECT * FROM `integrated` ORDER BY `integrated`.`id` ASC";
		$result = mysqli_query($conn,$sql);
		$db_rows= mysqli_num_rows($result);
		if($db_rows > 0){
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

	function gather(){
		?>
			<div class="form-group col-sm-6">
				<select name="gather" class="form-control">
					<option disabled selected='true' value="">請選擇查詢地點</option>
					<option value="1">台北車站M1出入口</option>
					<option value="2">捷運市政府站1號出口</option>
					<option value="3">松山高中正門口</option>
				</select>
			</div>
			<div class="form-group col-sm-6">
				<input type=button class='btn btn-primary' name=search_ga value=查詢>
			</div>
			<script>
				$('[name=search_ga]').click(function (){
					var gather=$('[name=gather]').val();
					if (gather==null){

					}else{
						$.post("action.php", {
								action: "search_ga",
								gather:gather
								
							},
							function(resp) {
								$('#dataview').html(resp);
							});
					}
				});
			</script>
		<?php
			}
	function activity(){
		?>
			<div class="form-group col-sm-6">
				<select name="activity" class="form-control">
					<option disabled selected='true' value="">請選擇查詢活動</option>
					<option value="1">夜遊</option>
					<option value="2">台北遊</option>
				</select>
			</div>
			<div class="form-group col-sm-6">
				<input type=button class='btn btn-primary' name=search_ac value=查詢>
			</div>
			<script>
				$('[name=search_ac]').click(function (){
					var activity=$('[name=activity]').val();
					if (activity==null){

					}else{
						$.post("action.php", {
								action: "search_ac",
								activity:activity
								
							},
							function(resp) {
								$('#dataview').html(resp);
							});
					}
				});
			</script>
		<?php
			}
	
	function live(){
		?>
		<script>
		$.post("action.php", {
			action: "search_li"			
		},
		function(resp) {
			$('#dataview').html(resp);
		});
		</script>
	<?php
	}

	function log_s(){
		?>
		<script>
		$.post("action.php", {
			action: "search_lo"			
		},
		function(resp) {
			$('#dataview').html(resp);
		});
		</script>
	<?php
	}

	function re(){
		?>
		<script>
		$.post("action.php", {
			action: "search_re"			
		},
		function(resp) {
			$('#dataview').html(resp);
		});
		</script>
	<?php
	}

	function worker(){
		?>
		<script>
		$.post("action.php", {
			action: "search_worker"			
		},
		function(resp) {
			$('#dataview').html(resp);
		});
		</script>
	<?php
	}

	function pa(){
		?>
		<script>
		$.post("action.php", {
			action: "search_pa"			
		},
		function(resp) {
			$('#dataview').html(resp);
		});
		</script>
	<?php
	}

	function head(){
		?>
	<!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>後臺管理</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="admin.css?v=<?php echo mt_rand();?>">
    </head>
		<?php
	}

	function nav(){
		?>
		<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_edit.php">後臺管理</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="admin_edit.php">回後臺首頁</a>
                    </li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">各種分類查詢
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if($_SESSION['user']=="2"): ?>
                                <li>
                                    <a href="search.php?lo=lo">登入/出查詢</a>
                                </li>
                                <li>
                                    <a href="search.php?lo=re">註冊查詢</a>
                                </li>
                                <?php else: ?>
        						<?php endif; ?>
                                <li>
                                    <a href="search.php?lo=worker">工人數量查詢</a>
                                </li>
                                <li>
                                    <a href="search.php?lo=pa">外校數量查詢</a>
                                </li>
                                <li>
                                    <a href="search.php?lo=ga">集合地點查詢</a>
                                </li>
                                <li>
                                    <a href="search.php?lo=ac">參加活動查詢</a>
                                </li>
                                <li>
                                    <a href="search.php?lo=li">住宿查詢</a>
                                </li>
                            </ul>
                    </li>
                    <li style="margin:7.5px;">
                        <form action="logout.php" method="post">
							<input type="hidden" name="logout">
							<input type="submit" class="btn" value="登出">
						</form>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
		<?php
	}
?>