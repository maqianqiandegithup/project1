﻿<?php
require_once '../include.php';
checkLogined();
$cid=$_REQUEST['cid'];
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by p.".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
//$where=$keywords?"where p.pName like '%{$keywords}%'":null;
$where=$cid?"where cId=".$cid:null;
//得到数据库中所有商品
$sql="select p.id,p.pName,p.pSn,p.inventory,p.cPrice,p.mPrice,p.dicprice,p.pDesc,p.pubTime,p.isShow,p.isHot,
c.cName from jd_pro as p join jd_cate c on p.cId=c.id {$where}  ";
$totalRows=getResultNum($sql);
$pageSize=8;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select p.id,p.pName,p.pSn,p.inventory,p.cPrice,p.mPrice,p.dicprice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from jd_pro as
 p join jd_cate c on p.cId=c.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="scripts/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail"  style="display:none;">

</div>

<div class="details">
 <form action="doBatchAction.php?act=1&name=<?php echo $row['id']?>" method="post" enctype="multipart/form-data">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                           <span class="check"> <input type="button" value="添加"  onclick="addPro()"></span>
                            <span class="check"> <input type="button" value="全选"  onclick="checkAll()"></span>
                            <span class="check">  <input type="button" value="取消全选"  onclick="Uncheck()"></span>
                          <span class="check"> <input type="submit" value="批量删除"  ></span>
                        </div>
                        <div class="fr">
                           
                          
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">商品名称</th>
                                <th width="10%">商品分类</th>
                                <th width="10%">是否上架</th>
                                <th width="15%">上架时间</th>
                                <th width="10%">慕课价格</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" name="de[]" id="c1" class="check" value=<?php echo $row['id'];?>>
                                <label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['pName']; ?></td>
                                <td><?php echo $row['cName'];?></td>
                                <td>
                                	<?php echo $row['isShow']==1?"上架":"下架";?>
                                </td>
                                 <td><?php echo date("Y-m-d H:i:s",$row['pubTime']);?></td>
                                  <td><?php echo ceil(($row['dicprice'])*($row['mPrice']));?>元</td>
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(<?php echo $row['id'];?>,'<?php echo $row['pName'];?>')">
                                				<input type="button" value="修改" class="btn" onclick="editPro(<?php echo $row['id'];?>)">
                                				<input type="button" value="删除" class="btn"onclick="delPro(<?php echo $row['id'];?>)">
					                            <div id="showDetail<?php echo $row['id'];?>" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="right">商品名称</td>
					                        			<td><?php echo $row['pName'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品类别</td>
					                        			<td><?php echo $row['cName'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品货号</td>
					                        			<td><?php echo $row['pSn'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品数量</td>
					                        			<td><?php echo $row['inventory'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">商品售价</td>
					                        			<td><?php echo $row['mPrice'];?></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">折后价</td>
					                        			<td><?php echo ceil(($row['dicprice'])*($row['mPrice']));?></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品图片</td>
					                        			<td>
					                        			<?php 
					                        			$proImgs=getAllImgByProId($row['id']);
					                        			foreach($proImgs as $img):
					                        			?>
					                        			<img width="100" height="100" src="uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
					                        			<?php endforeach;?>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否上架</td>
					                        			<td>
					                        				<?php echo $row['isShow']==1?"上架":"下架";?>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否热卖</td>
					                        			<td>
					                        				<?php echo $row['isHot']==1?"热卖":"正常";?>
					                        			</td>
					                        		</tr>
					                        	</table>
					                        	<span style="display:block;width:80%; ">
					                        	商品描述<br/>
					                        	<?php echo $row['pDesc'];?>
					                        	</span>
					                        </div>
                                
                                </td>
                            </tr>
                           <?php  endforeach;?>
                           <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="7"><?php echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
    </form>                    
</div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id){
		window.location='editPro.php?id='+id;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?order="+val;
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
</script>
</body>
</html>