<?php
require_once '../include.php';

$act=$_REQUEST['act'];
$pid=1;
$pid=$_REQUEST['pid'];
$order_id=$_REQUEST['order_id'];
if($act==="reg"){
    $mes=reg();
}elseif($act==="login"){
    $mes=login();
}elseif($act==="userOut"){
    userOut();
}
elseif($act=="addcar"){
    $mes=addcar($pid);
}
elseif($act=="delcar"){
  $carid=$_REQUEST['id'];
  $mes=delcar($carid);
}elseif($act=="addaddress"){
    addaddress();
}elseif($act=="addOrder"){
    addOrder();
   
}
elseif($act=="payment"){
   
    $mes=payment($order_id);
    
}elseif($act=="receive"){
   
    $mes=receive($order_id);
}elseif($act=="rate"){
    rate($order_id,$pid);   
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
	if($mes){
		echo $mes;
	}
?>
</body>
</html>