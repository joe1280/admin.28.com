<?php

namespace Goods\Model;

use Think\Model;

class GoodsModel extends Model {

    protected $_validate = array(
        array('goods_name', 'require', '商品名称不能为空！', 1),
        array('market_price', 'require', '市场价不能为空！', 1),
        array('shop_price', 'require', '本场价不能为空！', 1),
    );

    protected function _before_insert(&$data, $optoin) {
    
      // show_bug($_POST);die;
        //商品推荐位
       
        $data['rec_id']=  implode(',', $data['rec_id']);
        $upload = new \Think\Upload(); // 实例化上传类
        
        $maxSize =(int)ini_get('upload_max_filesize');
        if($maxSize >=4)
            $maxSize =4;
             $upload->maxSize = $maxSize*1024*1024 ; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传目录
        $upload->savePath = 'Goods/'; // 设置附件上传目录
   
        // 上传文件     
        $info = $upload->upload(array('img'=>$_FILES['img']));
       // show_bug($info);
        //原图的路径
        $img = $info['img']['savepath'] .  $info['img']['savename'];
        //大图路径
        $big_img = $info['img']['savepath'] . 'big_' . $info['img']['savename'];

        //中图路径
        $mid_img = $info['img']['savepath'] .  'mid_' . $info['img']['savename'];

        //小图路径
        $small_img = $info['img']['savepath'] . 'small_' . $info['img']['savename'];
        $image = new \Think\Image();
        $image->open('./Uploads/' . $img);
        //生成大图
        $image->thumb(350, 350)->save('./Uploads/' . $big_img);

        //生成中图
        $image->thumb(150, 150)->save('./Uploads/' . $mid_img);

        //生成小图

        $image->thumb(50, 50)->save('./Uploads/' . $small_img);

        //将以上图片的路径存入数据库中
        $data['img'] = $img;
        $data['big_img'] = $big_img;
        $data['middle_img'] = $mid_img;
        $data['small_img'] = $small_img;
    }
    //删除图片
     protected function _before_delete($option) {
               
        // show_bug($option);die;
                if(is_array($option['where']['id'])){
                  
                    
                     $logo=$this->field('logo')->select($optoin['where']['id']);
                     
                     foreach($logo as $v){
                         
                         @unlink('./Uploads/'.$v['brand_logo']);
                         
                     }
                    
                     
                     
                }else{
                    
                       
                               $this->field('img')->find();
                               @unlink('./Uploads/'.$this->img);
                             
                    
                }
                
               
                
                
             
            
        }
        protected function _after_insert($data, $options) {
           // show_bug($_FILES);die;
            $goods_id=$data['id'];//商品ID
            
            //会员价格
            $member_priceModel=D('member_price');
          
            $member_price=I('post.Memberprice');
            
                foreach($member_price as $k=>$v){
                    if((int)$v==0)
                        continue;
                        $m_price_arr=array(
                            'price'=>$v,
                            'level_id'=>$k,
                            'goods_id'=>$goods_id
                        );
                       $res= $member_priceModel->add($m_price_arr);
                      
                                
                               
                    }
                    //**********商品属性处理************
                    $goods_attr=I('post.goods_attr'); //接收商品属性
                    $goods_price=I('post.goods_attr_price'); //接收商品价格
                   
                    
                    //实例商品属性模型
                    $goods_attrModel=D('goods_attr');
                    $i=0;
                    //show_bug($goods_price[0]);
                    //遍历商品属性表
                    foreach($goods_attr as $k=>$v){
                        
                            foreach($v as $kk=>$vv){
                                  $res=$goods_attrModel->add(array(
                                'goods_id'=>$goods_id,
                                'attr_id'=>$k,
                                'goods_attr_val'=>$vv,
                                'goods_attr_price'=>$goods_price[$i],
                                          ));
                                  $i++;
                                
                            }
                            //show_bug($goods_attrModel);
                            
                           // show_bug($this->getError());
                          //  show_bug($res);die;
                                
                         
                    }
                    /******************商品图片********************
                     * 
                     */
                    
                      $upload = new \Think\Upload(); // 实例化上传类
                      
           $maxSize =(int)ini_get('upload_max_filesize');
        if($maxSize >=4)
            $maxSize =4;
             $upload->maxSize = $maxSize*1024*1024 ; // 设置附件上传大小             
     
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传目录
        $upload->savePath = 'Goods/'; // 设置附件上传目录
        // 上传文件     
        $info = $upload->upload(array('pics'=>$_FILES['pics']));
      
        //原图的路径
        if($info!==false){
             $image = new \Think\Image();
             $picsModel=D('Pics');
   
        
        foreach($info as $k=>$v){
             $pic = $v['savepath'] . $v['savename'];
             
                 
                  
      
        //中图路径
        $mid_pic = $v['savepath']  . 'pic_mid_' . $v['savename'];

        //小图路径
        $small_pic = $v['savepath']  . 'pic_small_' . $v['savename'];
        $image->open('./Uploads/' . $pic);
          //生成中图
        $image->thumb(150, 150)->save('./Uploads/' . $mid_pic);

        //生成小图

        $image->thumb(50, 50)->save('./Uploads/' . $small_pic);

        //将以上图片的路径存入数据库中
       $picsModel->add(array(
           'small_pic'=>$small_pic,
           'mid_pic'=>$mid_pic,
           'pic'=>$pic,
           'goods_id'=>$goods_id
       ));
               
         
            
        }
        
           //show_bug($info);die;
            
        }
       
       
         }
         
