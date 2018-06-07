<?php
	//系统配置文件
	define('WEBNAME','YangWeb俱乐部');
	define('PAGE_SIZE',10);
	define('ARTICLE_SIZE',8);
	define('NAV_SIZE',10);
	define('UPDIR','/uploads/');

	//轮播器配置
	define('RO_NUM',3);

	//广告服务
	define('ADVER_TEXT_NUM',5);
	define('ADVER_PIC_NUM',3);
	//不可修改的项目

	//数据库配置文件
	define('DB_HOTS','localhost');
	define('DB_USER','root');
	define('DB_PWD','root');
	define('DB_NAME','cms');

	define('PREV_URL',@$_SERVER["HTTP_REFERER"]);

	//模板配置信息
	 $smarty->template_dir = ROOT_PATH.'/View/';
	 $smarty->compile_dir = ROOT_PATH.'/Compile/';
	$smarty->cache_dir = ROOT_PATH.'/Cache/';
	$smarty->config_dir = ROOT_PATH.'/Conf/';
