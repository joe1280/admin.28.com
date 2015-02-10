<?php

namespace Goods\Model;
use Think\Model;

class CategoryModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("cat_name","require","名称不用为空",1),
                                                                      
            array("cat_desc","require","详细描述不用为空",1),
                                                
        );
        
        
     

        protected function _before_insert(&$data, $options) {
           
            if($data['cat_attr_id']==null){
                $data['cat_attr_id']='';
            }else{
                $data['cat_attr_id']=  array_unique($data['cat_attr_id']);
                $key=array_search(0,$data['cat_attr_id']);
                if($key!==false){
                    unset($data['cat_attr_id'][$key]);
                }
                if($data['cat_attr_id']){
                    $data['cat_attr_id']=implode(',',$data['cat_attr_id']);
                }
            }
        }
            
        //递归排放取出所有分类
            public function  get_cat(){
        
            $data=$this->select();
            //show_bug($data);
            return $this->reSort($data);
            
        }
        //找出所
        //取出所有的分类
       public function reSort($data,$pid=0,$level=0){
       
           static $ret=array();
           
           foreach($data as $k=>$v){
            
                if($v['cat_pid']==$pid){
                     
                   $v['level']=$level;
                    $ret[]=$v;

                    $this->reSort($data,$v['id'],$level+1);
                
                    
                }
           
           }

       
       return $ret;
       }
       
          //找出所有子孙分类ID
          public function getChild($id){
       
       
            $data=$this->select();
            //show_bug($data);die;
            return $this->reSort2($data,$id,true);
       }
    

        //取出所有子孙的权限ID 删除要用到的
       public function reSort2($data,$pid=0,$isClean=false){
       
           static $ret=array();

           if($isClean)
            $ret=array();
           
           foreach($data as $k=>$v){
            
                if($v['cat_pid']==$pid){
                    
                   
                    $ret[]=$v['id'];

                    $this->reSort2($data,$v['id']);
                
                    
                }
           
           }

       
       return $ret;
       }

                
       
   
}