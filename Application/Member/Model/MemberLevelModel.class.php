<?php

namespace Member\Model;
use Think\Model;

class MemberLevelModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("level_name","require","等级名称不用为空",1),
                                                                        
        );


       
       
   
}