<?php

namespace Home\Model;
use Think\Model;

class GoodsModel extends Model{

   
    
    
        protected $_validate=array(
            
                     
            array("goods_name","require","商品名称不用为空",1),
                                  
            array("market_price","require","市场价不用为空",1),
                                  
            array("shop_price","require","本店价不用为空",1),
                                                                        
        );


       
       
   
}