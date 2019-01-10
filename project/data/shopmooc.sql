create DATABASE if not exists `shopJD`;
use `shopJD`;
-- ��������Ա��
drop table if exists `JD_admin`;
create table `JD_admin`(
 `id` tinyint unsigned auto_increment key,
 `username` varchar(20) not null unique,
 `password` char(32) not null,
 `email` varchar(50) not null
);

-- ���������
drop table if exists `JD_cate`;
create table `JD_cate`(
 `id` smallint unsigned auto_increment key,
 `cName` varchar(50) unique, /*������һ�޶�*/
 `cimg` varchar(50) /*�������ͼƬ*/
);

-- ������Ʒ��
drop table if exists `JD_pro`;
create table `JD_pro`(
 `id` int unsigned auto_increment key,
  `cId` smallint unsigned not null,/*��Ӧ����ID*/
 `pName` varchar(50) not null unique,
 `pSn` varchar(50) not null, /*��ʾ��Ʒ�Ļ���*/
 `inventory` int unsigned default 1,/*��Ʒ�Ŀ������*/
 `isreplesh` varchar(20)default "��Ʒ����Ҫ����",
 `cPrice` decimal(10,2) not null,/*�̳��ɱ���*/
 `mPrice` decimal(10,2) not null,/*�̳��еļ۸�*/
 `dicprice` decimal(10,2) not null,/*�˿͹����ۿۺ�ļ۸�*/
 `pDesc` text, 
 `pImg` varchar(50) not null,  /*��Ʒ��ͼƬ*/
 `pubTime` int unsigned not null,/*�ϼ�ʱ��*/
 `isShow` tinyint(1) default 1,
 `isHot` tinyint(1) default 0
);

--������Ʒ��ɫ��
drop table if exists `shop_color`;
create table `shop_color`(
��pid�� int not null,
`pcolor` varchar(20) not null
);

-- �����û���
drop table if exists `JD_user`;
create table `JD_user`(
`id` int unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
��phone�� varchar(11) not null,
`sex` enum("��","Ů","����") not null,
`regTime` int unsigned not null,
`shCartnum` int unsigned default 0
);

-- ��������
drop table if exists `JD_album`;
create table `JD_album`(
`id` int unsigned auto_increment key,
`pid` int unsigned not null,  /*��Ʒ��id*/
`albumPath` varchar(50) not null

);

--����������
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
`statue` enum("δ����","�Ѹ���","δ����","�ѷ���","��ǩ��","�˻���","������"),
`create_time` datetime null,
`update_time` datetime null,
`payment_time` datetime null,
`end_time` datetime null,
`shipping_time` varchar(20) null,
`shipping_code` varchar(20) null,
`buyer_rate` int(2) default 4 ()     
);
--�������ﳵ��
drop table if exists `shop_car`;
create table `shop_car`(
`id`  int unsigned auto_increment key,
`uid` int unsigned not null ,
`pid` int unsigned not null,
`bnum` int(10) not null,/*��ӵ����ﳵ������*/
`pcolor` varchar(20),/*��ѡ��Ʒ����ɫ*/
`psize` varchar(20),/*������Ʒ�ĳߴ�*/
`totalfee` bigint(50) null /*��Ʒ�ܽ��*/
);

--����������Ϣ������
drop table if exists `logistics`;
create table `logistics`(
`id` int unsigned auto_increment key,
`order_id` varchar(20) not null,
`logtime` datetime not null,
`location` text not null 
);
--�����û���ַ��
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