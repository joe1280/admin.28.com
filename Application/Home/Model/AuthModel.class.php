<?php

namespace Home\Model;
use Think\Model;

class AuthModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
          
                                  
            array("auth_name","require","名称不用为空",0),
                                  
            array("auth_pid","require","父ID不用为空",0),
                                  
            
                                                          
            array("auth_level","require","权限等级不用为空",0),
                                    
        );

       //递归方法 排序权限

        
        public function  getTree(){
        
            $data=$this->select();

            return $this->reSort($data);
            
        }
        //找出所有子孙
          public function getChild($id){
       
       
            $data=$this->select();

            return $this->reSort2($data,$id,true);
       }

       

        //取出所有的权限
       public function reSort($data,$pid=0){
       
           static $ret=array();
           
           foreach($data as $k=>$v){
            
                if($v['auth_pid']==$pid){
                    
                   
                    $ret[]=$v;

                    $this->reSort($data,$v['auth_id']);
                
                    
                }
           
           }

       
       return $ret;
       }

       
        //取出所有子孙的权限ID 删除要用到的
       public function reSort2($data,$pid=0,$isClean=false){
       
           static $ret=array();

           if($isClean)
            $ret=array();
           
           foreach($data as $k=>$v){
            
                if($v['auth_pid']==$pid){
                    
                   
                    $ret[]=$v['auth_id'];

                    $this->reSort2($data,$v['auth_id']);
                
                    
                }
           
           }

       
       return $ret;
       }

    //权限递归调度
       protected function _before_insert(&$data,$option){
       
       
            if($data['auth_pid']==0){
            
                $data['auth_level']=0;
            }else{
            
                $this->field('auth_level')->find($data['auth_pid']);
                $data['auth_level']=$this->auth_level+1;

                
            }
       }
       //更新后子权限递归调度
         protected function _before_update(&$data,$option){
       
            
            if($data['auth_pid']==0){
             
                $data['auth_level']=0;
            }else{
            
                $b=$this->field('auth_level')->find($data['auth_pid']);
                show_bug($b);
                $data['auth_level']=$this->auth_level+1;
                $auth_data=$this->select();
               show_bug($data);   
               
               $a=$this->update_child_auth($auth_data,$option['where']['auth_id'],$data['auth_level']);
             
               
            }
           
            
         
        }
          private function update_child_auth($data,$auth_id=0,$auth_level=0){
                 
               
               
                foreach($data as $k=>$v){
                    if($v['auth_pid']==$auth_id){
                       
                        $sql="update php28_auth set auth_level=".($auth_level+1)." where auth_id=".$v['auth_id'];
                        $this->execute($sql);
                      
                        $this->update_child_auth($data,$v['auth_id'],$auth_level+1);
                        
                    }
                }
            }


       
       
   
}