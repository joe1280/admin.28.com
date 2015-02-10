<?php

namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("username","require","用户名不用为空",1),
                                  
            array("password","require","用户密码不用为空",1),
                                    
        );


       
       
   
}