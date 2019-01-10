<?php
require_once '../include.php';
checkuer();
$orders['pid']=$pid=$_REQUEST['pid'];
$orders['pcolor']=$pcolor=$_REQUEST['pcolor'];
$orders['psize']=$psize=$_REQUEST['psize'];
$orders['bnum']=$bnum=$_REQUEST['bnum'];

//得到购物车中所有的商品
//echo($pcolor.$psize.$bnum.$pid);
$proInfo=getProById($pid);
//print_r($proInfo);

//
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>购物车</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
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
	<div class="logoBar">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="京东商城"></a>
			</div>
			<div class="stepBox fr">
				<div class="step"></div>
				<ul class="step_text">
					<li class="s01 active">我的购物车</li>
					<li class="s02 active">填写核对订单</li>
					<li class="s03">订单提交成功</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="shoppingCart comWidth">
	<div class="shopping_item">
	
		<h3 class="shopping_tit">确认收货地址</h3>
		<div class="address">
                <>
                </div>
		<form action="doUserAction.php?act=addaddress" method="post" enctype="multipart/form-data">
		<div class="shopping_cont padding_shop">
			<ul class="shopping_list">
				<li><span class="shopping_list_text"><em>*</em>选择地区：</span>
					<div class="select">
						<select name="province">
						     <option value="请选择">请选择</option>
						      <option value="北京">北京</option>
						        <option value="天津">天津</option>
						        <option value="河北">河北</option>
						        <option value="山西">山西</option>
						          <option value="内蒙古">内蒙古</option>
						        <option value="辽宁">辽宁</option>
						        <option value="吉林">吉林</option>
						        <option value="黑龙江">黑龙江</option>
						          <option value="上海">上海</option>
						        <option value="江苏">江苏</option>
						        <option value="浙江">浙江</option>
						        <option value="安徽">安徽</option>
                   
						      </select>
				     </div >
				     <div class="select" style="margin-left: 20px">
						<select name="city">
						<option value="请选择">请选择</option>
						      <option value="北京">北京</option>
						        
						      </select>
						      
					</div>
					  <div class="select" style="margin-left: 20px">
						<select name="district">
						       <option value="请选择">请选择</option>
						      <option value="东城区">东城区</option>
						        <option value="西城区">西城区</option>
						        <option value="崇文区">崇文区</option>
						        <option value="宣武区">宣武区</option>
						        <option value="朝阳区">朝阳区</option>
						        <option value="丰台区">丰台区</option>
						        <option value="石景山区">石景山区</option>
						        <option value="昌平区">昌平区</option>
						      </select>
						      
					</div>
				</li>
				<li><span class="shopping_list_text"><em>*</em>详细地址：</span><input type="text" name="address" placeholder="最多输入20个汉字" class="input input_b" required></li>
				<li><span class="shopping_list_text"><em>*</em>收 货 人：</span><input type="text" name="receiver" placeholder="最多10个" class="input" required></li>
				<li><span class="shopping_list_text"><em>*</em>手	机：</span><input type="text" name="phone" placeholder="如：12312312" class="input" required> </li>
				<li><input type="submit" class="affirm"value=""></li>
			</ul>
		</div>
	  </form>
	</div>
	<div class="hr_25"></div>
	<div class="shopping_item">
		<h3 class="shopping_tit">支付方式</h3>
		<div class="shopping_cont padding_shop">
			<ul class="shopping_list">
				<li><input type="radio" class="radio" id="r1"><label for="r1">微信支付</label></li>
			</ul>
		</div>
	</div>
	<div class="hr_25"></div>
	<div class="shopping_item">
		<h3 class="shopping_tit">确认订单信息<a href="#" class="backCar">返回购物车修改</a></h3>
		<div class="shopping_cont pb_10">
			 <table class="buytable" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="27%">商品名称</th>
                                <th width="10%">详细信息</th>
                                <th width="10%">单价</th>
                                <th width="15%">数量</th>
                                <th width="15%">运费</th>
                                <th width="10%">商品金额</th>
                                 <th width="10%">小计(含运费)</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                    
                            <tr class="carcate" ><td><label for="c1" class="label">
                            <?php 
                            echo getCateById($proInfo['cName']);?></label></td>
                            <td></td><td></td> <td></td><td></td> <td></td><td></td></tr>
                            <tr class="carpro">
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td  valign="center">
                               
                                  <?php  $proImg=getProImgById($pid);?>
                                <div  style="float:left;width:40px; height:60px;margin-left:1em">
                                <img style="float:left" class="carimg" src="../image_50/<?php echo $proImg['albumPath'];?>" alt="" />
                                </div>
                               <div style="float:right;width:200px"><?php echo $proInfo['pName']?> </div>
                               </td>
                                <td>颜色：<?php echo $pcolor;?><br/>尺寸：<?php echo $psize;?></td>
                                <td align="center" >
                                   <?php echo ($proInfo['dicprice'])*($proInfo['mPrice']);?>
                                </td>
                                 <td align="center" ><?php echo $bnum;?></td>
                                <td align="center" style="color:red">0.00元</td>
                                <td align="center">
                                  <?php echo ($proInfo['dicprice'])*($proInfo['mPrice']);?>元
                                </td>
                                 <td align="center">
                                  <?php echo ($proInfo['dicprice'])*($proInfo['mPrice']);?>元
                                </td>
                            </tr>
                                
                        </tbody>
                </table>
                
			</div>
		</div>
	</div>
	<div class="hr_25"></div>
	<div class="shopping_item">
		<h3 class="shopping_tit">订单结算</h3>
		<div class="shopping_cont padding_shop clearfix">
			<div class="cart_count fr">
				<div class="cart_rmb">
					<i>总计：</i><span>￥ <?php echo ($proInfo['dicprice'])*($proInfo['mPrice'])*$bnum;?></span>
				<?php 
				$orders['payment']=($proInfo['dicprice'])*($proInfo['mPrice'])*$bnum;
				$_SESSION["n"]=$orders;
				?>
				</div>
				<div class="cart_btnBox">
				<input type="button" class="cart_btn" value="提交订单" onclick="checkOrder()"/>
				</div>
				
			</div>
		</div>
	</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">京东简介</a><i>|</i><a href="#">京东公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p>
	<p>Copyright &copy; 2006 - 2014 京东版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>

<script>
function checkOrder(){
	var r=confirm('确认提交订单');
	if(r==true){
		window.open('doUserAction.php?act=addOrder');}
	else exit;
}
</script>
</body>

</html>
