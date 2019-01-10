<?php 
require_once '../include.php';
//checkLogined();
$order_id=$_REQUEST['order_id'];
$sql="select shipping_code from jd_order where order_id=".$order_id;
$shipping_code=fetchOne($sql)['shipping_code'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>

<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>


</head>
<body>
<h3>更新订单物流</h3>
<form action="doAdminAction.php?act=updateLogist&id=<?php echo $order_id;?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">订单号</td>
		
		<td><input type="text" name="order_id" value=<?php echo $order_id?>></span></td>
	</tr>
	<tr>
		<td align="right">运单号</td>
		
		<td><input type="text"  name="shipping_code" value=<?php echo $shipping_code?>></span></td>
	</tr>
   <tr>
		<td align="right">物流信息</td>
		
		<td><input type="text" name="logInfo" placeholder="请输入订单最新物流信息"/></td>
	</tr>
   
	<tr>
		<td colspan="2"><input type="submit"  value="添加物流信息"/></td>
		
	</tr>
</table>
</form>
</body>
</html>