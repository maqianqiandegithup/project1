<?php
require_once'..\include.php';

function addOrder(){
    $arr=$_SESSION['n'];
    $arr['uid']=$_SESSION['loginFlag'];
    $arr['statue']="未付款";
    $time=time();
    $arr['create_time']=date('y-m-d H:i:s',$time);
    $arr['order_id']=(string)($time);
    $res=insert('jd_order',$arr);
    if($res){
        echo "<script>alert('订单创建成功');
          window.open('payOrder.php?order_id=".$arr['order_id']."');
</script>";
    }else{
        echo "<script>alert('订单创建失败');</script>";
        
    }
}
function payment($order_id){
    $arr['statue']="待发货";
    $time=time();
    $arr['payment_time']=date('y-m-d H:i:s',$time);
    if(update('jd_order',$arr,"order_id=".$order_id)){
        $logInfo['date']=date("Y-m-d",$time);
        $logInfo['time']=date("H:i:s",$time);
        $logInfo['order_id']=$order_id;
        $logInfo['logInfo']="您的订单已经支付成功，正在等待发货";
        if(insert('logistics',$logInfo)){
            $mes="<p>支付成功!</p><a href='index.php'>返回首页</a>";
        }
        
        
        
    }
    else{
        $mes="<p>支付失败</p><a href='payOrder.php?order_id=".$order_id."'>返回继续支付</a>";
    }
    return $mes;
}
/*
 * 根据订单号获取物流信息
 * */


function confirmDeliver($order_id,$pid){
    $pro=getProById($pid);
    $sql="select bnum from jd_order where order_id=".$order_id;
    $bnum=fetchOne($sql)['bnum'];
    echo $bnum;
    $arr['inventory']=$pro['inventory']-$bnum;
    echo $arr['inventory'];
    if($arr['inventory']<0){
        $mes="发货失败，请查看库存"."<a href='index.php'>返回首页</a>";
        exit();
    }
    $order['statue']="待收货";
    $time=time();
    $order['shipping_time']=date("Y-m-d H:i:s",$time);
    $order['shipping_code']=(string)($time);
    $a1=update('jd_order',$order,'order_id='.$order_id);
    $a2=update('jd_pro',$arr,'id='.$pid);
    if($a1&&$a2){
        $logInfo['date']=date("Y-m-d",$time);
         $logInfo['time']=date("H:i:s",$time);
        $logInfo['shipping_code']=$order['shipping_code'];
        $logInfo['order_id']=$order_id;
        $logInfo['logInfo']="您的订单发货成功，正在等待揽收";
        if(insert('logistics',$logInfo)){
            $mes="发货成功"."<a href='index.php'>返回首页</a>";
        }
    }
    else{
        
        $mes="发货失败"."<a href='index.php'>返回首页</a>";
    }
    
    
    
    
    return $mes;
}


function getLogInfo($order_id){
    $sql="select * from logistics where order_id=".$order_id." order by date DESC, time DESC;";
    $rows=fetchAll($sql);
    return $rows;
}
function updateLogist($id){
    $arr['order_id']=$id;
    $time=time();
    
    $arr['date']=date("Y-m-d",$time);
    $arr['time']=date("H:i:s",$time);
    $arr['shipping_code']=$_POST['shipping_code'];
    $arr['logInfo']=$_POST['logInfo'];
    if(insert('logistics',$arr))
        echo"<script>alert('物流更新成功');history.back();</script>";
        else "<script>alert('物流更新失败');history.back();</script>";
}

/*
 * 客户确认收货
 * */
function receive($order_id){
    $arr['statue']="待评价";
    update('jd_order',$arr,"order_id=".$order_id);
    $time=time();
    $order['order_id']=$order_id;
    $order['date']=date("Y-m-d",$time);
    $order['time']=date("H:i:s",$time);
    $sql="select shipping_code from jd_order where order_id=".$order_id;
    $order['shipping_code']=fetchOne($sql)['shipping_code'];
    $order['logInfo']="您的订单已签收";
    $res=insert('logistics',$order);
    if($res){
        $mes="确认收货成功"."<a href='JavaScript:history.back()'>返回上一页</a>";
    }else  $mes="确认收货失败"."<a href='JavaScript:history.back()'>返回上一页</a>";
return $mes;
}

/*存入用户打分数据*/
function rate($order_id,$pid){
    $arr=$_POST;
   
    $sql="select uid from jd_rate where uid=".$_SESSION['loginFlag'].";";
    $res=fetchOne($sql);
 
    if($res){
        $res1=update("jd_rate",$arr,"uid=".$_SESSION['loginFlag']);
    }else{
        $arr['uid']=$_SESSION['loginFlag'];
        $res1=insert("jd_rate",$arr);
    }
    if($res1){
        $order['statue']="交易成功";
        $res2=update("jd_order", $order,"order_id=".$order_id);
        if($res2){
            $arr2['order_id']=$order_id;
            $time=time();
            $arr2['date']=date('Y-m-d',$time);
            $arr2['time']=date('H:i:s',$time);
            $arr2['logInfo']='订单交易成功';
            $res3=insert('logistics', $arr2);
            if($res3){
                echo "<script> window.alert('评价成功')</script>";
            }
        }
    }
    else {
        echo "<script> alert('评价失败')</script>";
    }
    
}