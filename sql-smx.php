#删除数据库
drop database t_smx;

#建立数据库
create database t_smx;

use t_smx;

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

#关注我们
create table T_WATCH(
t_id    int     primary key not null auto_increment,
t_title     varchar(255)    not null,
t_filepath  varchar(255),
t_type  int not null,
t_link      varchar(255),
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#存储图片、文件、视频表
create table T_DOC(
t_id    int     primary key not null auto_increment,
t_filename  varchar(255),
t_filepath  varchar(255),
t_desc     text,
t_pid   int     not null,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#通知公告表
create table T_NOTICE(
t_id        int     primary key not null,
t_title     varchar(255)    not null,
t_content   text,
t_author    int,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#大赛动态表
create table T_TRENDS(
t_id        int     primary key not null auto_increment,
t_title     varchar(255)    not null,
t_desc      text,
t_content   text,
t_author    int,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#公示名单表
create table T_PUBLICITY(
t_id        int     primary key not null auto_increment,
t_title     varchar(255)    not null,
t_content   text,
t_author    int,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#活动掠影表
create table T_ACTIVITY(
t_id        int     primary key not null,
t_title     varchar(255)    not null,
t_filename  varchar(255),
t_filepath  varchar(255),
t_author    int,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#视频播报表
create table T_VIDEO(
t_id        int     primary key not null,
t_title     varchar(255)    not null,
t_content   text,
t_filename  varchar(255),
t_filepath  varchar(255),
t_video_name      varchar(255),
t_video_path      varchar(255),
t_author    int,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#团队表
create table T_TEAM(
t_id        int     primary key not null auto_increment,
t_name          varchar(20)    not null,
t_contestant    varchar(20),
t_teacher       varchar(20),
t_school        varchar(20),
t_content       text,
t_filename  varchar(255) not null,
t_filepath  varchar(255) not null,
t_time      datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#作品表
create table T_COMPOSITION(
t_id        int     primary key not null auto_increment,
t_name      varchar(20) not null,
t_type      int     not null,
t_team_id    varchar(20),
t_content   text,
t_filename  varchar(255) not null,
t_filepath  varchar(255) not null,
t_video_name  varchar(255),
t_video_path  varchar(255),
t_time      datetime   NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#专家表
create table T_EXPERT(
t_id        int     primary key not null,
t_name     varchar(255)    not null,
t_desc     varchar(255),
t_content   text,
t_filename  varchar(255),
t_filepath  varchar(255),
t_video_name      varchar(255),
t_video_path      varchar(255),
t_author    int     not null,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#石墨烯简介表-相关信息
create table T_SMX_INFO(
t_id        int     primary key not null auto_increment,
t_type      int     not null,
t_content   text,
t_video_name      varchar(255),
t_video_path      varchar(255),
t_time  datetime    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#链接表
create table T_INTERLINK(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_link      varchar(255) not null,
t_intro     text,
t_time      datetime  NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#大赛相关-简介、章程、规则、流程、指南
create table T_MATCH_INFO(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int     not null,
t_selected  int     not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#历史沿革
create table T_MATCH_HISTORY(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#组织机构
create table T_INSTITUTION(
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int     not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#参赛指南
create table T_GUIDE(
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#咨询答疑
create table T_CONSULT(
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int not null,
t_desc  text,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#设奖机构
create table T_AWARD_INSTI(
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int not null,
t_selected  int not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#奖项等级
create table T_AWARD_GRADE(
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int not null,
t_selected  int not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#奖项展示
create table T_AWARD_INFO(
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int not null,
t_selected  int not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#奖项-其他奖
create table T_AWARD_OTHER(
t_id    int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_type      int not null,
t_selected  int not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#关于我们-我是谁
create table T_ABOUT_WHO(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#关于我们-成功案例
create table T_ABOUT_CASE(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#关于我们-联系我们
create table T_ABOUT_CONTACT(
t_id        int     primary key not null auto_increment,
t_title     varchar(255) not null,
t_selected  int     not null,
t_content   text,
t_time  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#精彩回顾
create table T_WONDER(
t_id    int     primary key not null,
t_title     varchar(255) not null,
t_segment   int     not null,
t_district  int     not null,
t_theme     int     not null,
t_content   text    not null,
t_filename  varchar(255)    not null,
t_filepath  varchar(255)    not null,
t_time  datetime    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#大赛时间段
create table T_M_SEGMENT(
t_id    int     primary key not null auto_increment,
t_title   varchar(255)    not null
);

#大赛区域
create table T_M_DISTRICT(
t_id    int     primary key not null auto_increment,
t_title   varchar(255)    not null
);

#大赛主题
create table T_M_THEME(
t_id    int     primary key not null auto_increment,
t_title   varchar(255)    not null
);

#重点活动
create table T_KEY_ACTIVITY(
t_id    int     primary key not null,
t_title     varchar(255) not null,
t_type  int not null,
t_selected  int not null,
t_content   text,
t_filename  varchar(255),
t_filepath  varchar(255),
t_time  datetime    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

#活动类型
create table T_K_TYPE(
t_id    int     primary key not null auto_increment,
t_title   varchar(255)    not null
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
