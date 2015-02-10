<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 商品 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/tp/admin.28.com/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/tp/admin.28.com/Public/Styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="/tp/admin.28.com/index.php/Home/Admin/add">添加</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> -  </span>

    <div style="clear:both"></div>

</h1>

<form method="post" action="/tp/admin.28.com/index.php/Home/Admin/mdel" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">

	
            <tr>
			<th width="30"> <input type="checkbox"/> </th>
			 				
				<th>管理ID</th>
				
                
							
				<th>管理名称</th>
				
                
											
				<th>管员角色</th>
				
                
						<th>操作</th>
            </tr>

		
			<?php foreach($admin_array['role'] as $k=>$v): ?> 
                            
                                  <tr>
                            
				<td><input type="checkbox" name="ids[]" value="<?php echo $v['id'];?>"/></td>
                               
												<td><?php echo $v['id']?></td>
												<td><?php echo $v['username']?></td>
																
																<td><?php echo $v['role_name']; ?></td>
								<td>							
																					
                <a href="/tp/admin.28.com/index.php/Home/Admin/update/id/<?php echo $v['id'];?>" title="编辑">编辑</a> 
				<?php if ($v['id']>1):?>
                <a href="/tp/admin.28.com/index.php/Home/Admin/del/id/<?php echo $v['id'];?>" title="编辑">移除</a> 
				<?php endif;?>
                </td>
            </tr>
           <?php endforeach; ?>			<tr>
					<td><input type="submit" value="删除所选"/></td>
					<td align="right" nowrap="true" colspan="4"></td>
			</tr>
        </table>
    </div>

	</form>

<?php echo $admin_array['show'];?>
</body>
</html>