         protected function _before_update(&$data, $option) {
             //$goods_id=$option['where']['id'];
               $data['rec_id']=  implode(',', $data['rec_id']);
             if($_FILES['img']['error']==0){
                 //先删除原来的旧原图
                 @unlink('./Uploads/'.I('post.img'));
                   @unlink('./Uploads/'.I('post.small_img'));
                     @unlink('./Uploads/'.I('post.middle_img'));
                       @unlink('./Uploads/'.I('post.big_img'));
                       
                          // show_bug($_POST);die;
        $upload = new \Think\Upload(); // 实例化上传类
        
        $maxSize =(int)ini_get('upload_max_filesize');
        if($maxSize >=4)
            $maxSize =4;
             $upload->maxSize = $maxSize*1024*1024 ; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传目录
        $upload->savePath = 'Goods/'; // 设置附件上传目录
   
        // 上传文件     
        $info = $upload->upload(array('img'=>$_FILES['img']));
       // show_bug($info);
        //原图的路径
        $img = $info['img']['savepath'] .  $info['img']['savename'];
        //大图路径
        $big_img = $info['img']['savepath'] . 'big_' . $info['img']['savename'];

        //中图路径
        $mid_img = $info['img']['savepath'] .  'mid_' . $info['img']['savename'];

        //小图路径
        $small_img = $info['img']['savepath'] . 'small_' . $info['img']['savename'];
        $image = new \Think\Image();
        $image->open('./Uploads/' . $img);
        //生成大图
        $image->thumb(350, 350)->save('./Uploads/' . $big_img);

        //生成中图
        $image->thumb(150, 150)->save('./Uploads/' . $mid_img);

        //生成小图

        $image->thumb(50, 50)->save('./Uploads/' . $small_img);

        //将以上图片的路径存入数据库中
        $data['img'] = $img;
        $data['big_img'] = $big_img;
        $data['middle_img'] = $mid_img;
        $data['small_img'] = $small_img;
             }
           
        
             
           
         }


