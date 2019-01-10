<?php 
$b=array('4','3','8','9',null,'1');
$len=count($b);//6
for($k=1;$k<$len;$k++)
{
    for($j=0;$j<$len-$k;$j++){
        if($b[$j]<$b[$j+1]){
            $temp =$b[$j+1];
            $b[$j+1] =$b[$j] ;
            $b[$j] = $temp;
        }
    }
}
print_r($b);?>