<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>新建网页</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />

	</head>

 <body>
  <form action="/tp/admin.28.com/index.php/Gii/Index/index" method="post">
	表名&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="tabName"/><br/>
	模块名&nbsp;&nbsp;:<input type="text" name="modName"/><br/>
        顶级权限:<input type="text" name="top_auth"/><br/>
        子控制器:<input type="text" name="son_auth"/><br/>
        
        
			<input type="submit" value="生成"/>

  </form>
 </body>
</html>