<?php
if(
    isset($_POST['name'])&&
    isset($_POST['nick'])&&
    isset($_POST['tel'])&&
    isset($_POST['mail'])&&
    isset($_POST['school'])&&
    isset($_POST['club'])&&
    isset($_POST['grade'])&&
    isset($_POST['emrg'])&&
    isset($_POST['emrgTel'])&&
    isset($_POST['food'])&&
    isset($_POST['live'])&&
    isset($_POST['gather'])&&
    isset($_POST['night'])&&
    isset($_POST['taipei'])&&
    isset($_POST['id'])&&
    isset($_POST['bday'])&&
    isset($_POST['comment'])
){
    require("connect.php");
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $nick=$_POST['nick'];
    $tel=mysqli_real_escape_string($conn,$_POST['tel']);
    $mail=mysqli_real_escape_string($conn,$_POST['mail']);
    $school=$_POST['school'];
    $club=$_POST['club'];
    $grade=mysqli_real_escape_string($conn,$_POST['grade']);
    $emrg=mysqli_real_escape_string($conn,$_POST['emrg']);
    $emrgTel=mysqli_real_escape_string($conn,$_POST['emrgTel']);
    $food=mysqli_real_escape_string($conn,$_POST['food']);
    $live=mysqli_real_escape_string($conn,$_POST['live']);
    $gather=mysqli_real_escape_string($conn,$_POST['gather']);
    $night=mysqli_real_escape_string($conn,$_POST['night']);
    $taipei=mysqli_real_escape_string($conn,$_POST['taipei']);
    $id_n=mysqli_real_escape_string($conn,$_POST['id']);
    $bday=mysqli_real_escape_string($conn,$_POST['bday']);
    $comment=$_POST['comment'];
    $date=date("Y-m-d H:i:s");
    $sql="insert into`integrated`(`name`,`nick`,`tel`,`mail`,`school`,`club`,`grade`,`emrg`,`emrgTel`,`food`,`live`,`gather`,`night`,`taipei`,`id_n`,`bday`,`time`,`comment`)values('$name','$nick','$tel','$mail','$school','$club','$grade','$emrg','$emrgTel','$food','$live','$gather','$night','$taipei','$id_n','$bday','$date','$comment');";
    mysqli_query($conn,$sql);
    echo "why r u looking this???";
}else{
    echo "yee~";
}
?>