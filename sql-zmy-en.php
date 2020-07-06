drop database t_zmy_en;
#建立数据库
create database t_zmy_en;

use t_zmy_en;

#创建用户表（用户后台管理）
create table t_user(
t_id    int     primary key not null auto_increment,
t_username  varchar(255)    not null,
t_password  varchar(255)    not null,
t_desc      varchar(255),
t_time      datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
insert into t_user (t_username, t_password) value('admin', 'admin');

#首页大图表
create table T_BANNER(
t_id    int     primary key not null auto_increment,
t_title     varchar(255)    not null,
t_filepath  varchar(255)    not null,
t_link      varchar(255),
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#关于我们
create table T_FOUND_ABOUT(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#理念
create table T_FOUND_IDEA(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int     not null,
t_selected  int     not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#发起人寄语
create table T_FOUND_WORD(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#组织架构
create table T_FOUND_ORGAN(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int     not null,
t_selected  int     not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#章程
create table T_FOUND_CHARTER(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#公益项目-简介
create table T_WELFARE_PROJECT(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text    ,
t_file_name      varchar(255) not null,
t_file_path     varchar(255) not null,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#公益项目-流程图
create table T_WELFARE_FLOW(
t_id        int     primary key not null auto_increment,
t_pid       int     not null,
t_title     varchar(255) not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#公益项目-动态
create table T_WELFARE_TRENDS(
t_id        int     primary key not null auto_increment,
t_pid       int     not null,
t_title     varchar(255) not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#公益项目-合作方展示
create table T_WELFARE_COOPERATE(
t_id        int     primary key not null auto_increment,
t_pid       int     not null,
t_title     varchar(255) not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#公益项目-政策
create table T_WELFARE_POLICY(
t_id        int     primary key not null auto_increment,
t_pid       int     not null,
t_title     varchar(255) not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#新闻资讯、行业动态、故事
create table T_NEWS_TRENDS(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int     not null,
t_content   text,
t_from      varchar(255),
t_link      varchar(255),
t_from_time varchar(255),
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#荣誉-按年进行统计
create table T_NEWS_HONOUR(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_year      varchar(255) not null,
t_file_name      varchar(255) not null,
t_file_path     varchar(255) not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#媒体关注
create table T_NEWS_MEDIA(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_link      varchar(255) ,
t_date      varchar(255) not null,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#视频资料
create table T_NEWS_VIDEO(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_content   text    ,
t_file_name      varchar(255) not null,
t_file_path     varchar(255) not null,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#信息公开-工作年报
create table T_INFO_ANNUAL(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_pic_name   varchar(255) not null,
t_pic_path  varchar(255) not null,
t_file_name      varchar(255) ,
t_file_path     varchar(255) ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
#信息公开-审计报告
create table T_INFO_AUDIT(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_pic_name   varchar(255) not null,
t_pic_path  varchar(255) not null,
t_file_name      varchar(255) ,
t_file_path     varchar(255) ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
#信息公开-基金会规章制度
create table T_INFO_RULE(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_file_name      varchar(255) ,
t_file_path     varchar(255) ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
#信息公开-善款收支
create table T_INFO_REVENUE(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_file_name      varchar(255) ,
t_file_path     varchar(255) ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
#信息公开-评估报告
create table T_INFO_REPORT(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_file_name      varchar(255) ,
t_file_path     varchar(255) ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#爱心捐赠
create table T_DONATE(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int     not null,
t_content   text    ,
t_file_name   varchar(255) not null,
t_file_path  varchar(255) not null,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#联系我们
create table T_CONTACT(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int     not null,
t_content   text    ,
t_file_name   varchar(255) not null,
t_file_path  varchar(255) not null,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
#联系我们-类型
create table T_CONTACT_TYPE (
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null
);
#联系我们
create table T_CONTACT_US(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
#关注我们
create table T_WATCH(
t_id    int     primary key not null auto_increment,
t_title     varchar(255)    not null,
t_file_name  varchar(255)    not null,
t_file_path  varchar(255)    not null,
t_type  int not null,
t_link      varchar(255)    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#特色项目
create table T_SPECIAL_PROJECT(
t_id    int     primary key not null auto_increment,
t_title     varchar(255)    not null,
t_file_name  varchar(255)    not null,
t_file_path  varchar(255)    not null,
t_link      varchar(255)    ,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#大事记
create table T_CHRONICAL_EVENT(
t_id    int     primary key not null auto_increment,
t_title     varchar(255)    not null,
t_file_name  varchar(255)    not null,
t_file_path  varchar(255)    not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#概要联系我们
create table T_CONTACT_INFO(
t_id        int     primary key not null auto_increment,
t_selected  int     not null,
t_addr     varchar(255),
t_tel     varchar(255),
t_phone  varchar(255),
t_email   varchar(255),
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);
