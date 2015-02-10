<?php

namespace Member\Model;
use Think\Model;

class CategoryModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("cat_name","require","名称不用为空",1),
                                                                      
            array("cat_desc","require","详细描述不用为空",1),
                                                
        );


       
       
   
}