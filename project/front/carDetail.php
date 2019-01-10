<?php
require_once '../include.php';
checkuer();
$uid=$_SESSION['loginFlag'];

//$proInfo=getCarByUid($uid);

$orderBy="order by p.cId,c.carid";
//$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where="where c.uid=1";
//得到购物车中所有的商品
$sql="select p.pName,p.pSn,p.cId,p.inventory,p.mPrice,p.dicprice,p.pubTime,c.uid,c.carid,c.pid,c.bnum,c.pcolor,c.psize,c.totalfee from jd_pro as p join shop_car c on p.id=c.pid {$where} {$orderBy}; ";
$rows=fetchAll($sql);

//print_r($rows);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>购物车列表</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<link type="text/css" rel="stylesheet" media="all" href="styles/jquery.jqzoom.css"/>

<script src="scripts/jquery-1.6.js" type="text/javascript"></script>
<script src="scripts/jquery.jqzoom-core.js" type="text/javascript"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>

<body>
   <div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="index.php" class="collection">京东首页</a>
				<a href="orderItem.php" target="_blank" class="collection" style="margin-left:6px">我的订单</a>
			
				 <a href="carDetail.php">购物车<span style="color:red">
				<?php if($_SESSION['loginFlag']){
				$sql="select * from shop_car where uid=".$_SESSION['loginFlag'];
				$carnum=getResultNum($sql);
				echo $carnum;}
				else echo 0;?>
				</span></a>
			</div>
			<div class="rightArea">
				欢迎来到京东女装网
				<?php if($_SESSION['loginFlag']):?>
				<span>欢迎您</span><span style="color:red"><?php echo $_SESSION['username'];?></span>
				<a href="doUserAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
				<?php endif;?>
		</div>
	</div>
</div>
<div class="carBar">
		<div class="comWidth">
			<div class="logo fl">
				<img src="images/icon/carlogo.jpg" alt="京东女装网">
			</div>
			<div class="search_box fr">
				<input type="text" class="search_text fl">
				<input type="button" value="搜 索" class="search_btn fr">
			</div>
			
		</div>
	</div>
</div>
<div class="details comWidth">
 <form action="delPros.php?act=1&name=<?php echo $row['id']?>" method="post" enctype="multipart/form-data">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添加" class="add" onclick="addPro()">
                           <input type="submit" value="批量删除" class="del" >
                        </div>
                      
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">全选</th>
                                <th width="20%">商品名称</th>
                                <th width="10%">详细信息</th>
                                <th width="10%">单价</th>
                                <th width="15%">数量</th>
                                <th width="10%">金额</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr class="carcate" ><td><input type="checkbox" ><label for="c1" class="label">
                            <?php 
                            echo getCateById($row['cId'])['cName'];?></label></td>
                            <td></td><td></td> <td></td><td></td> <td></td><td></td></tr>
                            <tr class="carpro">
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td padding-right="3px">
                                  <div class="checkimg" >
                                     <input type="checkbox" name="de[]" id="c1" class="carcheck" >
                                     <?php  $proImg=getProImgById($row['pid']);?>
                                    
                                     <img float="right" class="carimg" src="../image_50/<?php echo $proImg['albumPath'];?>" alt="" />
                                    
                                  </div>
                                </td>
                                <td><?php echo $row['pName']; ?></td>
                                <td><?php echo $row['pcolor'];?><br/><?php echo $row['psize'];?></td>
                                <td align="center" valign="center">
                                    <?php if($row['dicprice']==1){
				       echo('<div class="dl clearfix" id="oriprice2">
					   <div class="dd clearfix">
					   <span class="des_money" style="color:black;font-size:15px;"><em>￥</em>'.$row['mPrice'].'</span></div></div>');}
				       else{
				        echo(   '<div class="dl clearfix" id="delprice2">
				           <div class="dd clearfix">
				           <span style="color:#333;font-size:10px;" class="des_money"><del><em style="font-size:10px;">￥</em>'.$row['mPrice'].'</del></span></div>
				</div>
				<div class="dl clearfix" id="disprice2">
					
					<div class="dd clearfix">
					<span class="des_money" style="color:black;font-size:15px;"><em style="color:black;font-size:15px;">￥</em>'.($row['mPrice']*$row['dicprice']).'</span></div>
				</div>');
				       }
				?>
                                </td>
                                 <td align="center" valign="center"><div class="des_number">
								<div class="reduction" onclick="subnum(<?php echo  ($row['dicprice'])?>,<?php echo  ($row['mprice'])?>)">-</div>
								<div class="des_input">
									<input type="text"  name="bnum" value=<?php echo  ($row['bnum'])?> />
								</div>
								<div class="plus" onclick="addnum(<?php echo  ($row['mPrice'])?>,<?php echo  ($row['dicprice'])?>)">+</div>
							</div></td>
                                  <td style="color:red"><input type="text" name="tatolfee" value=<?php echo  ($row['dicprice'])*($row['mPrice']);?> />元</td>
                                <td align="center">
                                  <input type="button" value="删除" class="btn" onclick="delcar(<?php echo $row['carid'];?>)"/>
					               <input type="button" value="购买" class="btn" onclick="buyshop(<?php echo $row['pid'];?>,'<?php echo $row['pcolor'];?>','<?php echo $row['psize'];?>',<?php echo $row['bnum'];?>)"/>            
                                
                                </td>
                            </tr>
                           <?php  endforeach;?>
                          
                        </tbody>
                    </table>
    </form>                    
</div>
<script type="text/javascript">
	function editCate(id){
		window.location="editCate.php?id="+id;
	}
	function delcar(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
			window.location="doUserAction.php?act=delcar&id="+id;
		}
	}
	function buyshop(pid,pcolor,psize,bnum){
		window.open("order.php?pid="+pid+"&pcolor="+pcolor+"&psize="+psize+"&bnum="+bnum);
		}
	
	
</script>
</body>
   
</html>