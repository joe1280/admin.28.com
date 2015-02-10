<?php

namespace Goods\Model;
use Think\Model;

class AttrModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("attr_name","require","属性名称不用为空",1),
                                                                        
        );
        protected function _before_update(&$data, $options) {
//           show_bug($data);
//           //show_bug($options);
//           show_bug($this->getLastSql());
//           show_bug($this->getError());
//           
           
        }


       
       
   
}