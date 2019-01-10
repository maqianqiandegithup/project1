create DATABASE if not exists `shopJD`;
use `shopJD`;
-- 创建管理员表
drop table if exists `JD_admin`;
create table `JD_admin`(
 `id` tinyint unsigned auto_increment key,
 `username` varchar(20) not null unique,
 `password` char(32) not null,
 `email` varchar(50) not null
);

-- 创建分类表
drop table if exists `JD_cate`;
create table `JD_cate`(
 `id` smallint unsigned auto_increment key,
 `cName` varchar(50) unique, /*类名独一无二*/
 `cimg` varchar(50) /*保存类的图片*/
);

-- 创建商品表
drop table if exists `JD_pro`;
create table `JD_pro`(
 `id` int unsigned auto_increment key,
  `cId` smallint unsigned not null,/*对应的类ID*/
 `pName` varchar(50) not null unique,
 `pSn` varchar(50) not null, /*表示商品的货号*/
 `inventory` int unsigned default 1,/*商品的库存数量*/
 `isreplesh` varchar(20)default "商品不需要补货",
 `cPrice` decimal(10,2) not null,/*商场成本价*/
 `mPrice` decimal(10,2) not null,/*商场中的价格*/
 `dicprice` decimal(10,2) not null,/*顾客购买折扣后的价格*/
 `pDesc` text, 
 `pImg` varchar(50) not null,  /*商品的图片*/
 `pubTime` int unsigned not null,/*上架时间*/
 `isShow` tinyint(1) default 1,
 `isHot` tinyint(1) default 0
);

--创建商品颜色表
drop table if exists `shop_color`;
create table `shop_color`(
·pid· int not null,
`pcolor` varchar(20) not null
);

-- 创建用户表
drop table if exists `JD_user`;
create table `JD_user`(
`id` int unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
·phone· varchar(11) not null,
`sex` enum("男","女","保密") not null,
`regTime` int unsigned not null,
`shCartnum` int unsigned default 0
);

-- 创建相册表
drop table if exists `JD_album`;
create table `JD_album`(
`id` int unsigned auto_increment key,
`pid` int unsigned not null,  /*商品的id*/
`albumPath` varchar(50) not null

);

--创建订单表
drop table if exists `JD_order`;
create table `JD_order`(
`order_id` varchar(20) not null key,
`uid` int unsigned not null,
`pid` int unsigned not null,
`bnum` int(10) not null,
`pcolor` varchar(20),
`psize` varchar(20),
`payment` bigint(50)  null,
`post_fee` bigint(50) null default 0,
`statue` enum("未付款","已付款","未发货","已发货","已签收","退换中","已评论"),
`create_time` datetime null,
`update_time` datetime null,
`payment_time` datetime null,
`end_time` datetime null,
`shipping_time` varchar(20) null,
`shipping_code` varchar(20) null,
`buyer_rate` int(2) default 4 ()     
);
--创建购物车表
drop table if exists `shop_car`;
create table `shop_car`(
`id`  int unsigned auto_increment key,
`uid` int unsigned not null ,
`pid` int unsigned not null,
`bnum` int(10) not null,/*添加到购物车的数量*/
`pcolor` varchar(20),/*所选商品的颜色*/
`psize` varchar(20),/*所购商品的尺寸*/
`totalfee` bigint(50) null /*商品总金额*/
);

--创建物流信息回馈表
drop table if exists `logistics`;
create table `logistics`(
`id` int unsigned auto_increment key,
`order_id` varchar(20) not null,
`logtime` datetime not null,
`location` text not null 
);
--创建用户地址表
ALTER TABLE `jd_pro` DROP `inventory`;
drop table if exists `location`;
create table `deliver_address`(
`id` int unsigned auto_increment key,
`uid` int unsigned,
`province` varchar(20) not null,
`city`varchar(20) not null,
`district` varchar(20) not null, 
`address` text not null,
`receiver` varchar(20),
`phone` varchar(20) not null
);