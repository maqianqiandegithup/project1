<?php
require_once '..\include.php';    
$uid=$_SESSION['loginFlag']-1;
$uid=2;
echo $uid;
$k=3;
/*获取jd_rate表中的所有列名*/
$sql = "SHOW COLUMNS FROM  jd_rate";
$result1 = mysql_query($sql);
while($row=mysql_fetch_array($result1))
{
    $colname[]=$row[0];//$array[][]是一个二维数组
    
}
print_r($colname);

/* 获取所有人的评结果*/
$sql = "SELECT * FROM jd_rate";
$result2= mysql_query($sql);
$array = array();
while($row2=mysql_fetch_array($result2))
{
    $array[]=$row2;//$array[][]是一个二维数组
}
echo "<br/>";
print_r($array);

$pid=array();
$j=0;
for($i=1;$i<count($colname);$i++){
    if($array[$uid][$i]==null){
        $pid[$j]=$i;    //用来记录那些没有被评价商品的列数，但是要怎么找到真正对应的pid呢
        $j++;
    }
}

print_r($pid);

$cos = array();
$num=count($array);
echo $num."<br/>";
$cos[0] = 0;
$fm1 = 0;
//开始计算cos
//计算分母1，分母1是第一个公式里面 “*”号左边的内容，分母二是右边的内容
for($i=1;$i<count($colname);$i++){
    if($array[$uid][$i] != null){//$array[1]代表Leo
        $fm1 += $array[$uid][$i] * $array[$uid][$i];
    }
}

$fm1 = sqrt($fm1);

for($i=0;$i<$num;$i++){
    $fz = 0;
    $fm2 = 0;
    if($i!=$uid){
        echo "Cos(".$array[$uid][0].",".$array[$i][0].")=";
        
        for($j=1;$j<9;$j++){
            //计算分子
            if($array[$uid][$j] != null && $array[$i][$j] != null){
                $fz += $array[$uid][$j] * $array[$i][$j];
            }
            //计算分母2
            if($array[$i][$j] != null){
                $fm2 += $array[$i][$j] * $array[$i][$j];
            }
        }
        $fm2 = sqrt($fm2);
        $cos[$i] = $fz/$fm1/$fm2;
        echo $cos[$i]."<br/>";
    }else{$cos[$i] = null;}
}

/*冒泡倒序排序*/
function bubble_sort($array){
    $count = count($array);
    if ($count<=0) {
        return false;
    }
    for ($i=0; $i <$count-1 ; $i++) {
        
        for ($j=0; $j <$count-$i-1 ; $j++) {
            
            if ($array[$j]<$array[$j+1]) {
                $tmp = $array[$j+1];
                $array[$j+1]=$array[$j];
                $array[$j]=$tmp;
            }
        }
    }
    return $array;
    
}
print_r($cos);
echo "<br/>";
$neighbour = array();//$neighbour只是对cos值进行排序并存储

$neighbour = bubble_sort($cos);
print_r($neighbour);
echo "<br/>";

/*
 * 这是一个二维数组，数组第一层的下标为0，1，2，代表3个人。第二
 * 层下标0代表邻居在数据表中的顺序，比如Jhon是表中的第0个人；下标1代表Leo和邻居的Cos值；下标2，3,4分别代表邻居对f,g,h的评分。*/
//$neighbour_set 存储最近邻的人和cos值
$neighbour_set = array();
for($i=0;$i<$k;$i++){
    for($j=0;$j<$num;$j++){
        
        if(($neighbour[$i] == $cos[$j])&&($neighbour[$i])&&($cos[$j])){
            $neighbour_set[$i][0] = $j;
            $neighbour_set[$i][1] = $cos[$j];
            for($n=0;$n<count($pid);$n++){
                $neighbour_set[$i][2+$n] = $array[$j][$pid[$n]];
            }
            
        }
        
    }
}
print_r($neighbour_set);
echo "<p><br/>";

$recommend=array();
//计算Leo对f的评分
$p_arr = array();
$pfz_f = 0;
$pfm_f = 0;
for($j=0;$j<count($pid);$j++){
    for($i=0;$i<$num;$i++){
        if($neighbour_set[$i][2+$j]!=null){
        $pfz_f += $neighbour_set[$i][1] * $neighbour_set[$i][2+$j];
        // echo "$neighbour_set[$i][1] * $neighbour_set[$i][2]".$neighbour_set[$i][1] * $neighbour_set[$i][2]."<br/>";
        $pfm_f += $neighbour_set[$i][1];
        }
    }
    $p_arr[0][0] = 1;
    $p_arr[0][1] = $pfz_f/($pfm_f);
    /*
     * 即相似性乘以对该商品的评价，再除以相关性所占的和，就是最终结果。那么这里到底要不要考虑那些没有评价的用户呢，
     * */
    echo $p_arr[0][1];
    if($p_arr[0][1]>3){
        $recommend[]=$colname[$pid[$j]];
        echo "推荐".$colname[$pid[$j]]."<br/>";
    }
    else{  echo "不推荐".$colname[$pid[$j]]."<br/>";}
}
//计算Leo对g的评分
//print_r($pid);
$_SESSION['recommend']=$recommend;
print_r($recommend);