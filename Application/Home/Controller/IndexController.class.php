<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function __construct(){

    
        parent::__construct();

         if(!session('id')){
         
            $this->error('必须先登录',U('Login/index'));
         }
         $auth=session('auth');
       
         if(MODULE_NAME=="Home"&& CONTROLLER_NAME=='Index'){
             
             return true;
         }elseif(session('username')=='admin'){
             return true;
         }else{
              foreach($auth as $k=>$v){
             
             if($v['auth_c']==CONTROLLER_NAME && $v['auth_a']==ACTION_NAME)
                return true;
              
             }
                
                $this->error('无权访问');
         }
       
      
              
        
 
        
    }
    
    public function index(){
	
      
       $this->display();

    }

      public function main(){
	
        
       $this->display();

    }

   
     public function menu(){
         
        $this->assign('auth',session('auth'));
	
        
       $this->display();

    }
   

      public function top(){

         //show_bug(get_defined_constants(true));
	
        
       $this->display();

    }
}