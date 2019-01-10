<?php
require_once '../include.php';
$uid=$_REQUEST['uid'];
$type=$_REQUEST['type'];

?>
<!doctype html>
<html>
<head>
<base target="_blank">
<meta charset="utf-8">
<title>我的订单</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/backstage.css">

<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
<script>


</script>
</head>
<body style="background:#fff">
<div class="orderList comWidth" >
<table class="ordertable" cellspacing="0" cellpadding="0">
<thead>
<tr class="colname">
<th width="27%">宝贝</th>
<th width="10%">单价</th>
<th width="10%">数量</th>
<th width="15%">实付款</th>
<th width="10%">交易状态</th>

</tr>
</thead>
<tbody class="allorder">
<tr style="height:2.5em" ></tr>
<?php
$orderBy="order by create_time DESC";
if($type){
   
    $where='where uid='.$uid.' and statue="'.$type.'"';}
 else{$where="where uid=".$uid;}

$sql="select order_id,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from jd_order {$where} {$orderBy};";
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
                                
                                <td style="color:red" align="center" > <div>￥<?php echo ($row['payment'])+($row['post_fee'])?></div>
                                                                                    <div>(含运费<?php echo $row['post_fee'];?>)</div></td>
                                
                                <td  align="center" >
                                          <div><?php echo $row['statue'];?></div>
                                          <div>订单详情</div>
                                          <div>查看物流</div>
                                </td>
                                 
                            </tr>
                                <?php  endforeach;?>
                        </tbody>
                        <tbody>
                        </tbody>
                </table>
          </div>
</body>
</html>
