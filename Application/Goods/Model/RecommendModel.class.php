<?php

namespace Goods\Model;
use Think\Model;

class RecommendModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("rec_name","require","推荐名称不用为空",1),
                                                
        );


       
       
   
}