         protected function _after_update($data,$option){
             $goods_id=$option['where']['id'];
           
             //处理商品属性
             //当添加属性时*******
            // show_bug($_POST);
             $goods_attrModel=D('GoodsAttr');
             $new_goods_attr=I('post.new_goods_attr');
             $new_goods_price=I('post.new_goods_attr_price');
         
            // show_bug($new_goods_attr);die;
             //遍历商品属性
             $i=0;
             foreach($new_goods_attr as $k=>$v){
                 
                    foreach($v as $kk=>$vv){
                        $goods_attrModel->add(array(
                            'goods_id'=>$goods_id,
                            'goods_attr_val'=>$vv,
                            'attr_id'=>$k,
                            'goods_attr_price'=>$new_goods_price[$i]
                            
                        ));
                        $i++;
                    }
             }
               // show_bug($_POST);die;
             //删除属性
           
             $del_goods_attr_id=I('post.del_goods_attr_id');
             if($del_goods_attr_id)
                 $goods_attrModel->delete ($del_goods_attr_id);
             
             //******修改原属性;
             
             $goods_attr=I('post.goods_attr');
             $goods_attr_price=I('post.goods_attr_price');
              // show_bug($_POST);
               
               //遍历属性
               $i=0;
               foreach($goods_attr as $k=>$v){
                   
                    foreach($v as $kk=>$vv){
                        $res=$goods_attrModel->where('id='.$kk)->save(array(
                            'goods_attr_val'=>$vv,
                            'goods_attr_price'=>$goods_attr_price[$i]
                        ));
                        $i++;
                    
                    }   
                 
               }
               
               //*****************会员价格***********
              
               $price=I('post.Memberprice');
             
               //先删除原来的会员价格
               $priceModel=D("MemberPrice");
              $aa= $priceModel->where('goods_id='.$goods_id)->delete();
              
           // show_bug($price);

               foreach ($price as $k=>$v){
                    if((int)$v==0)
                        continue;
                   $priceModel->add(array(
                       'price'=>$v,
                       'level_id'=>$k,
                       'goods_id'=>$goods_id
                   ));
                   
               }
              // show_bug($aa);die;
               //处理图片
                 $img_id=I('post.imgId');
             //取出数据库中所有商品图片
             $imgModel=D('Pics');
             $img=$imgModel->where('goods_id='.$goods_id)->select();
             //先删除
             foreach ($img as $k=>$v){
                 if(empty($img_id)||!in_array($v['id'], $img_id)){
                 @unlink("./Uploads/".$v['small_pic']);
                  @unlink("./Uploads/".$v['mid_pic']);
                   @unlink("./Uploads/".$v['pic']);
                 $imgModel->delete($v['id']);
                 }
             }
             //上传新的图片
                                   $upload = new \Think\Upload(); // 实例化上传类
                      
           $maxSize =(int)ini_get('upload_max_filesize');
        if($maxSize >=4)
            $maxSize =4;
             $upload->maxSize = $maxSize*1024*1024 ; // 设置附件上传大小             
     
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传目录
        $upload->savePath = 'Goods/'; // 设置附件上传目录
        // 上传文件     
        $info = $upload->upload(array('pics'=>$_FILES['pics']));
      
        //原图的路径
        if($info!==false){
             $image = new \Think\Image();
             $picsModel=D('Pics');
   
        
        foreach($info as $k=>$v){
             $pic = $v['savepath'] . $v['savename'];
             
                 
                  
      
        //中图路径
        $mid_pic = $v['savepath']  . 'pic_mid_' . $v['savename'];

        //小图路径
        $small_pic = $v['savepath']  . 'pic_small_' . $v['savename'];
        $image->open('./Uploads/' . $pic);
          //生成中图
        $image->thumb(150, 150)->save('./Uploads/' . $mid_pic);

        //生成小图

        $image->thumb(50, 50)->save('./Uploads/' . $small_pic);

        //将以上图片的路径存入数据库中
       $picsModel->add(array(
           'small_pic'=>$small_pic,
           'mid_pic'=>$mid_pic,
           'pic'=>$pic,
           'goods_id'=>$goods_id
       ));
               
         
            
        }
        
           //show_bug($info);die;
            
        }
               
           
              
             
         
         }
       
      
                    
                    
             
            
          
            
        
            
        

}
