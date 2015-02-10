<?php

namespace Goods\Model;
use Think\Model;

class BrandModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("brand_name","require","品牌名称不用为空",1),
                                                            
        );
        protected function _before_insert(&$data,$optoin){
            
          
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =      './Uploads/'; // 设置附件上传目录
            $upload->savePath  =      'Brand/'; // 设置附件上传目录
            
            // 上传文件     
            $info   =   $upload->upload();
            show_bug($info);
            $data['brand_logo']=$info['brand_logo']['savepath'].'/'.$info['brand_logo']['savename'];
           
            
            
            
             
        }
        protected function _before_update(&$data, $options) {
            
            
            show_bug($_POST);
            if($_FILES['brand_logo']['error']==0){
                unlink('./Uploads/'.I('post.old_logo'));
            }
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =      './Uploads/'; // 设置附件上传目录
            $upload->savePath  =      'Brand/'; // 设置附件上传目录
            
            // 上传文件     
            $info   =   $upload->upload();
           
            $data['brand_logo']=$info['brand_logo']['savepath'].'/'.$info['brand_logo']['savename'];
        }
        protected function _before_delete($option) {
               
                if(is_array($option['where']['id'])){
                  
                    
                     $logo=$this->field('brand_logo')->select($optoin['where']['id']);
                     
                     foreach($logo as $v){
                         
                         @unlink('./Uploads/'.$v['brand_logo']);
                         
                     }
                    
                     
                     
                }else{
                    
                            echo 11;
                               $this->field('brand_logo')->find();
                               @unlink('./Uploads/'.$this->brand_logo);
                             
                    
                }
                
               
                
                
             
            
        }
       


       
       
   
}