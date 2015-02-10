
namespace <?php echo $modName;?>\Model;
use Think\Model;

class <?php echo $tabname;?>Model extends Model{

   
    
    
        protected $_validate=array(
            
            <?php foreach($fields as $k=>$v):

            if($v['Field']=='id')
                continue;
            if($v['Null']==='NO'&&$v['Default']===null):
            
            
            ?>
         
            array("<?php echo $v['Field']?>","require","<?php echo $v['Comment']?>不用为空",1),
             <?php endif;?>
            <?php endforeach;?>
           
        );


       
       
   
}