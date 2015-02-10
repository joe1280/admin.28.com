<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
            <link href="/tp/admin.28.com/Public/Styles/mine.css" type="text/css" rel="stylesheet">
                <script type='text/javascript' src='/tp/admin.28.com/Public/Js/jquery-1.4.2.min.js'></script>
                </head>

                <body>

                    <div class="div_head">

                    </div>
                    <div></div>
                    <h2>当位置:添加</h2>
                    <div style="font-size: 13px;margin: 10px 5px">
                        <form action="/tp/admin.28.com/index.php/Goods/Category/add" method="post" enctype="multipart/form-data">
                            <table border="1" width="100%" class="table_a">



                                <tr>
                                    <td>名称</td>
                                    <td><input type="text" name="cat_name" /></td>
                                    <td>
                                        <span class="require-field">*</span>
                                    </td>
                                </tr>






                                <tr>	               
                                    <td>上级分类</td>
                                    <td>
                                        <select name="cat_pid">

                                            <option value="0">顶级分类</option>
                                            <?php foreach($cat_data as $k=>$v):?>

                                            <option value="<?php echo $v['auth_id']; ?>"><?php echo str_repeat('-',($v['level'])*4).$v['cat_name']; ?></option>

                                            <?php endforeach;?>
                                        </select>

                                    </td>
                                    <td>
                                        <span class="require-field">*</span>
                                    </td>
                                </tr>






                                <tr>
                                    <td>价格区间</td>
                                    <td><input type="text" name="cat_section_price" /></td>
                                    <td>
                                        <span class="require-field">*</span>
                                    </td>
                                </tr>






                                <tr>
                                    <td>关键字</td>
                                    <td><input type="text" name="cat_keyword" /></td>
                                    <td>
                                        <span class="require-field">*</span>
                                    </td>
                                </tr>






                                <tr>
                                    <td>详细描述</td>
                                    <td>
                                        <textarea rows="6" cols="60" name="cat_desc"></textarea>
                                    </td>
                                   
                                </tr>






                                <tr>
                                    <td>属性ID</td>
                                    <td id="attrid">
                                        <div>
                                            <input type='button' value='+' id="add"/>
                                            <select onchange="getAttr(this)">
                                                <option value='0'>选择类型</option>
                                                <?php foreach($type_info as $k=>$v): ?>
                                                <option value="<?php echo $v['id']; ?>">
                                                    <?php echo $v['type_name']?>
                                                </option>
                                                <?php endforeach;?>
                                            </select>  
                                            <select name="cat_attr_id[]"></select>
                                        </div>




                                    </td>
                                    <td>
                                        <span class="require-field">*</span>
                                    </td>
                                </tr>





                            </table>

                            <input type="submit" value="添加">
                        </form>
                    </div>
                </body>
                </html>
                <script type='text/javascript'>
                   function getAttr(select){
                       var type_id=$(select).val();
                       var next_select=$(select).next("select")
                       $.ajax({
                           type: 'GET',
                           url : '/tp/admin.28.com/index.php/Goods/Category/getAttr/type_id/'+type_id,
                           dataType:'json',
                         
                           success: function(data){  
                               var html="<option value='0'>请筛选属性</option>";
                              $(data).each(function(k,v){
                                  html+="<option value='"+v.id+"'>"+v.attr_name+"</option>";
                              });
                              next_select.html(html);
                           }
                       });
                      
                   }
                   $('#add').click(function(){
                       
                         var btnVal=$(this).val();
                       var div=$(this).parent();
                       //console.log(div);
                       if(btnVal=='+'){
                           var newdiv=div.clone(true);
                           newdiv.find(':button').val('-');
                           newdiv.find('select').eq(1).html('');
                            $('#attrid').append(newdiv);
                       }else{
                           div.remove();
                       }
                   
                   });
                     
                  
                   
                </script>