<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 商品 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/tp/admin.28.com/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/tp/admin.28.com/Public/Styles/main.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" charset="utf-8" src="/tp/admin.28.com/Public/Js/jquery-1.4.2.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="/tp/admin.28.com/index.php/Goods/Recommend/add">添加</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> -  </span>

    <div style="clear:both"></div>

</h1>

<form method="post" action="/tp/admin.28.com/index.php/Goods/Recommend/mdel" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">

	
            <tr>
			<th width="30"> <input id="selall" type="checkbox"/> </th>
			 				
				<th>id</th>
				
                
							
				<th>推荐名称</th>
				
                
							
				<th>推荐类型</th>
				
                
						<th>操作</th>
            </tr>

		
			<?php foreach($admin_array['list'] as $k=>$v):?>            <tr  class="ontr">
				<td><input type="checkbox" name="ids[]" value="<?php echo $v['id'];?>"/></td>
												<td><?php echo $v['id']?></td>
												<td><?php echo $v['rec_name']?></td>
												<td><?php echo $v['rec_type']?></td>
								<td>
				
                <a href="/tp/admin.28.com/index.php/Goods/Recommend/update/id/<?php echo $v['id'];?>" title="编辑">编辑</a> 
			
                <a href="/tp/admin.28.com/index.php/Goods/Recommend/del/id/<?php echo $v['id'];?>" title="编辑">移除</a> 
			
                </td>
            </tr>
           <?php endforeach; ?>			<tr>
					<td><input type="submit" value="删除所选"/></td>
					<td align="right" nowrap="true" colspan="3"></td>
			</tr>
        </table>
    </div>

	</form>

<?php echo $admin_array['show'];?>
</body>
</html>
<script type='text/javascript'>
    
    
    $("#selall").click(function(){
	if($(this).attr("checked"))
		$("input[name='ids[]']").attr("checked", "checked");
	else
		$("input[name='ids[]']").removeAttr("checked");
});
    //鼠标移上显示红色
    $(".ontr").mouseover(function(){
     //   alert(11);
        $(this).addClass("tron");
    });
    
        $(".ontr").mouseout(function(){
        $(this).removeClass("tron");
    });
    
</script>