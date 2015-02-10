<?php

namespace Goods\Model;
use Think\Model;

class TypeModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("type_name","require","名称不用为空",1),
                                    
        );


       
       
   
}