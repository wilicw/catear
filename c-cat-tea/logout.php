<?php
    session_start();
    if(isset($_SESSION['user'])){
        if(isset($_POST['logout'])){
            require("connect.php");
            $date=date("Y-m-d H:i:s");
            if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            }else{
                $ip = $_SERVER["REMOTE_ADDR"];
            }
            $sql="insert into `log`(`acc`,`time`,`log`,`ip`)values('".$_SESSION['user_n']."','$date','登出成功','$ip');";
            $result = mysqli_query($conn,$sql);
            session_unset();
            echo "<script>alert('已登出');</script><meta http-equiv='refresh' content='1;url=login.php'>";
        }
    }else{
        echo "錯誤";
    }
?>