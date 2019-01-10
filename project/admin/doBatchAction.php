<script>
if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){}
else exit();
</script>
<?php
require_once '../include.php';
checkLogined();
$id=$_POST['de'];
$act=$_REQUEST['act'];
$name=$_REQUEST['name'];

foreach($id as $ide){
    $exec="你错了";
    if($act==1){
        $exec="delete from jd_pro where id=$ide";
        mysql_query($exec);
        if((mysql_affected_rows()==0) or (mysql_affected_rows()==-1))
        {
            echo "没有找到商品".($name)."，或者删除时出错<br/><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
            exit;
        }
      
        
    }elseif($act=="delcates"){
        $exec="delete from jd_cate where id=$ide";
        mysql_query($exec);
        if((mysql_affected_rows()==0) or (mysql_affected_rows()==-1))
        {
            echo "没有找到类".($name)."，或者删除时出错<br/><a href='listCate.php' target='mainFrame'>查看分类列表</a>";
            exit;
        }
       
    }elseif($act==3){
        $exec="delete from jd_admin where id=$ide";
        mysql_query($exec);
        if((mysql_affected_rows()==0) or (mysql_affected_rows()==-1))
        {
            echo "没有找到记录".($name)."，或者删除时出错<br/><a href='listAdmin.php' target='mainFrame'>查看管理员列表</a>";
            exit;
        }
       
    }elseif($act=="delorders"){
        $exec="delete from jd_order where order_id=$ide";
        mysql_query($exec);
        if((mysql_affected_rows()==0) or (mysql_affected_rows()==-1))
        {
            echo "没有找到记录".($name)."，或者删除时出错<br/><a href='OrderList.php' target='mainFrame'>查看订单列表</a>";
            exit;
        }
    }elseif($act=="deliveAll"){
        $sql="select pid from jd_order where order_id=$ide";
        $pid=fetchOne($sql)['pid'];
        $pro=getProById($pid);
        $sql="select bnum from jd_order where order_id=$ide";
        $bnum=fetchOne($sql)['bnum'];
        echo $bnum;
        $arr['inventory']=$pro['inventory']-$bnum;
        echo $arr['inventory'];
        if($arr['inventory']<0){
            echo "发货失败，请查看库存"."<a href='index.php'>返回首页</a>";
            exit();
        }
        $order['statue']="待收货";
        $time=time();
        $order['shipping_time']=date("Y-m-d H:i:s",$time);
        $order['shipping_code']=(string)($time);
        $a1=update('jd_order',$order,'order_id='.$ide);
        $a2=update('jd_pro',$arr,'id='.$pid);
        if($a1&&$a2){
            $logInfo['date']=date("Y-m-d",$time);
            $logInfo['time']=date("H:i:s",$time);
            $logInfo['shipping_code']=$order['shipping_code'];
            $logInfo['order_id']=$ide;
            $logInfo['logInfo']="您的订单发货成功，正在等待揽收";
           insert('logistics',$logInfo);
              
      
        }
        
    }
    if($act==1){
        echo "所选择的记录已经删除<br/><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
    }elseif($act=="delcates"){
        echo "所选择的记录已经删除<br/><a href='listCate.php' target='mainFrame'>查看分类列表</a>";
    }elseif($act==3){
        echo "所选择的记录已经删除<br/><a href='listAdmin.php' target='mainFrame'>查看管理员列表</a>";
    }elseif($act=="delorders"){
        echo "所选择的记录已经删除<br/><a href='OrderList.php' target='mainFrame'>查看订单列表</a>";
        
    }
  
}

?> 