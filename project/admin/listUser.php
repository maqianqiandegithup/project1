<?php
require_once '../include.php';
checkLogined();
$sql="select id,username,phone,sex,regTime,shCartnum from jd_user";
$rows=fetchAll($sql);
if(!$rows){
    alertMes("sorry,没有用户,请添加!","index.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
                        </div>
                            
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="20%">用户名称</th>
                                <th width="20%">用户手机号</th>
                                <th width="20%">购物车中商品数</th>            
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                 <td>
                                 	<?php
                                 	$sql="select * from shop_car where uid=".$row['id'];
                                 	$carnum=getResultNum($sql);
                                 	echo $carnum;?>
                                 </td>
                                <td align="center"><input type="button" value="订单详情" class="btn" onclick="userOrders(<?php echo $row['id'];?>)">
                                    <input type="button" value="修改" class="btn" onclick="editUser(<?php echo $row['id'];?>)">
                                    <input type="button" value="删除" class="btn"  onclick="delUser(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">

	function addUser(){
		window.location="addUser.php";	
	}
	function editUser(id){
			window.location="editUser.php?id="+id;
	}
	function delUser(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAdminAction.php?act=delUser&id="+id;
			}
	}
	function userOrders(id){
		window.open("OrderList.php?&uid="+id,"mainFrame");
	}
</script>
</html>