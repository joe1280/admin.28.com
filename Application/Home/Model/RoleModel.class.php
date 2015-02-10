<?php

namespace Home\Model;
use Think\Model;

class RoleModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            
                                  
            array("role_name","require","角色名称不用为空",1),
            array("role_name","","角色名已存在",1,'unique'),
                                                            
        );

        protected function _before_insert(&$data,$option){
        
            $data['role_auth_ids']=implode(',',$data['role_auth_ids']);
        }

          protected function _before_update(&$data,$option){
        
            $data['role_auth_ids']=implode(',',$data['role_auth_ids']);
        }



       
       
   
}