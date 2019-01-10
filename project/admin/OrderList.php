<?php
require_once '../include.php';
$uid=$_REQUEST['uid'];
$type=$_REQUEST['type'];
checkLogined();
$orderBy="order by create_time DESC";
if($uid){
    if($type){
        $where="where statue='".$type."' and uid=".$uid;
        echo ($uid."号用户所有".$type."订单");
    }
    
    $where="where uid=".$uid;
    echo ($uid."号用户所有订单");
}elseif($type){
    $where="where statue='".$type."'";
    echo ("所有".$type."订单");
} else {$where='';
   echo ("所有用户订单");
}
    
    $sql="select order_id,uid,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from
    jd_order {$where} {$orderBy};";
    $totalRows=getResultNum($sql);
    $pageSize=4;
    $totalPage=ceil($totalRows/$pageSize);
    $page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
    if($page<1||$page==null||!is_numeric($page))$page=1;
    if($page>$totalPage)$page=$totalPage;
    $offset=($page-1)*$pageSize;
    $sql="select order_id,uid,pid,bnum,pcolor,psize,payment,post_fee,statue,create_time from 
     jd_order {$where} {$orderBy} limit {$offset},{$pageSize};";

    $rows=fetchAll($sql);
   
?>
<!doctype html>
<html>
<head>
<base target="_blank">
<meta charset="utf-8">
<title>客户订单</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/backstage.css">
<script src="scripts/jquery-1.6.4.js" type="text/javascript"></script>
<script src="scripts/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="scripts/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
<script src="scripts/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->

</head>
<body style="background:#fff">
<div class="comWIdth">
<div class="orderList comWidth" >

<form action="doBatchAction.php?act=delorders" method="post" enctype="multipart/form-data">
<table class="ordertable" cellspacing="0" cellpadding="0" >
     <thead>
         <tr class="colname">
           <th width="27%">商品</th>
            <th width="10%">单价</th>
           <th width="10%">数量</th>
           <th width="15%">用户信息</th>
             <th width="15%">实付款</th>
             <th width="10%">交易状态</th>
            <th width="10%">交易操作</th>
         </tr>
       </thead>
   <tbody class="allorder">
<tr style="height:2em" > <td> <div class="bui_select">
                            <input type="button" value="全选" class="check"  onclick="checkAll()">
                              <input type="button" value="取消全选" class="check"  onclick="Uncheck()">
                                <?php if($type=='待发货'){?>
                                    <input type="button" value="批量发货" class="check" onclick="deliveAll();">
                                    <?php }else{?>
                                       
                                          
                              <input type="submit" value="批量删除" class="check" >
                              <?php }?>
                        </div></td>
                            </tr>
<?php


foreach($rows as $row):
$proInfo=getProById($row['pid']);?>
                      
                           <tr class="orderInfo1" style="background-color: #E8E8E8">
                                <td colspan="2"><input type="checkbox" name="de[]" id="order" class="orderCheck" value=<?php echo $row['order_id'];?>>
                                     <label style="color:#808080"> <?php echo ($row['create_time']);?></label> 
                                     <span style="margin-left:2em ;color:#333;" > 订单号：<?php echo ($row['order_id'])?></span></td>
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
                                 <td style="padding-left:3em;" >
                                 <?php 
                                     $sql="select id,username,phone from jd_user where id=".$row['uid'];
                                     $user=fetchOne($sql);
                               
                          ?>
                              <span>客户id：<?php echo $user['id'] ?></span><br/>
                              <span>用户名：<?php echo $user['username']?></span><br/>
                              <span>联系方式：<?php echo $user['phone']?></span>
                              
                              
                                 </td>
                                <td style="color:red" align="center" > <div>￥<?php echo ($row['payment'])+($row['post_fee'])?></div>
                                                                                    <div>(含运费<?php echo $row['post_fee'];?>)</div></td>
                                
                                <td  align="center" >
                                          <div><?php echo $row['statue'];?></div>
                                         
                                          <div>订单详情</div>
                                          <?php if(($row['statue']=='待付款')||($row['statue']=='待发货')){}
                                          else echo('<div>查看物流</div>');?>
                                          
                                </td>
                                 <td align="center">
                                 <a href="updateLogist.php?order_id=<?php echo ($row['order_id'])?>" target="mainFrame">更改物流</a>
                                  <?php if($row['statue']=="待发货")
                                            echo ('<a href="doAdminAction.php?act=confirmDeliver&order_id='.$row["order_id"].'&pid='.$row["pid"].'">确认发货</a>');
                                            elseif($type=="交易成功"){
                                            echo('<a href="#">查看评介</a>');
                                      }
                                         
                                 ?>
                                 </td>
                            </tr>
                                <?php  endforeach;?>
                                <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="7"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                        <tbody>
                        </tbody>
                </table>
             </form>
          </div>
          </div>
</body>
<script type="text/javascript">
 
  function check(){
     alert("检查选项");
     $("input").css("background-color","blue");
  $("input[name='de']:checked").css("background-color","red");
  }
  var c="Hello";
  function msg(){
      document.write(c);
      }
  function checkAll(){
         $("input:checkbox").each(function(){
                 this.checked=true;
             });
      }
  function Uncheck(){
         $("input:checkbox").each(
             function(){
                 this.checked=false;
                     
             });
      }
  function deliveAll(){
	  alert('这里执行成功了');
 var form=document.getElementsByTagName('form')[0];
    form.action="doBatchAction.php?act=deliveAll"
    form.submit();
 
	  }
 </script>
</html>
