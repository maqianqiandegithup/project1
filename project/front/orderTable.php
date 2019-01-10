<?php
require_once '../include.php';
checkuer();
$uid=$_SESSION['loginFlag'];
$type=$_REQUEST['type'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的订单</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">

<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script>


</script>
<style type="text/css">
#rate{
clear:both;
margin:5px 0 0 0;
font-size:12px;
background-color:#fff;
}
#rate .alt{
position:relative;
background-color:#fff;
float:left;
/*width:158px;height:20px;*/
margin:0 auto;

text-align:center;
text-decoration:none;
color:#fe1e0c;
}
#rate .alt:hover{
background:#fff;
text-decoration:none;z-index:2;
}
#rate .alt #rateinfo{
display:none;
}
#rate .alt:hover #rateinfo{
position:absolute;
display:block;
top:-40px;right:30px;
width:400px;height:100px;
border:1px solid #000;
padding:2em;2em;
z-index:1;
color:black;
background-color:#fff;
}

</style>
</head>
<body style="background:#fff">
<div class="orderList comWidth" >
<table class="ordertable" cellspacing="0" cellpadding="0">
<thead>
<tr class="colname">
<th width="27%">宝贝</th>
<th width="10%">单价</th>
<th width="10%">数量</th>
<th width="15%">商品操作</th>
<th width="15%">实付款</th>
<th width="10%">交易状态</th>
<th width="10%">交易操作</th>
</tr>
</thead>
<tbody class="allorder">
<tr style="height:2.5em" ></tr>
<?php
$orderBy="order by create_time DESC";
if($type){
   
    $where='where uid='.$uid.' and statue="'.$type.'"';}
 else{$where="where uid=".$uid;}

$sql="select order_id,uid,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from jd_order {$where} {$orderBy};";
$rows=fetchAll($sql);

foreach($rows as $row):
$proInfo=getProById($row['pid']);?>
                      
                           <tr class="orderInfo1" >
                                <td colspan="2"><input type="checkbox" name="order[]" id="order" class="orderCheck" value=<?php echo $row['order_id'];?>>
                                     <label style="color:#808080"> <?php echo ($row['create_time']);?></label> 
                                     <span style="margin-left:2em"> 订单号：<?php echo ($row['order_id'])?></span></td>
                               <td></td> <td></td> <td></td> <td></td> <td></td></tr>
                           <tr class="orderInfo2">
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td  >
                                        <?php  $proImg=getProImgById($row['pid']);?>
                            
                                        <a href="proDetails.php?id=<?php echo $row['pid'];?>" title="_blank"> <span  style="float:left;width:50px; height:60px;margin-left:0.5em">
                                             <img style="float:left" class="carimg" src="../image_50/<?php echo $proImg['albumPath'];?>" alt="" /></span>
                                       <span style="float:right;width:200px"><?php echo $proInfo['pName']?> </span></a> </td>
                                <td>颜色：<?php echo $row['pcolor'];?><br/>尺寸：<?php echo $row['psize'];?></td>
                                <td align="center" >
                                   <?php echo $row['bnum'];?>
                                </td>
                                 <td align="center" >
                                 <?php if($type=="待付款")
                                            echo ('<a href="#">投诉商家</a>');
                                       elseif($type=="待评价")
                                            echo('<a href="#">申请售后</a><br/><a href="#">投诉商家</a>');
                                       else{echo('<a href="#">退货/退款</a><br/><a href="#">投诉商家</a>');}
                                         
                                 ?>
                                 </td>
                                <td  align="center" > <div>￥<?php echo ($row['payment'])+($row['post_fee'])?></div>
                                                                                    <div>(含运费<?php echo $row['post_fee'];?>)</div></td>
                                
                                <td  >
                                          <div><?php echo $row['statue'];?></div>
                                          <div>订单详情</div>
                                          <div id="checkLogist"> <a class='alt' href="/">
                                          <div>
                                          <?php $logInfos=getLogInfo($row['order_id']);
                                          if(!$logInfos){echo("<span >暂无物流消息</span>");}
                                          for($i=0;$i<count($logInfos);$i++){
                                              if($i==0)echo("<span style='color:red'>".$logInfos[$i]['date']."&nbsp;".$logInfos[$i]['time']."&nbsp;&nbsp;".$logInfos[$i]['logInfo']."</span><br/>");
                                              else echo("<span >".$logInfos[$i]['date']."&nbsp;".$logInfos[$i]['time']."&nbsp;&nbsp".$logInfos[$i]['logInfo']."</span><br/>");
                                               }?>
                                          </div>查看物流</a></div>
                                </td>
                                 <td align="center">
                                  <?php if($type=="待付款")
                                            echo ('<a href="payOrder.php?order_id='.$row["order_id"].'">立即支付</a><br/><a href="#">取消订单</a>');
                                            elseif($type=="待评价"){?>
                                            
                                            <div id="rate"><a class='alt' href="">
                                                   <div id="rateinfo">
                                                 <form action="doUserAction.php?act=rate&order_id=<?php echo $row["order_id"]?>&pid=<?php echo $row["pid"]?>" method="post" enctype="multipart/form-data">
                                                   <label>请为商品打分</label>
                            							<span data-type="delivery" class="rate-stars">
                            								<label><input type="radio" value="1" name="p<?php echo $row['pid']?>"  />很不满意</label>
                            								<label><input type="radio" value="2" name="p<?php echo $row['pid']?>"  />不满意</label>
                            								<label><input type="radio" value="3" name="p<?php echo $row['pid']?>"  />一般</label>
                            								<label><input type="radio" value="4" name="p<?php echo $row['pid']?>"  />满意</label>
                            								<label><input type="radio" value="5" name="p<?php echo $row['pid']?>"  />很满意</label>
                            							</span><br>
                            							
			                                           <div class="submitbox"> <button type="submit" class="J_submit_rate">提交</button>  </div>
				                                    </form>
                                                   </div >立即评价</a></div>
                                      <?php }
                                            else{echo('<a href="doUserAction.php?act=receive&order_id='.$row["order_id"].'">确认收货</a>');}
                                        ?>
                                 
                                 </td>
                            </tr>
                                <?php endforeach;?>
                        </tbody>
                        <tbody>
                        </tbody>
                </table>
          </div>
</body>
</html>
