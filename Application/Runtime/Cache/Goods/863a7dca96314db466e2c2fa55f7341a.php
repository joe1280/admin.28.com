<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加新商品 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/tp/admin.28.com/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/tp/admin.28.com/Public/Styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/tp/admin.28.com/Public/Js/jquery-1.4.2.min.js"></script>
 <script type="text/javascript" charset="utf-8" src="/tp/admin.28.com/Public/ueditor/ueditor.config.js"></script>
 <script type="text/javascript"  charset="utf-8" src="/tp/admin.28.com/Public/ueditor/ueditor.all.min.js"></script>
 <script type="text/javascript" charset="utf-8" src="/tp/admin.28.com/Public/ueditor/lang/zh-cn/zh-cn.js"></script>


</head>
<body>
<h1>
    <span class="action-span"><a href="__GROUP__/Goods/goodsList">商品列表</a>
    </span>
    <span class="action-span1"><a href="__GROUP__">ECSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 添加新商品 </span>
    <div style="clear:both"></div>
</h1>

<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" >基本信息</span>
            <span class="tab-back" >商品描述</span>
            <span class="tab-back" >会员价格</span>
            <span class="tab-back" >商品属性</span>
            <span class="tab-back" >商品图片</span>
            
        </p>
    </div>
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="/tp/admin.28.com/index.php/Goods/Goods/add" method="post">
            <!--商品基本信息-->
            <table width="90%" id="general-table" align="center" class="set_span">
                
                   <tr>
                    <td class="label">商品图片：</td>
                    <td>
                        <input type="file" name="img" size="35" />
                    </td>
                </tr>
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="Goods[goods_name]" value=""size="30" />
                    <span class="require-field">*</span></td>
                </tr>
              
                                <tr>	               
                                    
                                        <td class="label">商品分类：</td>
                                    <td>
                                        <select name="Goods[cat_id]">

                                            <option value="0">顶级分类</option>
                                            <?php foreach($cat_data as $k=>$v):?>

                                            <option value="<?php echo $v['id']; ?>"><?php echo str_repeat('-',($v['level'])*4).$v['cat_name']; ?></option>

                                            <?php endforeach;?>
                                        </select>

                                    </td>
                                    <td>
                                        <span class="require-field">*</span>
                                    </td>
                                </tr>
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                        <select name="Goods[brand_id]">
                            <option value="0">请选择...</option>
                          <?php foreach($brand_info as $k=>$v):?>
                          <option value="<?php echo $v['id']?>"><?php echo $v['brand_name']; ?></option>
                           <?php endforeach;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td>
                        <input type="text" name="Goods[shop_price]" value="0" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
              
                <tr>
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="Goods[is_on_sale]" value="是" checked /> 是
                        <input type="radio" name="Goods[is_on_sale]" value="否"/> 否
                    </td>
                </tr>
               
               
                <tr>
                    <td class="label">市场售价：</td>
                    <td>
                        <input type="text" name="Goods[market_price]" value="0" size="20" />
                    </td>
                </tr>
                
                <tr>
                    <td class="label">推荐位：</td>
                  
                    <td>
                          <?php foreach($rec as $k=>$v):?>
                          <input type="checkbox"  name="Goods[rec_id][]" value="<?php echo $v['id']?>" size="20" /> <?php echo $v['rec_name']?>
                        <?php endforeach;?>
                    </td>
                   
                </tr>
             
            </table>
            <!--商品描述-->
            <table width="100%"  align="center" style="display: none" class="set_span">
                <tr>
                    <td class="label">商品描述：</td>
                    <td>
                             <textarea rows="6" cols="60" id="goods_desc" name="Goods[goods_desc]"></textarea>
                    </td>
                </tr>
                <tr>

            </table>
            
            
               <!--会员价格-->
               <table width="90%"  align="center" style="display: none" class="set_span">
                       <?php foreach($member_level as $k=>$v):?>
                  <tr>
                    <td class="label"> <?php echo $v['level_name']?>：</td>
                      
                    <td>
                  
                        ￥:<input type="text" name="Memberprice[<?php echo $v['id']?>]"/>元
                     
                    </td>  
                    
                </tr>
                        <?php endforeach;?>
                <tr>
            
            </table>
            
               <!--商品属性-->
               <table width="90%"  align="center" style="display: none" class="set_span">
                  <tr>
                    <td class="label">商品属性：</td>
                    <td>
                        <select name="Goods[type_id]" >
                            
                            <option value="0">请选择类型</option>
                            <?php foreach($type_info as $k=>$v):?>
                            <option value="<?php echo $v['id']; ?>"><?php echo $v['type_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <div id='attr'></div>
                    </td>
                </tr>
                <tr>
            
            </table>
            
               <!--商品图片-->
               <table width="90%" align="center" style="display: none" class="set_span">
                  <tr>
                    <td class="label">商品图片：</td>
                    
                    <td>
                        <script type="text/javascript">var str="<tr><td><input  type='file' name='pics[]'/></td></tr>";</script>
                        <input type="button" onclick="$(this).parent().parent().parent().append(str);" value="添加一张图片"/>
                    </td>
                </tr>
                   <tr>
                       <td><input type="file" name="pics[]"/></td>
                   </tr>
            
            </table>
            <div class="button-div">
                <input type="submit" value=" 确定 " class="button"/>
                <input type="reset" value=" 重置 " class="button" />
            </div>
        </form>
    </div>
</div>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>
<script  type="text/javascript">
    
 $("#tabbar-div p span").click(function(){
     //计算点击第几个
     var i=$(this).index();
     //隐藏所有的table
     $(".set_span").hide();
     //点击哪一个就显示哪一个
     $(".set_span").eq(i).show();
     //去掉原先选中按钮
     $(".tab-front").removeClass("tab-front").addClass("tab-back");
     $(this).removeClass("tab-back").addClass("tab-front");
     
 });
   
   //用ajax获取商品类型属性
   $("select[name='Goods[type_id]']").change(function(){
       var tid=$(this).val();//获取下拉框传过来的ID
      //用ajax 获取数据
      $.ajax({
          type:'GET',
          url:"/tp/admin.28.com/index.php/Goods/Goods/getAttr/tid/"+tid,
          dataType:'json',
          success:function(data){
                var html='<ul>';
                
                $(data).each(function(k,v){
                        html+='<li>';
                        html+=v.attr_name+':';
                       
                        if(v.attr_type=='单选'){
                      
                            html+=' <a onclick="addLi(this)" href="#">[+]</a> ';
                        }
                        if(v.attr_option_val==''){
                                html+=' <input type="text" name="goods_attr['+v.id+'][]"/> ';
                        }else{
                            //把可选值转化为数组
                            var attr_array=v.attr_option_val.split(',');
                                   html+='<select name="goods_attr['+v.id+'][]">';
                                   html+='<option value="">请选择属性值</option>';
                                   //遍布数组attr_array
                                   for(var i=0;i<attr_array.length;i++){
                                       html+="<option value='"+attr_array[i]+"'>"+attr_array[i]+"</option>"
                                   }
                                   html+='</select>';
                                   html+=" ￥<input name='goods_attr_price[]' type='text'/>元";
                                   html+='</li>';
                        }
                });
                html+="</ul>";
                $('#attr').html(html);
              
          }
      });
     
   });
   function addLi(a){
       var opt=$(a).html();
      var li=$(a).parent();
      if(opt=='[+]'){
          var newli=li.clone();
          newli.find('a').html('[-]');
          li.after(newli);
          
      }else{
        li.remove();
      }
    
       
   }
   
    UE.getEditor('goods_desc');
</script>