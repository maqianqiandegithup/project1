<?php
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
//$verify=$_POST['verify'];
//$verify1=$_SESSION['verify']; //淇濆瓨绯荤粺闅忔満浜х敓鐨勯獙璇佺爜
$autoFlag=$_POST['autoFlag'];
//if($verify==$verify1){
    //楠岃瘉鏄惁鏈夌鐞嗗憳杩欎釜鎿嶄綔
    $sql="select * from JD_admin where username='{$username}' and password='{$password}'";
    $row=checkAdmin($sql);
    if($row){
        //濡傛灉閫変簡涓�鍛ㄥ唴鑷姩鐧婚檰
        if($autoFlag){
            setcookie("adminId",$row['id'],time()+7*24*3600);
            setcookie("adminName",$row['username'],time()+7*24*3600);
        }
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];  //鐢ㄦ潵妫�娴嬬鐞嗗憳鏄惁宸茬粡鐧诲綍鐨勫彉閲�
        alertMes("您已经成功登陆","index.php");
    }else{
        alertMes("登陆失败，重新登陆","login.php");
    }
//}else{
  //  alertMes("楠岃瘉鐮侀敊璇�","login.php");
//}