<?php
require_once'..\include.php';

function reg(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    $arr['regTime']=time();
   
    
    if(insert("jd_user", $arr)){
        $mes="注册成功!<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=login.php'/>";
    }else{
       
        $mes="注册失败!<br/><a href='reg.php'>重新注册</a>|<a href='index.php'>查看首页</a>";
    }
    return $mes;
}
function login(){
    $username=$_POST['username'];
    //addslashes():使用反斜线引用特殊字符
    //$username=addslashes($username);
    $username=mysql_escape_string($username);
    $password=md5($_POST['password']);
    $sql="select * from jd_user where username='{$username}' and password='{$password}'";
    //$resNum=getResultNum($sql);
    $row=fetchOne($sql);
    //echo $resNum;
    if($row){
        $_SESSION['loginFlag']=$row['id'];
        $_SESSION['username']=$row['username'];
        $mes="登陆成功！<br/>3秒钟后跳转到首页<meta http-equiv='refresh' content='3;url=index.php'/>";
    }else{
        $mes="登陆失败！<a href='login.php'>重新登陆</a>";
    }
    return $mes;
}
/**
 * 检测用户是否登陆.
 */
function checkuer(){
    if($_SESSION['loginFlag']==""){
        alertMes("您尚未登录，请先登陆","login.php");
    }
}
function userOut(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    
    session_destroy();
    header("location:index.php");
}
function addcar($pid){
   // $proInfo=getProById($pid);
    
    $arr=$_POST;
    $arr['uid']=(int)($_SESSION['loginFlag']);
    $arr['pid']=(int)($pid);
    $arr['bnum']=(int)($arr['bnum']);
    $arr['totalfee']=32;
  $res=insert('shop_car',$arr);
$pi=getInsertId();

    if($res&&$pi){
        $mes="<p>已加入购物车!</p><a href='carDetail.php?'>查看购物车</a>";
    }else{
       
        $mes="<p>添加失败!</p><a href='index.php' >重新商品页</a>";
    }
    return $mes;
}
function getCarByUid($uid){
    $sql="select p.id,p.pName,p.pSn,p.inventory,p.mPrice,p.dicprice,p.pubTime,p.isShow,p.isHot,c.cName,p.cId,p.color1,p.color2,p.color3,p.color4 c. from jd_pro as p join jd_cate c on p.cId=c.id where p.id={$id}";
    $row=fetchOne($sql);
    return $row;
}
function delcar($carid){
    $where="carid=".$carid;
    if(delete("shop_car",$where)){
        $mes="已选商品已经删除!<br/><a href='carDetail.php?uid=".$_SESSION['loginFlag']."'>回到购物车</a>";
    }else{
        $mes="删除失败！<br/><a href='listCate.php'>请重新操作</a>";
    }
    return $mes;
}
function addaddress(){
    $arr=$_POST;
    $arr['uid']=$_SESSION['loginFlag'];
    $res=insert('deliver_address',$arr);
    $pi=getInsertId();
    
    if($res&&$pi){
        echo "<script>alert('确认该地址');</script>";
    }else{
        echo "<script>alert('地址添加失败，重新添加地址');</script>";
     
    }
   
}

