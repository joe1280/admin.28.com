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
    
    <span class="action-span"><a href="/tp/admin.28.com/index.php/Goods/Attr/add/type_id/<?php echo I('get.type_id'); ?>">添加</a></span>
    <span class="action-span1"><a href="#">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> -  </span>

    <div style="clear:both"></div>

</h1>

    <select onchange='location.href="/tp/admin.28.com/index.php/Goods/Attr/showlist/type_id/"+this.value'>
        <?php foreach($type as $k=>$v): if($v['id']==I('get.type_id')) $select="selected='selected'"; else $select=''; ?>
        <option <?php echo $select; ?> value="<?php echo $v['id'];?>"><?php echo $v['type_name']; ?></option>
        <?php endforeach;?>
    </select>

<form method="post" action="/tp/admin.28.com/index.php/Goods/Attr/mdel/type_id/<?php echo I('get.type_id'); ?>" name="listForm">
   
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">

	
            <tr>
			<th width="30"> <input type="checkbox"/> </th>
			 				
				<th>ID</th>
				
                
							
				<th>属性名称</th>
				
                
							
				<th>属性类型</th>
				
                
							
				<th>类型ID</th>
				
                
							
				<th>属性可选值</th>
				
                
						<th>操作</th>
            </tr>

		
			<?php foreach($admin_array['list'] as $k=>$v):?>            <tr>
				<td><input type="checkbox" name="ids[]" value="<?php echo $v['id'];?>"/></td>
												<td><?php echo $v['id']?></td>
												<td><?php echo $v['attr_name']?></td>
												<td><?php echo $v['attr_type']?></td>
												<td><?php echo $v['type_id']?></td>
												<td><?php echo $v['attr_option_val']?></td>
								<td>
				
                <a href="/tp/admin.28.com/index.php/Goods/Attr/update/id/<?php echo $v['id'];?>/type_id/<?php echo I('get.type_id'); ?>" title="编辑">编辑</a> 
			
                <a href="/tp/admin.28.com/index.php/Goods/Attr/del/id/<?php echo $v['id'];?>/type_id/<?php echo I('get.type_id'); ?>" title="删除">移除</a> 
			
                </td>
            </tr>
           <?php endforeach; ?>			<tr>
					<td><input type="submit" value="删除所选"/></td>
					<td align="right" nowrap="true" colspan="5"></td>
			</tr>
        </table>
    </div>

	</form>

<?php echo $admin_array['show'];?>
</body>
</html>