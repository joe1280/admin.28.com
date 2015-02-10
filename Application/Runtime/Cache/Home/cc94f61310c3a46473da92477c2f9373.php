<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="./css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
          
        </div>
        <div></div>
		<h2>当位置:修改</h2>
        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/tp/admin.28.com/index.php/Home/Role/update/id/css/mine.css" method="post" enctype="multipart/form-data">
			<input type="hidden" name="role_id" value="<?php echo $admin_info['role_id'];?>"/>
            <table border="1" width="100%" class="table_a">
               
				
				


				 
			
					                <tr>
                    <td>角色名称</td>
                    <td><input type="text" name="role_name" value="<?php echo $admin_info['role_name']; ?>"/></td>
				<td>
								<span class="require-field">*</span>
								</td>
                </tr>
				
				


				 
					                <tr>
                    <td>角色权限</td>
                    <td>
					<?php foreach($data as $k=>$v): if(strpos(','.$admin_info['role_auth_ids'].',', ','.$v['auth_id'].',')!==false) $check='checked="checked"'; else $check=''; ?>
						
					

					
					<input <?php echo $check; ?>type="checkbox" name="role_auth_ids[]" value="<?php echo $v['auth_id']; ?>"/>
						
						
					<?php echo str_repeat('&nbsp;',($v['auth_level']*4)).$v['auth_name']?><br/>
					<?php endforeach;?>
					
				<td>
								<span class="require-field">*</span>
								</td>
                </tr>
				


				 
			
				
				


				 
			            </table>

			 <input type="submit" value="修改">
            </form>
        </div>
    </body>
</html>